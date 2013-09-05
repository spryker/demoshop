<?php

class Sao_Zed_Catalog_Module_Form_ProductDetailForm extends Zend_Form
{

    /**
     * @var array 
     */
    private $data;
    
    
    public function __construct(array $productData)
    {
        $this->data = $productData;
        parent::__construct();
    }
    
    public function init()
    {
        $this->buildElements();
    }
    
    protected function buildElements()
    {
        foreach ($this->data as $key => $value) {
            $element = new ProjectA_Zed_Library_Form_Element_Text($key);
            //$element->setBelongsTo('config[value]');
            $element->setLabel($key);
            $element->setValue($value);
            $this->addElement($element);
        }
    }
    
}
