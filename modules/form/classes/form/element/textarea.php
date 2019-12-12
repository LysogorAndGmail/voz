<?php

    class Form_Element_Textarea extends Form_Element {
        
        protected $_type = self::TYPE_ELEMENT_TEXTAREA;
        
        public function __construct() {
            parent::__construct();
        }
        
        public function render() {
            ob_start();
            $this->setAttribute('id'   , $this->getId   ())
                 ->setAttribute('name' , $this->getName ())
                 ->setAttribute('cols', 0)
                 ->setAttribute('rows', 0)
                 ->setAttribute('style', 'width:100%;'); ?>
            <textarea <?php print $this->_renderAttributes(); ?>><?php print $this->getValue(); ?></textarea><?php
            return $this->_renderLayout(ob_get_clean());
        }
        
        public function _renderLayout($contents) {
            ob_start(); ?>
            <div class="formelement type_<?php print $this->getType(); ?> <?php print $this->getRawName(); ?>">
                <table width="100%" class="markup element" cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <tr>
                            <td class="label"><?php print $this->_renderLabel(); ?></td>
                            <td class="divider vertical" rowspan="3">&nbsp;</td>
                            <td class="element" rowspan="3"><?php
                                if (class_exists('Decoration') == true) $contents = Decoration::render($contents);
                                print $contents; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="divider horizontal">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="description"><?php print $this->getDescription(); ?></td>
                        </tr><?php
                        if (count($this->getErrors()) > 0) { ?>
                            <tr>
                                <td class="divider horizontal">&nbsp;</td>
                                <td class="divider node">&nbsp;</td>
                                <td class="divider horizontal">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td class="divider vertical">&nbsp;</td>
                                <td class="errors"><?php
                                    foreach ($this->getErrors() as $item) { ?>
                                        <div class="item"><?php print $item; ?></div><?php
                                    } ?>
                                </td>
                            </tr><?php
                        } ?>
                    </tbody>
                </table>
            </div><?php
            return ob_get_clean();
        }
        
        public function __toString() {
            return $this->render();
        }
        
    }