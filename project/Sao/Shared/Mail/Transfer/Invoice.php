<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 */
class Sao_Shared_Mail_Transfer_Invoice extends Sao_Shared_Mail_Transfer_Order
{
    protected $billingAddress = 'Sao_Shared_Mail_Transfer_Address';
    protected $_billingAddress = array();

    protected $shippingAddress = 'Sao_Shared_Mail_Transfer_Address';
    protected $_shippingAddress = array();

    protected $items = 'Sao_Shared_Mail_Transfer_Item_Collection';
    protected $_items = array();

    protected $totals = 'Sao_Shared_Sales_Transfer_Totals';
    protected $_totals = array();

    /**
     * @return string
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Address $billingAddress
     * @return Sao_Shared_Mail_Transfer_OrderConfirmation
     */
    public function setBillingAddress(Sao_Shared_Sales_Transfer_Order_Address $billingAddress)
    {
        $this->billingAddress = $billingAddress;
        return $this;
    }

    /**
     * @return string
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Address $shippingAddress
     * @return Sao_Shared_Mail_Transfer_OrderConfirmation
     */
    public function setShippingAddress(Sao_Shared_Sales_Transfer_Order_Address $shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
        return $this;
    }

    /**
     * @return bool
     */
    public function getMultipleMerchants()
    {
        return $this->multipleMerchants;
    }

    /**
     * @param $multipleMerchants
     * @return Sao_Shared_Mail_Transfer_OrderConfirmation
     */
    public function setMultipleMerchants($multipleMerchants)
    {
        $this->multipleMerchants = $multipleMerchants;
        return $this;
    }

    /**
     * @return string
     */
    public function getMountingPartnerEmail()
    {
        return $this->mountingPartnerEmail;
    }

    /**
     * @param $mountingPartnerEmail
     * @return Sao_Shared_Mail_Transfer_OrderConfirmation
     */
    public function setMountingPartnerEmail($mountingPartnerEmail)
    {
        $this->mountingPartnerEmail = $mountingPartnerEmail;
        return $this;
    }

    /**
     * @return string
     */
    public function getMountingPartnerPhone()
    {
        return $this->mountingPartnerPhone;
    }

    /**
     * @param $mountingPartnerPhone
     * @return Sao_Shared_Mail_Transfer_OrderConfirmation
     */
    public function setMountingPartnerPhone($mountingPartnerPhone)
    {
        $this->mountingPartnerPhone = $mountingPartnerPhone;
        return $this;
    }

    /**
     * @return Sao_Shared_Mail_Transfer_Item_Collection
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param Sao_Shared_Mail_Transfer_Item_Collection $items
     * @return Sao_Shared_Mail_Transfer_OrderConfirmation
     */
    public function setItems(Sao_Shared_Mail_Transfer_Item_Collection $items)
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @return Sao_Shared_Sales_Transfer_Totals
     */
    public function getTotals()
    {
        return $this->totals;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Totals $totals
     * @return Sao_Shared_Mail_Transfer_OrderConfirmation
     */
    public function setTotals(Sao_Shared_Sales_Transfer_Totals $totals)
    {
        $this->totals = $totals;
        return $this;
    }
}
