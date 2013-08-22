<?php

class Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_ShippingRate_OrderData
    extends Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_Abstract_OrderData
{
    /** @var Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_ShippingRate_ShippingAddress */
    protected $shipping_address;

    /** @var Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_ShippingRate_OrderInfo */
    protected $order_info;

    /** @var Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_ShippingRate_Shipping */
    protected $shipping;

    /**
     * @param $order_info
     * @return $this
     */
    public function setOrderInfo($order_info)
    {
        $this->order_info = $order_info;
        return $this;
    }

    /**
     * @param $shipping
     * @return $this
     */
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;
        return $this;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_ShippingRate_Shipping
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * @param $shipping_address
     * @return $this
     */
    public function setShippingAddress($shipping_address)
    {
        $this->shipping_address = $shipping_address;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'shipping_address' => $this->shipping_address->toArray(),
            'order_info'       => $this->order_info->toArray(),
            'shipping'         => $this->shipping->toArray(),
        ];
    }

}
