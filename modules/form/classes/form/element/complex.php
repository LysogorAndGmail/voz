<?php

    class Form_Element_Complex extends Form {
        
        protected $_label;
        
        protected $_columns;
        
        public function __construct() {
            parent::__construct();
            $this->setColumns(1);
            $this->_type = self::TYPE_ELEMENT_COMPLEX;
        }
        
        public function getLabel() {
            return $this->_label;
        }
        
        public function setLabel($value) {
            $this->_label = $value;
            return $this;
        }
        
        public function getValue() {
            $return = array();
            foreach ($this->getElements() as $name => $element) $return[$name] = $element->getValue();
            return $return;
        }
        
        public function setValue(array $value) {
            foreach ($this->getElements() as $element) {
                if (isset($value[$element->getRawName()]) == false) continue;
                if (is_subclass_of($element, 'Form') == true) {
                    $element->setData($value[$element->getRawName()]);
                    continue;
                }
                $element->setValue($value[$element->getRawName()]);
            }
            return $this;
        }
        
        public function setColumns($value) {
            $value = abs(intval($value));
            if ($value > 0) $this->_columns = $value;
            return $this;
        }
        
        public function getColumns() {
            return $this->_columns;
        }
        
        public function getElement($name) {
            foreach ($this->getElements() as $element) {
                if ($element->getRawName() != $name) continue;
                return $element;
            }
            return null;
        }
        
        protected function _sortElements() {
            usort($this->_elements, function($x, $y) {
                $orderX = $x->getOrder();
                $orderY = $y->getOrder();
                if ($orderX == $orderY) return 0;
                return ($orderX < $orderY) ? -1 : 1;
            });
            return $this;
        }
        
        public function render() {
            $this->_sortElements();
            ob_start(); ?>
            <table class="grid <?php print $this->getRawName(); ?>" width="100%" cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    <tr><?php
                        $counter = 0;
                        $columnsCounter = 0;
                        foreach ($this->getElements() as $element) {
                            if ($columnsCounter > 0) { ?><td class="divider vertical">&nbsp;</td><?php } ?>
                            <td class="element <?php print $element->getRawName(); ?>"><?php print $element->render(); ?></td><?php
                            $counter ++;
                            $columnsCounter ++;
                            if ($columnsCounter >= $this->getColumns()) {
                                $columnsCounter = 0;
                                if ($counter == count($this->getElements())) break; ?>
                                </tr>
                                <tr><?php
                                    for ($i = 0; $i < $this->getColumns(); $i ++) {
                                        if ($i > 0) { ?><td class="divider node">&nbsp;</td><?php } ?>
                                        <td class="divider horizontal">&nbsp;</td><?php
                                    } ?>
                                </tr>
                                <tr><?php
                            }
                        }
                        if ($counter != count($this->getElements())) {
                            if ($columnsCounter < $this->getColumns()) {
                                if ($columnsCounter > 0) { ?><td class="divider vertical">&nbsp;</td><?php } ?>
                                <td>&nbsp;</td><?php
                            }
                        } ?>
                    </tr>
                </tbody>
            </table><?php
            return $this->_renderLayout(ob_get_clean());
        }
        
        protected function _renderLayout($contents) {
            ob_start(); ?>
            <div class="formelement type_<?php print $this->getType(); ?> <?php print $this->getRawName(); ?>">
                <table width="100%" class="markup element" cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <tr>
                            <td class="label"><?php print $this->_renderLabel(); ?></td>
                            <td class="divider vertical">&nbsp;</td>
                            <td class="element"><?php print $contents; ?></td>
                        </tr><?php
                        $description = $this->getDescription();
                        $errors      = $this->getErrors     ();
                        if ((empty($description) == false) || (empty($errors) == false)) { ?>
                            <tr>
                                <td class="divider horizontal">&nbsp;</td>
                                <td class="divider node">&nbsp;</td>
                                <td class="divider horizontal">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="description"><?php print $this->getDescription(); ?></td>
                                <td class="divider vertical">&nbsp;</td>
                                <td class="errors"><?php
                                    foreach ($errors as $item) { ?>
                                        <div class="item"><?php print $item; ?></div><?php
                                    } ?>
                                </td>
                            </tr><?php
                        } ?>
                    </tbody>
                </table>
            </div><?php
            return ob_get_clean();
        }
        
        protected function _renderLabel() {
            ob_start(); ?>
            <label for="<?php print $this->getId(); ?>"><?php
                print $this->getLabel();
                if ($this->isRequired() == true) { ?> <span>*</span><?php } ?>
            </label><?php
            return ob_get_clean();
        }
        
        public function isRequired() {
            $value  = $this->getValue ();
            $errors = $this->getErrors();
            $this->setValue(array())->validate();
            $result = $this->hasErrors();
            $this->setValue($value)->_setErrors($errors);
            return $result;
        }
        
    }