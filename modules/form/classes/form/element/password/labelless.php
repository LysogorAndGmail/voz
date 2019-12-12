<?php

    class Form_Element_Password_Labelless extends Form_Element_Password {
        
        public function __construct() {
            parent::__construct();
        }
        
        public function getLabel() {
            return '- ' . parent::getLabel() . ' -';
        }
        
        public function render() {
            $value = $this->getValue();
            if (empty($value) == true) $this->setValue($this->getLabel());
            ob_start(); ?>
            <input id="<?php print $this->getId(); ?>" type="password" name="<?php print $this->getName(); ?>" value="<?php print $this->getValue(); ?>" />
            <input id="<?php print $this->getId(); ?>_text" type="text" value="<?php print $this->getValue(); ?>" style="text-align:center;" /><?php
            return $this->_renderLayout(ob_get_clean());
        }
        
        public function _renderLayout($contents) {
            ob_start(); ?>
            <div class="formelement text">
                <table width="100%" class="markup element" cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <tr>
                            <td class="element"><?php
                                if (class_exists('Decoration') == true) $contents = Decoration::render($contents);
                                print $contents; ?>
                            </td>
                        </tr><?php
                        $description = $this->getDescription();
                        $errors      = $this->getErrors     ();
                        if (empty($errors) == false) { ?>
                            <tr>
                                <td class="divider horizontal">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="errors"><?php
                                    foreach ($errors as $item) { ?>
                                        <div class="item"><?php print $item; ?></div><?php
                                    } ?>
                                </td>
                            </tr><?php
                        }
                        if (empty($description) == false) { ?>
                            <tr>
                                <td class="divider horizontal">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="description"><?php print $this->getDescription(); ?></td>
                            </tr><?php
                        } ?>
                    </tbody>
                </table>
                <script type="text/javascript">
                    $('#<?php print $this->getId(); ?>_text').focus(function() {
                        $(this).css('display', 'none');
                        $('#<?php print $this->getId(); ?>').css('display', 'block').val('').focus();
                    });
                    $('#<?php print $this->getId(); ?>').blur(function() {
                        if ($(this).val() == '') {
                            $(this).css('display', 'none');
                            $('#<?php print $this->getId(); ?>_text').css('display', 'block');
                        }
                    });
                    if ($('#<?php print $this->getId(); ?>').val() == '<?php print $this->getLabel(); ?>') {
                        $('#<?php print $this->getId(); ?>').css('display', 'none');
                        $('#<?php print $this->getId(); ?>_text').css('display', 'block');
                    } else {
                        $('#<?php print $this->getId(); ?>').css('display', 'block');
                        $('#<?php print $this->getId(); ?>_text').css('display', 'none');
                    }
                </script>
            </div><?php
            return ob_get_clean();
        }
        
    }