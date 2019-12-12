<?php

    class Form_Element_Radio extends Form_Element {

        protected $_options = array();
        protected $_type = self::TYPE_ELEMENT_RADIO;
        
        public function __construct() {
            parent::__construct();
        }

        public function setOptions(array $options) {
            $this->_options = $options;
            return $this;
        }

        public function getOptions() {
            return $this->_options;
        }
        
        public function render() {
            ob_start(); ?>
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                <tbody><?php
                    $this->setAttribute('type', 'radio'         );
                    $this->setAttribute('name', $this->getName());
                    $counter = 0;
                    foreach ($this->getOptions() as $value => $text) {
                        if ($counter > 0) { ?>
                            <tr>
                                <td class="divider horizontal">&nbsp;</td>
                                <td class="divider node">&nbsp;</td>
                                <td class="divider horizontal">&nbsp;</td>
                            </tr><?php
                        } ?>
                        <tr>
                            <td class="element"><?php
                                $this->removeAttribute('checked');
                                if ($value == $this->getValue()) $this->setAttribute('checked', 'checked');
                                $this->setAttribute('id'   , $this->getId() . '_' . $value);
                                $this->setAttribute('value', $value); ?>
                                <input <?php print $this->_renderAttributes(); ?> />
                            </td>
                            <td class="divider vertical">&nbsp;</td>
                            <td class="text"><label for="<?php print $this->getId(); ?>_<?php print $value; ?>"><?php print $text; ?></label></td>
                        </tr><?php
                        $counter ++;
                    } ?>
                </tbody>
            </table><?php
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
                            <td class="element" rowspan="3"><?php print $contents; ?></td>
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