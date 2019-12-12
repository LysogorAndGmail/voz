<?php

    class Form_Element extends Form_Thing {
        
        protected $_label;
        protected $_value;
        
        protected $_validation;
        protected $_errors = array();
        
        public function __construct() {
            parent::__construct();
        }
        
        public function getLabel() {
            return $this->_label;
        }
        
        public function setLabel($value) {
            $this->_label = $value;
            return $this;
        }
        
        public function getValue() {
            return $this->_value;
        }
        
        public function setValue($value) {
            $this->_value = $value;
            return $this;
        }
        
        public function validate() {
            if (is_callable($this->_validation) == false) return $this;
            $function = $this->_validation;
            $function($this);
            return $this;
        }
        
        public function getErrors() {
            return $this->_errors;
        }

        public function hasErrors() {
            if (count($this->getErrors()) == 0) return false;
            return true;
        }
        
        public function addError($message) {
            array_push($this->_errors, $message);
        }
        
        protected function _setErrors(array $errors) {
            $this->_errors = $errors;
            return $this;
        }

        public function setValidation($value) {
            if (is_callable($value) == false) return $this;
            $this->_validation = $value;
            return $this;
        }
        
        public function isRequired() {
            $value  = $this->getValue ();
            $errors = $this->getErrors();
            $this->setValue('')->validate();
            $result = $this->hasErrors();
            $this->setValue($value)->_setErrors($errors);
            return $result;
        }
        
        protected function _renderLabel() {
            ob_start(); ?>
            <label for="<?php print $this->getId(); ?>"><?php
                print $this->getLabel();
                if ($this->isRequired() == true) { ?> <span>*</span><?php } ?>
            </label><?php
            return ob_get_clean();
        }
        
        protected function _renderLayout($contents) {
            ob_start(); ?>
            <div class="formelement">
                <table width="100%" class="markup element" cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <tr>
                            <td class="label"><?php print $this->_renderLabel(); ?></td>
                            <td class="divider vertical">&nbsp;</td>
                            <td class="element"><?php
                                if (class_exists('Decoration') == true) $contents = Decoration::render($contents);
                                print $contents; ?>
                            </td>
                        </tr>
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
                        </tr>
                    </tbody>
                </table>
            </div><?php
            return ob_get_clean();
        }
        
        public function render() {
            return $this->_renderLayout('');
        }
        
        public function __toString() {
            return $this->render();
        }
        
    }