<?php

    class Form_Thing {

        const TYPE_FORM             = 'form'    ;
        const TYPE_FIELDSET         = 'fieldset';
        const TYPE_ELEMENT_TEXT     = 'text'    ;
        const TYPE_ELEMENT_PASSWORD = 'password';
        const TYPE_ELEMENT_TEXTAREA = 'textarea';
        const TYPE_ELEMENT_SELECT   = 'select'  ;
        const TYPE_ELEMENT_CHECKBOX = 'checkbox';
        const TYPE_ELEMENT_RADIO    = 'radio'   ;
        const TYPE_ELEMENT_HIDDEN   = 'hidden'  ;
        const TYPE_ELEMENT_COMPLEX  = 'complex' ;
        const TYPE_ELEMENT_LINK     = 'link'    ;
        const TYPE_ELEMENT_FILE     = 'file'    ;
        const TYPE_CONTROL_SUBMIT   = 'submit'  ;
        const TYPE_CONTROL_BUTTON   = 'button'  ;
        
        const TYPE_ELEMENT_RADIO_SUBFORMSWITCHER = 'radio_subformswitcher';
        
        protected $_name;
        protected $_description;
        protected $_order;
        
        protected $_type;
        protected $_form;
        protected $_attributes;
        
        protected $_object;
        
        public function __construct() {
            
        }
        
        public function getName() {
            if ($this->hasForm() == true) return $this->getForm()->getName() . '[' . $this->_name . ']';
            return $this->_name;
        }
        
        public function getRawName() {
            return $this->_name;
        }
        
        public function setName($value) {
            $this->_name = $value;
            return $this;
        }
        
        public function getId() {
            return str_replace(array('[', ']'), array('_', ''), $this->getName());
        }
        
        public function getDescription() {
            return $this->_description;
        }
        
        public function setDescription($value) {
            $this->_description = $value;
            return $this;
        }
        
        public function getOrder() {
            return $this->_order;
        }
        
        public function hasOrder() {
            return !is_null($this->_order);
        }
        
        public function setOrder($value) {
            $this->_order = intval($value);
            return $this;
        }
        
        public function getType() {
            return $this->_type;
        }
        
        public function hasForm() {
            return !is_null($this->_form);
        }
        
        public function getForm() {
            return $this->_form;
        }
        
        public function setForm(Form $value) {
            $this->_form = $value;
            return $this;
        }
        
        public function setAttribute($name, $value) {
            $this->_attributes[$name] = $value;
            return $this;
        }
        
        public function getAttribute($name) {
            if (isset($this->_attributes[$name]) == false) return null;
            return $this->_attributes[$name];
        }
        
        public function hasAttribute($name) {
            return isset($this->_attributes[$name]);
        }
        
        public function getAttributes() {
            if (is_null($this->_attributes) == true) $this->_attributes = array();
            return $this->_attributes;
        }
        
        public function removeAttribute($name) {
            if (isset($this->_attributes[$name]) == false) return $this;
            unset($this->_attributes[$name]);
            return $this;
        }
        
        protected function _renderAttributes() {
            $return = '';
            foreach ($this->getAttributes() as $name => $value) {
                if (is_array ($value) == true) continue;
                if (is_string($value) == true) $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                $return .= ' ' . $name . '="' . $value . '"';
			}
            return $return;
        }
        
        public function getObject() {
            return $this->_object;
        }
        
        public function setObject($object) {
            $this->_object = $object;
            return $this;
        }
        
        public function hasObject() {
            return !is_null($this->_object);
        }
        
        public function isSubformSwitcher() {
            return false;
        }
        
    }
