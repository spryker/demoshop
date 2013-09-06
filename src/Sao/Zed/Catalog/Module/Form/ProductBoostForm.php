<?php

class Sao_Zed_Catalog_Module_Form_ProductBoostForm extends Zend_Form
{

    public function init()
    {
        $this->setAttrib('id', 'categoryBoostForm');
        $boost = new ProjectA_Zed_Library_Form_Element_Select('boost');
        $boost->setLabel(__('Boost Value'));
        $boost->setMultiOptions($this->getBoostValues());
        $this->addElement($boost);

        $productId = new ProjectA_Zed_Library_Form_Element_Hidden('id');
        $this->addElement($productId);

        $categoryNameId = new ProjectA_Zed_Library_Form_Element_Hidden('categoryNameId');
        $this->addElement($categoryNameId);

        $submit = new ProjectA_Zed_Library_Form_Element_Submit('submit');
        $submit->setLabel(__('Save changes'));
        $this->addElement($submit);
    }

    /**
     * @return array
     */
    protected function getBoostValues()
    {
        $values = array();

        // 100 for Danny
        for ($i = 0; $i <= 100; $i++)
        {
            if ($i == 0) {
                $values[$i] = 'no boost';
            } else {
                $values[$i] = $i;
            }
        }

        return $values;
    }
}