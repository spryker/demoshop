<?php
/**
 * @property $alternative_shipping_address
*/
class Sao_Yves_Checkout_Component_Form_AlternativeShippingAddress extends Sao_Yves_Library_Form_Model
{


    /**
     *
     */
    public function init()
    {
        $alternativeShippingAddress = new Sao_Yves_Library_Form_Element(Sao_Yves_Library_Form_Element::FIELD_checkBox, 'alternative_shipping_address', $this);
        $alternativeShippingAddress->setLabel(t(Sao_Yves_Library_L::ALTERNATIVE_SHIPPING_ADDRESS));
        $this->addElement($alternativeShippingAddress);
    }
}