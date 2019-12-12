<?php

    class Form_Element_File extends Form_Element {
        
        protected $_type = self::TYPE_ELEMENT_FILE;
        
        public function __construct() {
            parent::__construct();
        }
        
        public function render() {
            ob_start();
            $this->setAttribute('id'   , $this->getId   ())
                 ->setAttribute('type' , 'file'           )
                 ->setAttribute('name' , $this->getName ()); ?>
            <input <?php print $this->_renderAttributes(); ?> />
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td class="input" ><?php print $this->_renderInput (); ?></td>
                    <td class="divider vertical">&nbsp;</td>
                    <td class="button"><?php print $this->_renderButton(); ?></td>
                </tr>
            </table><?php
            return $this->_renderLayout(ob_get_clean());
        }
        
        protected function _renderInput() {
            ob_start(); ?>
            <input id="<?php print $this->getId(); ?>_file" type="text" name="fakefile" value="<?php echo $this->getValue(); ?>" /><?php
            $contents = ob_get_clean();
            if (class_exists('Decoration') == true) $contents = Decoration::render($contents);
            ob_start(); ?>
            <div class="forminput type_text fakefile"><?php print $contents; ?></div><?php
            return ob_get_clean();
        }
        
        protected function _renderButton() {
            ob_start(); ?>
            <button id="<?php print $this->getId(); ?>_browse" name="fakebrowse">Выбрать</button><?php
            $contents = ob_get_clean();
            if (class_exists('Decoration') == true) $contents = Decoration::render($contents);
            ob_start(); ?>
            <div class="formcontrol type_button fakebrowse"><?php print $contents; ?></div><?php
            return ob_get_clean();
        }
        
        protected function _renderLayout($contents) {
            ob_start(); ?>
            <div class="formelement type_<?php print $this->getType(); ?> <?php print $this->getRawName(); ?>">
                <table width="100%" class="markup element" cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <tr>
                            <td class="label"><?php print $this->_renderLabel(); ?></td>
                            <td class="divider vertical">&nbsp;</td>
                            <td class="element"><?php print $contents; ?></td>
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
                <script type="text/javascript">
                    $(document).ready(function() {
                        var width = $('#<?php print $this->getId(); ?>').parent().width();
                        if (width > 0) {
                            $('#<?php print $this->getId(); ?>').parent().children('table').width(width);
                            $('#<?php print $this->getId(); ?>').width(width);
                        }
                        $('#<?php print $this->getId(); ?>_browse').click(function() {
                            $('#<?php print $this->getId(); ?>').click();
                            return false;
                        });
                        $('#<?php print $this->getId(); ?>').change(function() {
                            $('#<?php print $this->getId(); ?>_file').val($(this).val());
                        });
                    });
                </script>
            </div><?php
            return ob_get_clean();
        }
        
    }