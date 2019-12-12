<?php

    class Form_Element_Checkbox_List extends Form_Element {

        protected $_options = array();
        protected $_type = self::TYPE_ELEMENT_SELECT;
        protected $_value = array();
        public function __construct() {
            parent::__construct();
        }
        
        public function getName() {
            return parent::getName();
        }

        public function setOptions(array $options) {
            $this->_options = $options;
            return $this;
        }

        public function getOptions() {
            return $this->_options;
        }
        
        
        public function render() {
            ob_start();
            $this->setAttribute('id'  , $this->getId  ())
                 ->setAttribute('name', $this->getName()) ?>
            <div class="scrollbox" id="scrollbox_<?php print $this->getRawName(); ?>" style="height: 250px; overflow: auto;">
                <table><?php
                $class = '';
                $even = true;
                foreach ($this->getOptions() as $value => $text) {
                    if ($even == true) {
                        $event = false;
                        $class = 'even';
                    } else {
                        $event = true;
                        $class = 'odd';
                    }
                    if (in_array($value, $this->getValue()) == true) { ?>
                        <tr class="<?php echo $class; ?>">
                            <td width="10"><input type="checkbox" checked="checked" name="<?php echo $this->getName(); ?>[]" id="<?php print $this->getRawName(); ?>_<?php echo $value; ?>" value="<?php echo $value; ?>" /></td>
                            <td><label for="<?php print $this->getRawName(); ?>_<?php echo $value; ?>"><?php echo $text; ?></label></td>
                        </tr><?php
                    } else { ?>
                        <tr class="<?php echo $class; ?>">
                            <td width="10"><input type="checkbox" name="<?php echo $this->getName(); ?>[]" id="<?php print $this->getRawName(); ?>_<?php echo $value; ?>" value="<?php echo $value; ?>" /></td>
                            <td><label for="<?php print $this->getRawName(); ?>_<?php echo $value; ?>"><?php echo $text; ?></label></td>
                        </tr><?php
                    }
                } ?>
                </table>
            </div>
            <div style="padding: 3px; color: #000;"><span onclick="$('#scrollbox_<?php print $this->getRawName(); ?> input[type=checkbox]').attr('checked', 'checked');">Выделить все</span> / <span onclick="$('#scrollbox_<?php print $this->getRawName(); ?> input[type=checkbox]').removeAttr('checked');">Снять выделение со всех</span></div><?php
            return $this->_renderLayout(ob_get_clean());
        }
        
        public function _renderLayout($contents) {
            ob_start(); ?>
            <div class="formelement type_checkbox_list <?php print $this->getRawName(); ?>">
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
?>
