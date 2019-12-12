<?php

    class Form_Element_Radio_SubformSwitcher extends Form_Element_Radio {
        
        protected $_type = self::TYPE_ELEMENT_RADIO;
        
        public function getOptions() {
            if (empty($this->_options) == false) return $this->_options;
            if ($this->hasForm() == true) {
                foreach ($this->getForm()->getSubforms() as $subform) $this->_options[$subform->getRawName()] = $subform->getCaption();
            }
            return $this->_options;
        }
        
        public function render() {
            $contents = parent::render();
            $hidesubformsFunctionName = $this->getId() . '_hidesubforms()';
            ob_start(); ?>
            <script type="text/javascript"><?php
                foreach ($this->getOptions() as $value => $text) { ?>
                    function <?php print $hidesubformsFunctionName; ?> { <?php
                        foreach ($this->getOptions() as $subformname => $text) {
                            if ($this->getForm()->hasSubform($subformname) == false) continue;
                            $subformId = $this->getForm()->getSubform($subformname)->getId(); ?>
                            $('#<?php print $subformId; ?>').parent().parent().css('display', 'none');
                            $('#<?php print $subformId; ?>').parent().parent().prev().css('display', 'none'); <?php
                        } ?>
                    }
                    $('#<?php print $this->getId(); ?>_<?php print $value; ?>').click(function() { <?php
                        print $hidesubformsFunctionName; ?>;
                        $('#<?php print $this->getForm()->getId(); ?>_<?php print $value; ?>').parent().parent().css('display', 'table-row');
                    }); <?php
                } ?>
                $(window).ready(function() { <?php
                    print $hidesubformsFunctionName; ?>; <?php
                    $value = $this->getValue();
                    if (empty($value) == false) { ?>
                        $('#<?php print $this->getId(); ?>_<?php print $value; ?>').click();<?php
                    } ?>
                });
            </script><?php
            return $contents . ob_get_clean();
        }
        
        public function isSubformSwitcher() {
            return true;
        }
        
    }