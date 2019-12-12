<?php

    class Form_Element_Hidden extends Form_Element {
        
        protected $_type = self::TYPE_ELEMENT_HIDDEN;
        
        public function __construct() {
            parent::__construct();
        }
        
        public function render() {
            ob_start(); ?>
            <input
                type="hidden"
                name="<?php print $this->getName(); ?>"
                value="<?php print $this->getValue(); ?>"
                id="<?php print $this->getId(); ?>"
            /><?php
            return ob_get_clean();
        }
        
        public function __toString() {
            return $this->render();
        }
        
    }