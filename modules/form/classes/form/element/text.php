<?php

    class Form_Element_Text extends Form_Element {
        
        protected $_type = self::TYPE_ELEMENT_TEXT;
        
        public function __construct() {
            parent::__construct();
            $this->setAttribute('autocomplete', 'off');
        }
        
        public function render() {
            ob_start();
            $this->setAttribute('id'   , $this->getId   ())
                 ->setAttribute('type' , 'text'           )
                 ->setAttribute('name' , $this->getName ())
                 ->setAttribute('value', $this->getValue()); ?>
            <input <?php print $this->_renderAttributes(); ?> /><?php
            return $this->_renderLayout(ob_get_clean());
        }
        
        public function _renderLayout($contents) {
            ob_start(); ?>
            <div class="formelement type_<?php print $this->getType(); ?> <?php print $this->getRawName(); ?>">
                <table width="100%" class="markup element" cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <tr>
                            <td class="label"><?php print $this->_renderLabel(); ?></td>
                            <td class="divider vertical">&nbsp;</td>
                            <td class="element"><?php
                                if (class_exists('Decoration') == true) $contents = Decoration::render($contents);
                                print $contents; ?>
                            </td>
                        </tr><?php
                        $description = $this->getDescription();
                        $errors      = $this->getErrors     ();
                        if ((empty($description) == false) || (empty($errors) == false)) { ?>
                            <tr>
                                <td class="divider horizontal">&nbsp;</td>
                                <td class="divider node">&nbsp;</td>
                                <td class="divider horizontal">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="description"><?php print $this->getDescription(); ?></td>
                                <td class="divider vertical">&nbsp;</td>
                                <td class="errors"><?php
                                    foreach ($errors as $item) { ?>
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