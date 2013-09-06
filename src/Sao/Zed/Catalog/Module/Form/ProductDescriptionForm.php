<?php

class Sao_Zed_Catalog_Module_Form_ProductDescriptionForm extends Zend_Form
{

    public function init()
    {
        $textArea = new ProjectA_Zed_Library_Form_Element_Textarea('driving_characteristics');
        $textArea->setLabel(__('Driving Characteristics'));
        $this->addElement($textArea);

        $textArea = new ProjectA_Zed_Library_Form_Element_Textarea('tread_characteristics');
        $textArea->setLabel(__('Tread Characteristics'));
        $this->addElement($textArea);

        $textArea = new ProjectA_Zed_Library_Form_Element_Textarea('economical_characteristics');
        $textArea->setLabel(__('Economical Characteristics'));
        $this->addElement($textArea);

        for ($i=1; $i<=5; $i++) {
            $textField = new ProjectA_Zed_Library_Form_Element_Text('characteristic_' . $i);
            $textField->setLabel(__('Additional Characteristic ' . $i));
            $this->addElement($textField);
        }

        $hidden = new ProjectA_Zed_Library_Form_Element_Hidden('manufacturer');
        $this->addElement($hidden);

        $hidden = new ProjectA_Zed_Library_Form_Element_Hidden('tread_txt');
        $this->addElement($hidden);

        $submit = new ProjectA_Zed_Library_Form_Element_Submit('submit');
        $submit->setLabel(__('Save changes'));
        $this->addElement($submit);


    }
}