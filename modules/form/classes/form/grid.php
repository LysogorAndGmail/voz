<?php

    class Form_Grid {
        
        protected $_name;
        protected $_elements;
        protected $_columns;
        
        public function __construct($name, $elements = array()) {
            $this->setName($name)->setElements($elements)->setColumns(1);
        }
        
        public function setName($value) {
            $this->_name = $value;
            return $this;
        }
        
        public function getName() {
            return $this->_name;
        }
        
        public function setElements(array $value) {
            $this->_elements = $value;
            return $this;
        }
        
        public function getElements() {
            return $this->_elements;
        }
        
        public function removeElement($name) {
            if (isset($this->_elements[$name]) == false) return $this;
            unset($this->_elements[$name]);
            return $this;
        }
        
        public function setColumns($value) {
            $value = abs(intval($value));
            if ($value > 0) $this->_columns = $value;
            return $this;
        }
        
        public function getColumns() {
            return $this->_columns;
        }
        
        protected function _filterElements() {
            foreach ($this->_elements as $key => $element) {
                if (method_exists($element, 'getType') == false) continue;
                if ($element->getType() != Form_Element::TYPE_ELEMENT_HIDDEN) continue;
                unset($this->_elements[$key]);
            }
            return $this;
        }
        
        protected function _sortElements() {
            usort($this->_elements, function($x, $y) {
                $orderX = $x->getOrder();
                $orderY = $y->getOrder();
                if ($orderX == $orderY) return 0;
                return ($orderX < $orderY) ? -1 : 1;
            });
            return $this;
        }
        
        public function render() {
            $this->_filterElements()
                 ->_sortElements();
            ob_start(); ?>
            <table class="grid <?php print $this->getName(); ?>" width="100%" cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    <tr><?php
                        $counter = 0;
                        $columnsCounter = 0;
                        foreach ($this->getElements() as $element) {
                            if ($columnsCounter > 0) { ?><td class="divider vertical">&nbsp;</td><?php } ?>
                            <td class="element type_<?php print $element->getType(); ?> <?php print $element->getRawName(); ?>"><?php
                                print $element->render(); ?>
                            </td><?php
                            $counter ++;
                            $columnsCounter ++;
                            if ($columnsCounter >= $this->getColumns()) {
                                $columnsCounter = 0;
                                if ($counter == count($this->getElements())) break; ?>
                                </tr>
                                <tr><?php
                                    for ($i = 0; $i < $this->getColumns(); $i ++) {
                                        if ($i > 0) { ?><td class="divider node">&nbsp;</td><?php } ?>
                                        <td class="divider horizontal">&nbsp;</td><?php
                                    } ?>
                                </tr>
                                <tr><?php
                            }
                        }
                        if ($counter != count($this->getElements())) {
                            if ($columnsCounter < $this->getColumns()) {
                                if ($columnsCounter > 0) { ?><td class="divider vertical">&nbsp;</td><?php } ?>
                                <td>&nbsp;</td><?php
                            }
                        } ?>
                    </tr>
                </tbody>
            </table><?php
            return ob_get_clean();
        }
        
        public function __toString() {
            return $this->render();
        }
        
    }