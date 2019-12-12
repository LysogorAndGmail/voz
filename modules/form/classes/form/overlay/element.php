<?php

    class Form_Overlay_Element extends Form_Element {
        
        protected $_type = 'overlay_element';
        
        public function __construct() {
            parent::__construct();
        }
        
        protected function _renderLayout($contents) {
            ob_start(); ?>
            <div class="formelement type_overlay_element">
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
        
        protected function _renderValue() {
            if (is_null($this->getValue()) == true) return '--- нет ---';
            if (is_array($this->getValue()) == true) {
                $options = $this->getForm()->getForm()->getElement($this->getRawName())->getOptions();
                ob_start(); ?>
                <ul><?php
                    foreach ($this->getValue() as $value) {
                        if (isset($options[$value]) == false) continue; ?>
                        <li><?php print $options[$value]; ?></li><?php
                    } ?>
                </ul><?php
                return ob_get_clean();
            }
            return $this->getValue();
        }
        
        public function render() {
            return $this->_renderLayout($this->_renderValue());
        }
        
    }