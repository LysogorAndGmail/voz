<?php

    class Form_Element_Multiselect extends Form_Element_Select {

        protected $_options = array();
        protected $_type = self::TYPE_ELEMENT_SELECT;
        
        public function __construct() {
            parent::__construct();
        }
        
        public function getName() {
            return parent::getName() . '[]';
        }

        public function setOptions(array $options) {
            $this->_options = $options;
            return $this;
        }

        public function getOptions() {
            return $this->_options;
        }
        
        public function render() {
            ob_start();
            $this->setAttribute('id'  , $this->getId  ())
                 ->setAttribute('name', $this->getName()) ?>
            <select <?php print $this->_renderAttributes(); ?> multiple="multiple"><?php
                foreach ($this->getOptions() as $value => $text) {
                    $selected = '';
                    if ((is_array($this->getValue()) == true) && (in_array($value, $this->getValue()) == true)) $selected = 'selected="selected"'; ?>
                    <option value="<?php print $value; ?>" <?php print $selected; ?>><?php print $text; ?></option><?php
                } ?>
            </select><?php
            return $this->_renderLayout(ob_get_clean());
        }
        
        public function _renderLayout($contents) {
            ob_start(); ?>
            <div class="formelement type_multiselect <?php print $this->getRawName(); ?>">
                <table width="100%" class="markup element" cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <tr>
                            <td class="label"><?php print $this->_renderLabel(); ?></td>
                            <td class="divider vertical">&nbsp;</td>
                            <td class="element"><?php
                                if (class_exists('Decoration') == true) $contents = Decoration::render($contents);
                                print $contents; ?>
                            </td>
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
                                    foreach ($this->getErrors() as $item) { ?>
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
        
        public function __toString() {
            return $this->render();
        }
        
    }