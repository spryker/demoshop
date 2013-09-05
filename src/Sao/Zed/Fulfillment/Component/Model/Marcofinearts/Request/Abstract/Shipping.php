<?php

abstract class Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_Abstract_Shipping
{
    /** @var string */
    protected $carrier;

    /**
     * @param string $carrier
     */
    public function setCarrier($carrier)
    {
        $this->carrier = $carrier;
    }

    /**
     * @return string
     */
    public function getCarrier()
    {
        return $this->carrier;
    }
}
