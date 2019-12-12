<?php

    class Form_Element_Select_ToweredView extends Form_Element_Select {
        
        public function __construct() {
            parent::__construct();
        }
        
        public function _renderLayout($contents) {
            ob_start();
            $description = $this->getDescription();
            $errors      = $this->getErrors     (); ?>
            <div class="formelement type_<?php print $this->getType(); ?> toweredview <?php print $this->getRawName(); ?>">
                <table width="100%" class="markup element" cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <tr><td class="label"><?php print $this->_renderLabel(); ?></td></tr>
                        <tr><td class="divider horizontal">&nbsp;</td></tr>
                        <tr>
                            <td class="element"><?php
                                if (class_exists('Decoration') == true) $contents = Decoration::render($contents);
                                print $contents; ?>
                            </td>
                        </tr><?php
                        if (empty($errors) == false) { ?>
                            <tr><td class="divider horizontal">&nbsp;</td></tr>
                            <tr>
                                <td class="errors"><?php
                                    foreach ($errors as $item) { ?>
                                        <div class="item"><?php print $item; ?></div><?php
                                    } ?>
                                </td>
                            </tr><?php
                        }
                        if (empty($description) == false) { ?>
                            <tr><td class="divider horizontal">&nbsp;</td></tr>
                            <tr><td class="description"><?php print $this->getDescription(); ?></td></tr><?php
                        } ?>
                    </tbody>
                </table>
            </div><?php
            return ob_get_clean();
        }
        
    }