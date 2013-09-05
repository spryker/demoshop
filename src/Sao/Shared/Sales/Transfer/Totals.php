<?php

class Sao_Shared_Sales_Transfer_Totals extends ProjectA_Shared_Sales_Transfer_Totals
{

    protected $subtotalWithoutItemExpenses = null;
    protected $_subtotalWithoutItemExpenses = array();

    protected $shippingCostsWithoutDiscounts = null;
    protected $_shippingCostsWithoutDiscounts = array();

    protected $freightCosts = null;
    protected $_freightCosts = array('is_int');

    protected $customsAndDuties = null;
    protected $_customsAndDuties = array('is_int');

    protected $stateTaxAmount = null;
    protected $_stateTaxAmount = array('is_int');

    protected $cartTotalForCartPage = null;
    protected $_cartTotalForCartPage = array('is_int');

    protected $cartTotalForReviewPage = null;
    protected $_cartTotalForReviewPage = array('is_int');

    /**
     * @param $subtotalWithoutItemExpenses
     * @return Sao_Shared_Sales_Transfer_Totals
     */
    public function setSubtotalWithoutItemExpenses($subtotalWithoutItemExpenses)
    {
        $this->subtotalWithoutItemExpenses = $subtotalWithoutItemExpenses;
        return $this;
    }

    /**
     * @return int
     */
    public function getSubtotalWithoutItemExpenses()
    {
        return $this->subtotalWithoutItemExpenses;
    }

    /**
     * @param $shippingCostsWithoutDiscounts
     * @return Sao_Shared_Sales_Transfer_Totals
     */
    public function setShippingCostsWithoutDiscounts($shippingCostsWithoutDiscounts)
    {
        $this->shippingCostsWithoutDiscounts = $shippingCostsWithoutDiscounts;
        return $this;
    }

    /**
     * @return int
     */
    public function getShippingCostsWithoutDiscounts()
    {
        return $this->shippingCostsWithoutDiscounts;
    }

    /**
     * @param int $stateTaxAmount
     * @return Sao_Shared_Sales_Transfer_Totals
     */
    public function setStateTaxAmount($stateTaxAmount)
    {
        $this->stateTaxAmount = $stateTaxAmount;
        return $this;
    }

    /**
     * @return int
     */
    public function getStateTaxAmount()
    {
        return $this->stateTaxAmount;
    }

    /**
     * @param $cartTotalForReviewPage
     * @return $this
     */
    public function setCartTotalForReviewPage($cartTotalForReviewPage)
    {
        $this->cartTotalForReviewPage = $cartTotalForReviewPage;
        return $this;
    }

    /**
     * @return null
     */
    public function getCartTotalForReviewPage()
    {
        return $this->cartTotalForReviewPage;
    }

    /**
     * @param $cartTotalForCartPage
     * @return $this
     */
    public function setCartTotalForCartPage($cartTotalForCartPage)
    {
        $this->cartTotalForCartPage = $cartTotalForCartPage;
        return $this;
    }

    /**
     * @return null
     */
    public function getCartTotalForCartPage()
    {
        return $this->cartTotalForCartPage;
    }

    /**
     * @param int $customsAndDuties
     * @return Sao_Shared_Sales_Transfer_Totals
     */
    public function setCustomsAndDuties($customsAndDuties)
    {
        $this->customsAndDuties = $customsAndDuties;
        return $this;
    }

    /**
     * @return int
     */
    public function getCustomsAndDuties()
    {
        return $this->customsAndDuties;
    }

    /**
     * @param $freightCosts
     * @return Sao_Shared_Sales_Transfer_Totals
     */
    public function setFreightCosts($freightCosts)
    {
        $this->freightCosts = $freightCosts;
        return $this;
    }

    /**
     * @return int
     */
    public function getFreightCosts()
    {
        return $this->freightCosts;
    }

}
