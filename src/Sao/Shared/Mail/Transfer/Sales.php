<?php

abstract class Sao_Shared_Mail_Transfer_Sales extends ProjectA_Shared_Mail_Transfer_Mail
{
    /**
     * backup structure from nu3 "Transfer_Mail"
     */

    protected $salutation = null;
    protected $_salutation = array('is_string');

    protected $lastName = null;
    protected $_lastName = array('is_string');

    protected $firstName = null;
    protected $_firstName = array('is_string');

    protected $billingAddress = 'Sao_Shared_Mail_Transfer_Address';
    protected $_billingAddress = array();

    protected $shippingAddress = 'Sao_Shared_Mail_Transfer_Address';
    protected $_shippingAddress = array();

    protected $items = 'Sao_Shared_Mail_Transfer_Item_Collection';
    protected $_items = array();

    protected $totals = 'Sao_Shared_Sales_Transfer_Totals';
    protected $_totals = array();

    protected $paymentMethod = null;
    protected $_paymentMethod = array('is_string');

    /**
     * @return string
     */
    public function getSalutation()
    {
        return $this->salutation;
    }

    /**
     * @param $salutation
     * @return Sao_Shared_Mail_Transfer_OrderConfirmation
     */
    public function setSalutation($salutation)
    {
        $this->salutation = $salutation;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param $lastName
     * @return Sao_Shared_Mail_Transfer_OrderConfirmation
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param $firstName
     * @return Sao_Shared_Mail_Transfer_OrderConfirmation
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    public function setBillingAddress($billingAddress)
    {
        $this->billingAddress = $billingAddress;
    }

    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setItems($items)
    {
        $this->items = $items;
    }

    public function getTotals()
    {
        return $this->totals;
    }

    public function setTotals($totals)
    {
        $this->totals = $totals;
    }

    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

}
