<?php

    class Form_Control extends Form_Thing {
        
        protected $_label;
        protected $_type;
        
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
        
        public function getType() {
            return $this->_type;
        }
        
        public function setType($value) {
            $this->_type = $value;
            return $this;
        }
        
        public function __toString() {
            return $this->render();
        }
        
        public function validate() {
            return $this;
        }
        
    }