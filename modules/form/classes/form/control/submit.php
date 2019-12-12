<?php

    class Form_Control_Submit extends Form_Control {
        
        public function __construct() {
            parent::__construct();
            $this->setType(self::TYPE_CONTROL_SUBMIT)
                 ->setName('submit')
                 ->setLabel('Отправить');
        }
        
        public function render() {
            ob_start();
            $this->setAttribute('id'   , $this->getId         ())
                 ->setAttribute('type' , $this->getType       ())
                 ->setAttribute('name' , $this->getName       ())
                 ->setAttribute('value', $this->getLabel      ())
                 ->setAttribute('title', $this->getDescription()); ?>
            <input <?php print $this->_renderAttributes(); ?> /><?php
            $contents = ob_get_clean();
            if (class_exists('Decoration') == true) $contents = Decoration::render($contents);
            ob_start(); ?>
            <div class="formcontrol type-submit <?php print $this->getName(); ?>"><?php print $contents; ?></div><?php
            return ob_get_clean();
        }
        
    }