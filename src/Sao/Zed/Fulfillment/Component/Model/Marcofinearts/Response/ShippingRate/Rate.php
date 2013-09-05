<?php

class Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Response_ShippingRate_Rate
{

    /** @var string */
    protected $title;

    /** @var string */
    protected $method;

    /** @var string */
    protected $cost;

    /** @var string */
    protected $deliveryTime;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->setTitle($data['title']);
        $this->setMethod($data['method']);
        $this->setCost($data['cost']);
        $this->setTitle(($data['delivery_time']));
    }

    /**
     * @param $cost
     * @return $this
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
        return $this;
    }

    /**
     * @return string
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param $deliveryTime
     * @return $this
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
     * @param $method
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = $method;
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
     * @param $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

}
