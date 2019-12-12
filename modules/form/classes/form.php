<?php

    class Form extends Form_Thing {
        
        const METHOD_GET  = 'get' ;
        const METHOD_POST = 'post';
        protected $_type = Form_Thing::TYPE_FORM;
        
        protected $_action;
        protected $_method;
        
        protected $_elements  = array();
        protected $_fieldsets = array();
        protected $_subforms  = array();
        protected $_controls  = array();
        
        protected $_caption;
        protected $_grids  ;

        protected $_data   = array();
        protected $_errors = array();
        protected $_validated = false;
        protected $_validation;
        
        protected $_alternator;
        
        protected $_ajax_target;
        protected $_slided_up = false;
        
        public function __construct() {
            $this->setAction('')->setMethod(self::METHOD_GET);
        }
        
        public function setAction($value) {
            $this->_action = $value;
            return $this;
        }
        
        public function getAction() {
            return $this->_action;
        }
        
        public function setMethod($value) {
            if (in_array($value, array(self::METHOD_GET, self::METHOD_POST)) == false) return $this;
            $this->_method = $value;
            return $this;
        }
        
        public function getMethod() {
            return $this->_method;
        }
        
        public function addElement($element) {
            if (is_null($element->getRawName()) == true) return $this;
            if ($element->hasOrder() == false) $element->setOrder(count($this->getElements()))->setForm($this);
            $element->setForm($this);
            $this->_elements[$element->getRawName()] = $element;
            return $this;
        }
        
        public function removeElement($name) {
            if (isset($this->_elements[$name]) == false) return $this;
            unset($this->_elements[$name]);
            return $this;
        }
        
        public function getElement($name) {
            if (isset($this->_elements[$name]) == false) return null;
            return $this->_elements[$name];
        }
        
        public function hasElement($name) {
            return isset($this->_elements[$name]);
        }
        
        public function getElements() {
            return $this->_elements;
        }
        
        public function addSubform(Form $element) {
            if (is_null($element->getRawName()) == true) return $this;
            if ($element->hasOrder() == false) $element->setOrder(count($this->getSubforms()))->setForm($this);
            $element->setForm($this);
            $this->_subforms[$element->getRawName()] = $element;
            return $this;
        }
        
        public function removeSubform($name) {
            if (isset($this->_subforms[$name]) == false) return $this;
            unset($this->_subforms[$name]);
            return $this;
        }
        
        public function getSubform($name) {
            if (isset($this->_subforms[$name]) == false) return null;
            return $this->_subforms[$name];
        }
        
        public function hasSubform($name) {
            return isset($this->_subforms[$name]);
        }
        
        public function getSubforms() {
            return $this->_subforms;
        }
        
        public function addControl(Form_Control $element) {
            if (is_null($element->getRawName()) == true) return $this;
            if ($element->hasOrder() == false) $element->setOrder(count($this->getControls()))->setForm($this);
            $this->_controls[$element->getRawName()] = $element;
            return $this;
        }
        
        public function removeControl($name) {
            if (isset($this->_controls[$name]) == false) return $this;
            unset($this->_controls[$name]);
            return $this;
        }
        
        public function getControl($name) {
            if (isset($this->_controls[$name]) == false) return null;
            return $this->_controls[$name];
        }
        
        public function hasControl($name) {
            return isset($this->_controls[$name]);
        }
        
        public function getControls() {
            return $this->_controls;
        }
        
        public function getGrids() {
            if (is_null($this->_grids) == true) {
                $elements = array();
                foreach ($this->getElements() as $element) {
                    if ($element->getType() == Form_Thing::TYPE_ELEMENT_HIDDEN) continue;
                    array_push($elements, $element);
                }
                $this->_grids = array(
                    'elements'  => new Form_Grid('elements' , $elements),
                    'subforms'  => new Form_Grid('subforms' , $this->getSubforms ()) ,
                    'controls'  => new Form_Grid('controls' , $this->getControls ())
                );
                $this->getGrid('controls')->setColumns(count($this->getGrid('controls')->getElements()));
            }
            return $this->_grids;
        }

        public function getGrid($key) {
            $grids = $this->getGrids();
            if (isset($grids[$key]) == false) return null;
            return $grids[$key];
        }
        
        public function setCaption($value) {
            $this->_caption = $value;
            return $this;
        }
        
        public function getCaption() {
            return $this->_caption;
        }
        
        public function getLabel() {
            return $this->getCaption();
        }
        
        public function getAlternator() {
            return $this->_alternator;
        }
        
        public function setAlternator(Form_Element_Autocompleting $value) {
            $this->_alternator = $value;
            return $this;
        }
        
        public function hasAlternator() {
            return !is_null($this->_alternator);
        }
        
        public function getAjaxTarget() {
            return $this->_ajax_target;
        }
        
        public function setAjaxTarget($value) {
            $this->_ajax_target = $value;
            return $this;
        }
        
        public function hasAjaxTarget() {
            return !is_null($this->_ajax_target);
        }
        
        public function render() {
            $this->validate();
            ob_start();
            if ($this->hasForm() == false) { ?>
                <form action="<?php print $this->getAction(); ?>" method="<?php print $this->getMethod(); ?>" enctype="multipart/form-data" target="_self" id="<?php print $this->getId(); ?>_f"><?php
            } ?>
                    <div class="form <?php print $this->getType(); ?> <?php print $this->getRawName(); ?>" id="<?php print $this->getId(); ?>" <?php print $this->_renderAttributes(); ?>>
                <table class="markup" width="100%" cellpadding="0" cellspacing="0" border="0">
                    <tbody><?php
                        $data = array(
                            'caption'     => $this->getCaption    (),
                            'description' => $this->getDescription(),
                            'errors'      => $this->getErrors     ()
                        );
                        $counter = 0;
                        foreach ($data as $key => $value) {
                            if (empty($value) == true) continue;
                            if ($counter > 0) { ?>
                                <tr><td class="divider horizontal">&nbsp;</td></tr><?php
                            } ?>
                            <tr>
                                <td class="<?php print $key; ?>"><?php
                                    switch ($key) {
                                        case 'caption':
                                            $contents = $value;
                                            if (class_exists('Decoration') == true) $contents = Decoration::render($contents);
                                            print $contents;
                                            break;
                                        case 'errors':
                                            foreach ($value as $message) { ?>
                                                <div><?php print $message; ?></div><?php
                                            }
                                            break;
                                        default:
                                            print $value;
                                    } ?>
                                </td>
                            </tr><?php
                            $counter ++;
                        }
                        foreach ($this->getGrids() as $grid) {
                            if (count($grid->getElements()) == 0) continue;
                            if ($counter > 0) { ?>
                                <tr><td class="divider horizontal">&nbsp;</td></tr><?php
                            } ?>
                            <tr>
                                <td class="grid <?php print $grid->getName(); ?>"><?php print $grid->render(); ?></td>
                            </tr><?php
                            $counter ++;
                        } ?>
                    </tbody>
                </table>
            </div><?php
            foreach ($this->getElements() as $element) {
                if ($element->getType() != Form_Element::TYPE_ELEMENT_HIDDEN) continue;
                print $element->render();
            }
            if ($this->hasForm() == false) { ?>
                </form><?php
            }
            if (($this->hasForm() == false) && ($this->hasAjaxTarget() == true)) { ?>
                <script type="text/javascript">
                    $('#<?php print $this->getId(); ?>_f').submit(function() {
                        $.ajax({
                            'data'   : $(this).serialize(),
                            'url'    : '<?php print $this->getAction(); ?>',
                            'type'   : '<?php print $this->getMethod(); ?>',
                            'success': function (data) {
                                $('<?php print $this->getAjaxTarget(); ?>').fadeOut(100, function() {
                                    $(this).html(data).fadeIn();
                                });
                            },
                            'error'  : function () {
                                $('<?php print $this->getAjaxTarget(); ?>').html('\
                                    При обработке запроса произошла ошибка.\
                                    Пожалуйста, повторите запрос позже.\
                                ');
                            }
                        });
                        return false;
                    });
                </script><?php
            }
            if ($this->isSlidedUp() == true) { ?>
                <script type="text/javascript">
                    $('#<?php print $this->getId(); ?> > table.markup > tbody > tr > td[class!="caption"]').slideToggle('slow', 'linear');
                    $('#<?php print $this->getId(); ?> > table.markup > tbody > tr > td.caption').css('cursor', 'pointer').click(function() {
                        $('#<?php print $this->getId(); ?> > table.markup > tbody > tr > td[class!="caption"]').slideToggle('slow', 'linear');
                    });
                </script><?php
            }
            return ob_get_clean();
        }
        
        public function __toString() {
            return $this->render();
        }

        public function setValidation($value) {
            if (is_callable($value) == false) return $this;
            $this->_validation = $value;
            return $this;
        }

        protected function _isValidated() {
            return $this->_validated;
        }

        protected function _callValidation() {
            if (is_callable($this->_validation) == false) return $this;
            $function = $this->_validation;
            $function($this);
            return $this;
        }

        public function getData() {
            if (empty($this->_data) == true) {
                $files = array();
                if ($this->hasForm() == true) {
                    $data = $this->getForm()->getData();
                    $files = $data['files'];
                } else {
                    $data = array();
                    switch ($this->getMethod()) {
                        case self::METHOD_GET : $data = $_GET ; break;
                        case self::METHOD_POST: $data = $_POST; break;
                    }
                    $files = $_FILES;
                }
                if (isset($files[$this->getRawName()]) == true) {
                    $files = $files[$this->getRawName()];
                    $sections = array('name', 'type', 'tmp_name', 'error', 'size');
                    foreach ($sections as $section) {
                        foreach ($files[$section] as $key => $value) {
                            if (isset($files[$key]) == false) foreach ($sections as $s) $files[$key][$s] = array();
                            if (is_array($value) == false) {
                                $files[$key][$section] = $value;
                                continue;
                            }
                            foreach ($value as $k => $v) $files[$key][$section][$k] = $v;
                        }
                        unset($files[$section]);
                    }
                }
                if (isset($data[$this->getRawName()]) == true) {
                    $data = $data[$this->getRawName()];
                } else {
                    $data = array();
                }
                $data['files'] = $files;
                $this->_data = $data;
            }
            return $this->_data;
        }

        public function setData(array $value) {
            $this->_data = $value;
            return $this;
        }
        
        public function setValue(array $value) {
            $this->setData($value);
            return $this;
        }
        
        public function getValue() {
            return $this->getData();
        }

        public function validate($data = null) {
            if ($this->isSwitchedOn() == false) return $this;
            if ($this->_isValidated() == true) return $this;
            if (is_null($data) == false) $this->setData($data);
            $data = $this->getData();
            $files = array();
            if (isset($data['files']) == true) $files = $data['files'];
            unset($data['files']);
            if ((empty($data) == true) && (empty($files) == true)) return $this;
            foreach ($this->getElements() as $element) {
                switch ($element->getType()) {
                    case Form_Thing::TYPE_ELEMENT_CHECKBOX:
                        $element->setIsChecked(false);
                        if (isset($data[$element->getRawName()]) == true) $element->setIsChecked(true);
                    case Form_Thing::TYPE_ELEMENT_FILE:
                        if (isset($files[$element->getRawName()]) == true) {
                            $element->setValue($files[$element->getRawName()]);
                        }
                    default:
                        if (method_exists($element, 'setValue') == true) {
                            if (isset($data[$element->getRawName()]) == true) $element->setValue($data[$element->getRawName()]);
                        }
                }
                $element->validate();
            }
            foreach ($this->getSubforms() as $subform) {
                $data = null;
                $subform->validate();
            }
            $this->_callValidation();
            $this->_validated = true;
            return $this;
        }

        public function addError($message) {
            array_push($this->_errors, $message);
            return $this;
        }

        public function getErrors() {
            return $this->_errors;
        }

        public function hasErrors() {
            $this->validate();
            if (count($this->getErrors()) > 0) return true;
            foreach ($this->getElements() as $element) {
                if (method_exists($element, 'hasErrors') == false) continue;
                if ($element->hasErrors() == true) return true;
            }
            foreach ($this->getSubforms() as $subform) if ($subform->hasErrors() == true) return true;
            return false;
        }
        
        protected function _setErrors(array $errors) {
            $this->_errors = $errors;
            return $this;
        }

        public function isValid() {
            $data = $this->getData();
            $files = $data['files'];
            unset($data['files']);
            if ((empty($data) == true) && (empty($files) == true)) return false;
            foreach ($data as $name => $value) {
                if (
                    ($this->hasElement($name) == false) &&
                    ($this->hasControl($name) == false) &&
                    ($this->hasSubform($name) == false)
                ) return false;
            }
            foreach ($files as $name => $value) {
                if (
                    ($this->hasElement($name) == false) &&
                    ($this->hasControl($name) == false) &&
                    ($this->hasSubform($name) == false)
                ) return false;
            }
            return !$this->hasErrors();
        }
        
        public function getSubformSwitchers() {
            $return = array();
            foreach ($this->getElements() as $element) {
                if (method_exists($element, 'isSubformSwitcher') == false) continue;
                if ($element->isSubformSwitcher() == false) continue;
                array_push($return, $element);
            }
            return $return;
        }
        
        public function hasSubformSwitcher() {
            foreach ($this->getElements() as $element) {
                if (method_exists($element, 'isSubformSwitcher') == false) continue;
                if ($element->isSubformSwitcher() == false) continue;
                return true;
            }
            return false;
        }
        
        public function isSwitchedOn() {
            if ($this->hasForm() == false) return true;
            if ($this->hasAlternator() == true) {
                $value = $this->getAlternator()->getValue();
                if (isset($value['result']['data']) == true) return false;
            }
            if ($this->getForm()->hasSubformSwitcher() == false) return true;
            $switchers = $this->getForm()->getSubformSwitchers();
            foreach ($switchers as $switcher) {
                if ($switcher->getValue() != $this->getRawName()) continue;
                return true;
            }
            return false;
        }
        
        public function isSlidedUp() {
            return $this->_slided_up;
        }
        
        public function setIsSlidedUp($value) {
            $this->_slided_up = (bool) $value;
            return $this;
        }
        
    }