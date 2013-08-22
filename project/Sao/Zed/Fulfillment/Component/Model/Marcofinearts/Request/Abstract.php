<?php

abstract class Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_Abstract
{

    /** @var Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_Abstract_OrderData */
    protected $orderData;

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_Abstract_OrderData $orderData
     * @return $this
     */
    public function setOrderData(Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_Abstract_OrderData $orderData)
    {
        $this->orderData = $orderData;
        return $this;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_Abstract_OrderData
     */
    public function getOrderData()
    {
        return $this->orderData;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->orderData->toArray();
    }

}
