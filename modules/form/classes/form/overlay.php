<?php

    class Form_Overlay extends Form {
        
        public function __construct() {
            parent::__construct();
            $this->setName('overlay');
        }
        
        public function getCaption() {
            ob_start(); ?>
            <a class="overlay-switcher">[править]</a><?php
            return parent::getCaption() . ob_get_clean();
        }
        
        public function setForm(Form $value) {
            parent::setForm($value);
            foreach ($value->getElements() as $element) {
                $overlayElement = new Form_Overlay_Element();
                $overlayElement->setName ($element->getRawName())
                               ->setLabel($element->getLabel())
                               ->setDescription($element->getDescription());
                switch ($element->getType()) {
                    case Form_Element::TYPE_ELEMENT_COMPLEX:
                    case Form_Element::TYPE_FORM:
                        $overlayElement->setValue($element->getObject());
                        break;
                    default:
                        $overlayElement->setValue($element->getValue());
                }
                $this->addElement($overlayElement);
            }
            foreach ($value->getSubforms() as $element) {
                $overlayElement = new Form_Overlay_Element();
                $overlayElement->setName ($element->getName ())
                               ->setLabel($element->getCaption())
                               ->setValue($element->getObject())
                               ->setDescription($element->getDescription());
                $this->addElement($overlayElement);
            }
            $this->setCaption($value->getCaption());
            return $this;
        }
        
        public function render() {
            ob_start(); ?>
            <script type="text/javascript">
                $('#<?php print $this->getId(); ?> > table.markup > tbody > tr > td.caption a.overlay-switcher').click(function() {
                    var height = Math.max(
                        $('#<?php print $this->getId(); ?>').height(),
                        $('#<?php print $this->getForm()->getId(); ?>').height()
                    );
                    $('#<?php print $this->getId(); ?>').parent().parent().css('height', height);
                    $('#<?php print $this->getId(); ?>').css('position', 'absolute').fadeOut(300, function() {
                        $(this).css('position', 'static');
                    });
                    $('#<?php print $this->getForm()->getId(); ?>').css('position', 'absolute').fadeIn(300, function() {
                        $(this).css('position', 'static');
                    });
                });
            </script><?php
            return parent::render() . ob_get_clean();
        }
        
    }