<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 */
class Sao_Zed_Sales_Module_Form_Status extends Zend_Form
{
    public function init()
    {
        $this->setAction('/sales/order-details/edit-status/')
            ->setMethod('post');

        $status = new ProjectA_Zed_Library_Form_Element_Select('status');

        $itemId = new ProjectA_Zed_Library_Form_Element_Hidden('id_sales_order_item');

        $submit = new ProjectA_Zed_Library_Form_Element_Submit('submit');

        $this->addElements(array(
            $status,
            $itemId,
            $submit
        ));
    }
}
