<?php

class Sao_Zed_Catalog_Module_Form_Upload extends Zend_Form
{

    /**
     * @var string
     */
    protected $fileKey;

    /**
     * @param string $fileKey
     * @param array|null $options
     */
    public function __construct($fileKey, $options = null)
    {
        $this->fileKey = $fileKey;
        parent::__construct($options);
    }

    public function init()
    {
        $this->buildElements();
    }

    protected function buildElements()
    {
        $file = new Zend_Form_Element_File($this->fileKey);
        $file->setLabel(__('Upload File'))
                        ->setRequired(true);
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel(__('Submit'))
                        ->setAttrib('id', 'submitbutton');

        $this->addElements(array($file, $submit));
    }

}
