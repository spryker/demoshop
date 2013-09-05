<?php
/**
 * Class Description
 *
 * Date: 12.06.12
 * @author: Robert Hänsel
 * @version: $Id$
 */
class Sao_Zed_Sales_Module_Form_Shipping extends Zend_Form
{
    public function init()
    {
        $itemId = new ProjectA_Zed_Library_Form_Element_Hidden('id_sales_shipping');

        $displayName = new ProjectA_Zed_Library_Form_Element_Text('display_name');
        $displayName->setLabel('Name')
            ->setRequired('true');

        $amount = new ProjectA_Zed_Library_Form_Element_Text('gross_amount');
        $amount->setLabel('Amount')
            ->setRequired('true');

        $submit = new ProjectA_Zed_Library_Form_Element_Submit('submit');

        $this->addElements(array(
            $itemId,
            $displayName,
            $amount,
            $submit
        ));
    }
}
