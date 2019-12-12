<?php

    class Form_Element_Select_Labelless extends Form_Element_Select {
        
        public function __construct() {
            parent::__construct();
        }
        
        public function getLabel() {
            return '- ' . parent::getLabel() . ' -';
        }
        
        public function setOptions(array $options) {
            $newOptions = array('' => $this->getLabel());
            foreach ($options as $key => $value) $newOptions[$key] = $value;
            parent::setOptions($newOptions);
            return $this;
        }
        
        public function _renderLayout($contents) {
            ob_start(); ?>
            <div class="formelement type_<?php print $this->getType(); ?> <?php print $this->getRawName(); ?>">
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
                    $('#<?php print $this->getId(); ?>').change (form_element_select_labelless_fix_textalign);
                </script>
            </div><?php
            return ob_get_clean();
        }
        
    }