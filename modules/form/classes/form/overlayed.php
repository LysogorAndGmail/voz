<?php

    class Form_Overlayed extends Form {
        
        protected $_overlay;
        
        public function __construct() {
            
        }
        
        public function getOverlay() {
            if (is_null($this->_overlay) == false) $this->_overlay;
            $form = new Form_Overlay();
            $form->setForm($this);
            $this->_overlay = $form;
            return $this->_overlay;
        }
        
        public function render() {
            $data  = $this->getData();
            $files = $data['files'];
            unset($data['files']);
            ob_start(); ?>
            <div class=" overlay"><?php print $this->getOverlay()->render(); ?></div>
            <div class="underlay"><?php print parent::render(); ?></div>
            <script type="text/javascript">
                $(window).ready(function() { <?php
                    if ((empty($data) == false) || (empty($files) == false)) { ?>
                        $('#<?php print $this->getOverlay()->getId(); ?>').css('display', 'none'); <?php
                    }
                    if ((empty($data) == true ) && (empty($files) == true )) { ?>
                        $('#<?php print $this->getId(); ?>').css('display', 'none'); <?php
                    } ?>
                }); <?php
                if ($this->isSlidedUp() == true) { ?>
                    $('#<?php print $this->getOverlay()->getId(); ?> > table.markup > tbody > tr > td[class!="caption"]').slideToggle('slow', 'linear');
                    $('#<?php print $this->getOverlay()->getId(); ?> > table.markup > tbody > tr > td.caption a.overlay-switcher').css('display', 'none');
                    $('#<?php print $this->getOverlay()->getId(); ?> > table.markup > tbody > tr > td.caption').css('cursor', 'pointer').click(function() {
                        $('#<?php print $this->getOverlay()->getId(); ?> > table.markup > tbody > tr > td[class!="caption"]').slideToggle('slow', 'linear');
                        $('#<?php print $this->getId(); ?> > table.markup > tbody > tr > td[class!="caption"]').slideDown('slow', 'linear');
                    $('#<?php print $this->getOverlay()->getId(); ?> > table.markup > tbody > tr > td.caption a.overlay-switcher').fadeIn();
                    }); <?php
                } ?>
            </script><?php
            return ob_get_clean();
        }
        
    }