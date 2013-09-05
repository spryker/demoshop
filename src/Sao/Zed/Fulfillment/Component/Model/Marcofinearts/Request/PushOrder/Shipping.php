<?php

class Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder_Shipping
    extends Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_Abstract_Shipping
{
    /** @var string */
    protected $account;

    /** @var string */
    protected $service;

    /** @var string */
    protected $packaging;

    /** @var string */
    protected $notes;

    /** @var int */
    protected $shipping_cost;

    /**
     * @param $account
     * @return $this
     */
    public function setAccount($account)
    {
        $this->account = $account;
        return $this;
    }

    /**
     * @param string $carrier
     * @return $this|void
     */
    public function setCarrier($carrier)
    {
        $this->carrier = $carrier;
        return $this;
    }

    /**
     * @param $notes
     * @return $this
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * @param $packaging
     * @return $this
     */
    public function setPackaging($packaging)
    {
        $this->packaging = $packaging;
        return $this;
    }

    /**
     * @param $service
     * @return $this
     */
    public function setService($service)
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @param $shipping_cost
     * @return $this
     */
    public function setShippingCost($shipping_cost)
    {
        $this->shipping_cost = $shipping_cost;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'account'       => $this->account,
            'carrier'       => $this->carrier,
            'service'       => $this->service,
            'packaging'     => $this->packaging,
            'notes'         => $this->notes,
            'shipping_cost' => $this->shipping_cost
        ];
    }

}
