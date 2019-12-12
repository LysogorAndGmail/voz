<?php

    class Form_Element_Image extends Form_Element {
        
        protected $_width  = 200;
        protected $_height = 200;
        protected $_type = 'image';
        
        public function __construct() {
            parent::__construct();
        }
        
        public function setWidth($value) {
            $this->_width = abs(intval($value));
            return $this;
        }
        
        public function setHeight($value) {
            $this->_height = abs(intval($value));
            return $this;
        }
        
        public function getWidth() {
            return $this->_width;
        }
        
        public function getHeight() {
            return $this->_height;
        }
        
        public function setValue($value) {
            parent::setValue($value);
            if(is_object($value) == true) {
                $this->setLabel($value->getDescription()->getTitle())
                     ->setDescription($value->getDescription()->getBody());
            }
            return $this;
        }
        
        public function render() {
            ob_start();
            $width  = $this->getValue()->getWidth ();
            $height = $this->getValue()->getHeight();
            if ($width  > $this->getWidth ()) $width  = $this->getWidth ();
            if ($height > $this->getHeight()) $height = $this->getHeight();
            $this->setAttribute('src', $this->getValue()->getFile($width, $height)); ?>
            <img <?php print $this->_renderAttributes(); ?> /><?php
            return $this->_renderLayout(ob_get_clean());
        }
        
        protected function _renderLayout($contents) {
            ob_start(); ?>
            <div class="formelement">
                <table width="100%" class="markup element" cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <tr>
                            <td class="label"><?php print $this->_renderLabel(); ?></td>
                            <td class="divider vertical">&nbsp;</td>
                            <td class="element"><?php print $contents; ?></td>
                        </tr>
                        <tr>
                            <td class="divider horizontal">&nbsp;</td>
                            <td class="divider node">&nbsp;</td>
                            <td class="divider horizontal">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="description"><?php print $this->getDescription(); ?></td>
                            <td class="divider vertical">&nbsp;</td>
                            <td class="errors">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </div><?php
            return ob_get_clean();
        }
        
    }