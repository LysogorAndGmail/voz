<?php

    class Form_Element_Autocompleting extends Form_Element_Complex {
        
        protected $_ajax_action_href;
        protected $_alternative_form;
        
        public function __construct() {
            parent::__construct();
            $this->_type = 'autocompleting';
            $typing = new Form_Element_Text_Labelless();
            $typing->setName('typing')
                   ->setLabel('Начните вводить...');
            $display = new Form_Element_Text_Labelless();
            $display->setName('display')
                    ->setAttribute('disabled', 'disabled')
                    ->setValue('');
            $change = new Form_Control_Button();
            $change->setName('change')
                   ->setLabel('Изменить');
            $caption = new Form_Element_Hidden();
            $caption->setName('caption');
            $result = new Form();
            $result->setName('result')
                   ->addElement($display)
                   ->addElement($change)
                   ->addElement($caption)
                   ->getGrid('elements')->setColumns(2);
            $this->addElement($typing)
                 ->addElement($result);
        }
        
        public function setAjaxActionHref($value) {
            $this->_ajax_action_href = $value;
            return $this;
        }
        
        public function getAjaxActionHref() {
            return $this->_ajax_action_href;
        }
        
        public function setAlternativeForm (Form $form) {
            $this->_alternative_form = $form;
            $form->setAlternator($this);
            return $this;
        }
        
        public function getAlternativeForm() {
            return $this->_alternative_form;
        }
        
        public function hasAlternativeForm() {
            return !is_null($this->_alternative_form);
        }
        
        public function render() {
            $this->getElement('result')->getElement('display')->setValue($this->getElement('result')->getElement('caption')->getValue());
            ob_start(); ?>
            <script type="text/javascript"><?php
                $id = $this->getElement('typing')->getId(); ?>
                var <?php print $id; ?>_timeout = null;
                $('#<?php print $id; ?>').keyup(function() {
                    window.clearTimeout(<?php print $id; ?>_timeout);
                    <?php print $id; ?>_timeout = window.setTimeout(function() {
                        <?php print $this->getId(); ?>_load_options();
                    }, 1000);
                });
                $('#<?php print $id; ?>').keydown(function() {
                    <?php print $this->getId(); ?>_clear_options();
                }).focus(function() {
                    <?php print $this->getId(); ?>_clear_options();
                    if ($(this).val() == '') return;
                    window.clearTimeout(<?php print $id; ?>_timeout);
                    <?php print $id; ?>_timeout = window.setTimeout(function() {
                        <?php print $this->getId(); ?>_load_options();
                    }, 1000);
                });
                function <?php print $this->getId(); ?>_clear_options() {
                    $('#<?php print $id; ?>').parent().children('div.autocompletion').remove();
                }
                function <?php print $this->getId(); ?>_load_options() {
                    $.getJSON('<?php print $this->getAjaxActionHref(); ?>?typing=' + $('#<?php print $id; ?>').val() + '', function(data) {
                        $('#<?php print $id; ?>').parent().children('div.autocompletion').remove(); <?php
                        if ($this->hasAlternativeForm() == true) { ?>
                            if (data.length == 0) {
                                $('div.form#<?php print $this->getAlternativeForm()->getId(); ?>').css('display', 'block');
                                return;
                            } <?php
                        } ?>
                        var options = '';
                        for (i in data) {
                            var d = '';
                            for (j in data[i].data) {
                                d += '<input type="hidden" name="<?php print $this->getName(); ?>[result][data][' + j + ']" value="' + data[i].data[j] + '" />';
                            }
                            options += '\
                                <div class="option">\
                                    <div class="data">' + d + '</div>\
                                    <div class="display">\
                                        <div class="caption">' + data[i].display.caption + '</div>\
                                    </div>\
                                </div>\
                            ';
                        }
                        $('#<?php print $id; ?>').parent().append('\
                            <div class="autocompletion">\
                                <div class="close">x</div>' +
                                options + '\
                            </div>\
                        ');
                        $('#<?php print $id; ?>').parent().find('div.autocompletion > div.close').click(function() {
                            <?php print $this->getId(); ?>_clear_options(); <?php
                            if ($this->hasAlternativeForm() == true) { ?>
                                $('div.form#<?php print $this->getAlternativeForm()->getId(); ?>').css('display', 'block'); <?php
                            } ?>
                        });
                        $('#<?php print $id; ?>').parent().find('div.autocompletion > div.option').click(function() {
                            var caption = $(this).find('div.display:first > div.caption:first').html();
                            $('#<?php print $this->getId(); ?>_result_display').val(caption);
                            $('#<?php print $this->getId(); ?>_result_caption').val(caption);
                            $('#<?php print $this->getId(); ?>_result').append($(this).find('div.data:first').html());
                            $('#<?php print $id; ?>').parent().children('div.autocompletion').remove(); <?php
                            print $this->getId(); ?>_show_result(); <?php
                            if ($this->hasAlternativeForm() == true) { ?>
                                $('div.form#<?php print $this->getAlternativeForm()->getId(); ?>').css('display', 'none'); <?php
                            } ?>
                        });
                    });
                }
                function <?php print $this->getId(); ?>_show_typing() {
                    $('div.formelement.type_autocompleting.<?php print $this->getRawName(); ?> table.grid.<?php print $this->getRawName(); ?> > tbody > tr > td.element.typing').parent().css('display', 'table-row');
                    $('div.formelement.type_autocompleting.<?php print $this->getRawName(); ?> table.grid.<?php print $this->getRawName(); ?> > tbody > tr > td.element.result').parent().css('display', 'none');
                }
                function <?php print $this->getId(); ?>_show_result() {
                    $('div.formelement.type_autocompleting.<?php print $this->getRawName(); ?> table.grid.<?php print $this->getRawName(); ?> > tbody > tr > td.element.typing').parent().css('display', 'none');
                    $('div.formelement.type_autocompleting.<?php print $this->getRawName(); ?> table.grid.<?php print $this->getRawName(); ?> > tbody > tr > td.element.result').parent().css('display', 'table-row');
                }
                $('#<?php print $this->getId(); ?>_result_change').click(function() {
                    $('#<?php print $this->getId(); ?>_result').children('input[type="hidden"]').remove(); <?php
                    print $this->getId(); ?>_show_typing (); <?php
                    print $this->getId(); ?>_load_options();
                        return false;
                }); <?php
                $value = $this->getValue();
                if (isset($value['result']['data']) == true) {
                    print $this->getId(); ?>_show_result(); <?php
                } else {
                    print $this->getId(); ?>_show_typing(); <?php
                }
                if (($this->hasAlternativeForm() == true) && ($this->getAlternativeForm()->isSwitchedOn() == false)) { ?>
                    $(document).ready(function() {
                        $('div.form#<?php print $this->getAlternativeForm()->getId(); ?>').css('display', 'none');
                    }); <?php
                } ?>
            </script><?php
            return parent::render() . ob_get_clean();
        }
        
    }