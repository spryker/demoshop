<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 */
class Sao_Zed_Sales_Module_Form_StatusOrder extends Zend_Form
{
    public function init()
    {
        $this->setAction('/sales/order-details/edit-order-status/')
            ->setMethod('post');

        $status = new ProjectA_Zed_Library_Form_Element_Select('status');

        $itemId = new ProjectA_Zed_Library_Form_Element_Hidden('id_sales_order');

        $submit = new ProjectA_Zed_Library_Form_Element_Submit('submit');

        $this->addElements(array(
            $status,
            $itemId,
            $submit
        ));
    }
}
