<?php

class Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder_OrderData
    extends Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_Abstract_OrderData

{
    /** @var string */
    protected $xid;

    /** @var string */
    protected $ship_deadline;

    /** @var string */
    protected $isgift;

    /** @var string */
    protected $gift_to;

    /** @var string */
    protected $gift_from;

    /** @var string */
    protected $message;

    /** @var string */
    protected $track_url;

    /** @var string */
    protected $invoice;

    /** @var Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder_BillingAddress */
    protected $billing_address;

    /** @var Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder_ShippingAddress */
    protected $shipping_address;

    /** @var Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder_OrderInfo */
    protected $order_info;

    /** @var Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder_Shipping */
    protected $shipping;

    public function createFromOrder($order)
    {
    }

    public function addBillingAddressFromTransferAddress()
    {

    }

    public function addShippingAddressFromTransferAddress()
    {

    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder_BillingAddress $billing_address
     */
    public function setBillingAddress($billing_address)
    {
        $this->billing_address = $billing_address;
    }

    /**
     * @param string $gift_from
     */
    public function setGiftFrom($gift_from)
    {
        $this->gift_from = $gift_from;
    }

    /**
     * @param string $gift_to
     */
    public function setGiftTo($gift_to)
    {
        $this->gift_to = $gift_to;
    }

    /**
     * @param string $invoice
     */
    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * @param string $isgift
     */
    public function setIsgift($isgift)
    {
        $this->isgift = $isgift;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder_OrderInfo $order_info
     */
    public function setOrderInfo($order_info)
    {
        $this->order_info = $order_info;
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder_Shipping $shipping
     */
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder_ShippingAddress $shipping_address
     */
    public function setShippingAddress($shipping_address)
    {
        $this->shipping_address = $shipping_address;
    }

    /**
     * @param string $ship_deadline
     */
    public function setShipDeadline($ship_deadline)
    {
        $this->ship_deadline = $ship_deadline;
    }

    /**
     * @param string $track_url
     */
    public function setTrackUrl($track_url)
    {
        $this->track_url = $track_url;
    }

    /**
     * @param string $xid
     */
    public function setXid($xid)
    {
        $this->xid = $xid;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'xid'               => $this->xid,
            'ship_deadline'     => $this->ship_deadline,
            'isgift'            => $this->isgift,
            'gift_to'           => $this->gift_to,
            'gift_from'         => $this->gift_from,
            'message'           => $this->message,
            'track_url'         => $this->track_url,
            'invoice'           => $this->invoice,
            'billing_address'   => $this->billing_address->toArray(),
            'shipping_address'  => $this->shipping_address->toArray(),
            'order_info'        => $this->order_info->toArray(),
            'shipping'          => $this->shipping->toArray(),
        ];
    }

}
