<?php

    class Controller_Form_Sample extends Controller_Authorise {
        
        public function action_index() {
            $text = new Form_Element_Text();
            $text->setName('text')
                 ->setLabel('Пример текстового поля')
                 ->setDescription('Это просто пример текстового поля')
                 ->setValue('Значение по умолчанию для этого элемента (&quot;' . $text->getLabel() . '&quot;)')
                 ->setValidation(function($element) {
                     $element->addError('А вот это вот - пример ошибки');
                     $element->addError('... и ещё один пример ошибки');
                 });
            $textarea = new Form_Element_Textarea();
            $textarea->setName('textarea')
                     ->setLabel('Пример текстовой области')
                     ->setDescription('Это просто пример текстовой области')
                     ->setValue('Значение по умолчанию для этого элемента (&quot;' . $textarea->getLabel() . '&quot;)');
            $select = new Form_Element_Select();
            $select->setName('select')
                   ->setLabel('Пример поля выбора')
                   ->setDescription('Это просто пример поля')
                   ->setOptions(array(
                       ''  => '--- Выберите вариант ---',
                       '1' => 'Вариант 1',
                       '2' => 'Вариант 2',
                       '3' => 'Вариант 3'
                   ));
            $radio = new Form_Element_Radio();
            $radio->setName('radio')
                  ->setLabel('Пример группы переключателей')
                  ->setDescription('Это просто пример группы переключателей')
                  ->setOptions(array(
                       '1' => 'Вариант 1',
                       '2' => 'Вариант 2',
                       '3' => 'Вариант 3'
                   ));
            $checkbox = new Form_Element_Checkbox();
            $checkbox->setName('checkbox')
                     ->setLabel('Пример поля-флага')
                     ->setDescription('Это просто пример поля-флага');
            $submit = new Form_Control_Submit();
            $subform = new Form();
            $subform->setName('subform')
                    ->setCaption('Пример подформы')
                    ->setDescription('
                        Подформы - это формы, которые являются дочерними
                        по отношению к какой-либо другой форме. Явным образом
                        это не видно, но очень важно с технической точки зрения -
                        мы можем использовать одну и ту же форму для в разных
                        местах сайта, не нуждаясь в том, чтобы писать её каждый
                        раз заново. Подформы отличаются от основной формы тем,
                        что, за исключением редких случаев, не могут иметь
                        собственных элементов управления (т.е. "кнопок").
                    ')
                    ->addElement($text);
            $subform2 = new Form();
            $subform2->setName('subform2')
                    ->setCaption('Ещё один пример подформы')
                    ->setDescription('
                        У любой формы может быть множество дочерних.
                        Отображаться они могут, как и элементы, в несколько
                        колонок. Кроме того, в обозримом будущем будет
                        реализовано отображение подформ в виде "вкладок".
                    ')
                    ->addElement($textarea);
            $form = new Form();
            $form->setName('sample')
                 ->setMethod(Form::METHOD_POST)
                 ->setCaption('Пример формы')
                 ->setDescription('
                     Это просто пример формы. В первую очередь следует заметить
                     то, что мы, во-первых, теперь не нуждаемся в написании
                     html-кода форм (код генерируется автоматически) и,
                     во-вторых, можем легко влиять на отображение (к примеру,
                     количество колонок, по-умолчанию равное единице, может быть
                     легко изменено на произвольное значение вызовом всего лишь
                     одной функции). Так же любая форма теперь растягивается на
                     всю ширину содержащего её блока, что является частью
                     концепции "резиновой" вёрстки. Всё это экономит нам время,
                     приводит все формы с единообразному отображению и позволяет
                     вынести худоственное оформление форм на качественно новый
                     уровень. Экономии времени и сил так же способствует
                     автоматическая обработка ошибок.
                 ')
                 ->addElement($text)
                 ->addElement($textarea)
                 ->addElement($select)
                 ->addElement($radio)
                 ->addElement($checkbox)
                 ->addControl($submit)
                 ->addSubform($subform)
                 ->addSubform($subform2);
            $form->getGrid('elements')->setColumns(1);
            $form->getGrid('subforms')->setColumns(2);
            ob_start();
            print $form->render();
            $this->template->content = ob_get_clean() . '<br /><br />';
        }
    }