<?php

    class Form_Element_Password extends Form_Element_Text {
        
        protected $_type = self::TYPE_ELEMENT_PASSWORD;
        
        public function __construct() {
            parent::__construct();
        }
        
        public function render() {
            ob_start();
            $this->setAttribute('id'   , $this->getId   ())
                 ->setAttribute('type' , 'password'       )
                 ->setAttribute('name' , $this->getName ())
                 ->setAttribute('value', $this->getValue()); ?>
            <input <?php print $this->_renderAttributes(); ?> /><?php
            return $this->_renderLayout(ob_get_clean());
        }
        
    }