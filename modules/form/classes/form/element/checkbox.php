<?php

    class Form_Element_Checkbox extends Form_Element {

        protected $_checked;
        protected $_type = self::TYPE_ELEMENT_CHECKBOX;
        
        public function __construct() {
            parent::__construct();
        }

        public function isChecked() {
            return $this->_checked;
        }

        public function setIsChecked($value) {
            $this->_checked = (bool) $value;
            return $this;
        }

        public function getValue() {
            return 1;
        }

        public function setValue($value) {
            return $this;
        }
        
        public function render() {
            ob_start();
            $checked = '';
            if ($this->isChecked() == true) $this->setAttribute('checked', 'checked');
            $this->setAttribute('id'   , $this->getId  ())
                 ->setAttribute('type' , 'checkbox'      )
                 ->setAttribute('name' , $this->getName())
                 ->setAttribute('value', '1'             ); ?>
            <input <?php print $this->_renderAttributes(); ?> /><?php
            return $this->_renderLayout(ob_get_clean());
        }
        
        public function _renderLayout($contents) {
            ob_start(); ?>
            <div class="formelement type_<?php print $this->getType(); ?> <?php print $this->getRawName(); ?>">
                <table width="100%" class="markup element" cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <tr>
                            <td class="element"><?php print $contents; ?></td>
                            <td class="divider vertical">&nbsp;</td>
                            <td class="label"><?php print $this->_renderLabel(); ?></td>
                        </tr><?php
                        $description = $this->getDescription();
                        $errors      = $this->getErrors     ();
                        if (empty($errors) == false) { ?>
                            <tr>
                                <td class="divider horizontal">&nbsp;</td>
                                <td class="divider node">&nbsp;</td>
                                <td class="divider horizontal">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td class="divider vertical">&nbsp;</td>
                                <td class="errors"><?php
                                    foreach ($errors as $item) { ?>
                                        <div class="item"><?php print $item; ?></div><?php
                                    } ?>
                                </td>
                            </tr><?php
                        }
                        if (empty($description) == false) { ?>
                            <tr>
                                <td class="divider horizontal">&nbsp;</td>
                                <td class="divider node">&nbsp;</td>
                                <td class="divider horizontal">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td class="divider vertical">&nbsp;</td>
                                <td class="description"><?php print $this->getDescription(); ?></td>
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