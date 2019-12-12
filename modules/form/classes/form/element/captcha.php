<?php

    class Form_Element_Captcha extends Form_Element_Text {
        
        public function __construct() {
            parent::__construct();
            $this->setName('captcha')->setLabel('Текст с картинки')
                 ->setValidation(function($element) {
                     if (Captcha::valid($element->getValue()) == false) $element->addError('Текст введён неправильно. Попробуйте ещё раз');
                 });
        }
        
        public function render() {
            $this->setValue('');
            return parent::render();
        }
        
        public function _renderLayout($contents) {
            ob_start(); ?>
            <div class="formelement type_<?php print $this->getType(); ?> <?php print $this->getRawName(); ?>">
                <table width="100%" class="markup element" cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <tr>
                            <td class="label"><?php print $this->_renderLabel(); ?></td>
                            <td class="divider vertical">&nbsp;</td>
                            <td class="element">
                                <div class="input"><?php
                                    if (class_exists('Decoration') == true) $contents = Decoration::render($contents);
                                    print $contents; ?>
                                </div>
                                <div class="image"><img src="<?php print str_replace('index.php/', '', Captcha::instance()); ?>" /></div>
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
        
    }