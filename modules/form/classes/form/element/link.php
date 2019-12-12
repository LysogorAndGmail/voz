<?php

    class Form_Element_Link extends Form_Element {
        
        protected $_type = self::TYPE_ELEMENT_LINK;
        protected $_href;
        
        public function __construct() {
            parent::__construct();
        }
        
        public function setHref($href) {
            $this->_href = $href;
            return $this;
        }
        
        public function getHref() {
            return $this->_href;
        }
        
        public function render() {
            ob_start();
            $this->setAttribute('class', 'formelement type_' . $this->getType() . ' ' . $this->getRawName() . '')
                 ->setAttribute('title', $this->getDescription())
                 ->setAttribute('href' , $this->getHref()); ?>
            <a <?php print $this->_renderAttributes(); ?>><?php print $this->getLabel(); ?></a><?php
            return ob_get_clean();
        }
        
    }