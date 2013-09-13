<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 */
class Pyz_Shared_Mail_Transfer_Invoice extends Pyz_Shared_Mail_Transfer_Order
{
    protected $billingAddress = 'Pyz_Shared_Mail_Transfer_Address';
    protected $_billingAddress = array();

    protected $shippingAddress = 'Pyz_Shared_Mail_Transfer_Address';
    protected $_shippingAddress = array();

    protected $items = 'Pyz_Shared_Mail_Transfer_Item_Collection';
    protected $_items = array();

    protected $totals = 'Pyz_Shared_Sales_Transfer_Totals';
    protected $_totals = array();

    /**
     * @return string
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @param Pyz_Shared_Sales_Transfer_Order_Address $billingAddress
     * @return Pyz_Shared_Mail_Transfer_OrderConfirmation
     */
    public function setBillingAddress(Pyz_Shared_Sales_Transfer_Order_Address $billingAddress)
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
     * @param Pyz_Shared_Sales_Transfer_Order_Address $shippingAddress
     * @return Pyz_Shared_Mail_Transfer_OrderConfirmation
     */
    public function setShippingAddress(Pyz_Shared_Sales_Transfer_Order_Address $shippingAddress)
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
     * @return Pyz_Shared_Mail_Transfer_OrderConfirmation
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
     * @return Pyz_Shared_Mail_Transfer_OrderConfirmation
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
     * @return Pyz_Shared_Mail_Transfer_OrderConfirmation
     */
    public function setMountingPartnerPhone($mountingPartnerPhone)
    {
        $this->mountingPartnerPhone = $mountingPartnerPhone;
        return $this;
    }

    /**
     * @return Pyz_Shared_Mail_Transfer_Item_Collection
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param Pyz_Shared_Mail_Transfer_Item_Collection $items
     * @return Pyz_Shared_Mail_Transfer_OrderConfirmation
     */
    public function setItems(Pyz_Shared_Mail_Transfer_Item_Collection $items)
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @return Pyz_Shared_Sales_Transfer_Totals
     */
    public function getTotals()
    {
        return $this->totals;
    }

    /**
     * @param Pyz_Shared_Sales_Transfer_Totals $totals
     * @return Pyz_Shared_Mail_Transfer_OrderConfirmation
     */
    public function setTotals(Pyz_Shared_Sales_Transfer_Totals $totals)
    {
        $this->totals = $totals;
        return $this;
    }
}
