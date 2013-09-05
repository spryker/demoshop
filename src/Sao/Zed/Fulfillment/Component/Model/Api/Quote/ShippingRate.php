<?php

class Sao_Zed_Fulfillment_Component_Model_Api_Quote_ShippingRate
{

    /** @var string */
    protected $shippingAgent;

    /** @var string */
    protected $method;

    /** @var int */
    protected $price;

    /** @var int */
    protected $baseFreight;

    /** @var int */
    protected $tax;

    /** @var string */
    protected $deliveryTime;

    /**
     * @param $shippingAgent
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Quote_ShippingRate
     */
    public function setShippingAgent($shippingAgent)
    {
        $this->shippingAgent = $shippingAgent;
        return $this;
    }

    /**
     * @return string
     */
    public function getShippingAgent()
    {
        return $this->shippingAgent;
    }

    /**
     * @param $name
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Quote_ShippingRate
     */
    public function setMethod($name)
    {
        $this->method = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param $total
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Quote_ShippingRate
     */
    public function setPrice($total)
    {
        $this->price = $total;
        return $this;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param $baseFreight
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Quote_ShippingRate
     */
    public function setBaseFreight($baseFreight)
    {
        $this->baseFreight = $baseFreight;
        return $this;
    }

    /**
     * @return int
     */
    public function getBaseFreight()
    {
        return $this->baseFreight;
    }

    /**
     * @param $tax
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Quote_ShippingRate
     */
    public function setTax($tax)
    {
        $this->tax = $tax;
        return $this;
    }

    /**
     * @return int
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * @param $deliveryTime
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Quote_ShippingRate
     */
    public function setDeliveryTime($deliveryTime)
    {
        $this->deliveryTime = $deliveryTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryTime()
    {
        return $this->deliveryTime;
    }

    /**
     * @return bool
     */
    public function hasPrice()
    {
        return (!empty($this->price) && $this->price > 0);
    }

}
