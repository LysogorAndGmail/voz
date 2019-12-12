<?php

    class Form_Control_Button extends Form_Control {
        
        public function __construct() {
            parent::__construct();
            $this->setType(self::TYPE_CONTROL_BUTTON)
                 ->setName('button');
        }
        
        public function render() {
            ob_start();
            $this->setAttribute('id'   , $this->getId         ())
                 ->setAttribute('name' , $this->getRawName    ())
                 ->setAttribute('title', $this->getDescription()); ?>
            <button <?php print $this->_renderAttributes(); ?>><?php print $this->getLabel(); ?></button><?php
            $contents = ob_get_clean();
            if (class_exists('Decoration') == true) $contents = Decoration::render($contents);
            ob_start(); ?>
            <div class="formcontrol type-button <?php print $this->getRawName(); ?>"><?php print $contents; ?></div><?php
            return ob_get_clean();
        }
        
    }