<?php

class Sao_Zed_Fulfillment_Component_Model_Api_Quote_Response extends Sao_Zed_Fulfillment_Component_Model_Api_Response_Abstract
{

    /** @var Sao_Zed_Fulfillment_Component_Model_Api_Quote_ShippingRate[] */
    protected $rates = [];

    /** @var int */
    protected $quoteId;

    /** @var string */
    protected $uniqueQuoteKey;

    /** @var Sao_Shared_Sales_Transfer_Order_Item_Collection */
    protected $items = null;


    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Api_Quote_ShippingRate $rate
     * @return $this
     */
    public function addRate(Sao_Zed_Fulfillment_Component_Model_Api_Quote_ShippingRate $rate)
    {
        $this->rates[] = $rate;
        return $this;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Quote_ShippingRate[]
     */
    public function getRates()
    {
        return $this->rates;
    }

    /**
     * @return int
     */
    public function getQuoteId()
    {
        return $this->quoteId;
    }

    /**
     * @param int $quoteId
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Quote_Response
     */
    public function setQuoteId($quoteId)
    {
        $this->quoteId = $quoteId;
        return $this;
    }

    /**
     * @param string $uniqueQuoteKey
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Quote_Response
     */
    public function setUniqueQuoteKey($uniqueQuoteKey)
    {
        $this->uniqueQuoteKey = $uniqueQuoteKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getUniqueQuoteKey()
    {
        return $this->uniqueQuoteKey;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Item_Collection $items
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Quote_Response
     */
    public function setItems(Sao_Shared_Sales_Transfer_Order_Item_Collection $items)
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @return null|Sao_Shared_Sales_Transfer_Order_Item_Collection
     */
    public function getItems()
    {
        return $this->items;
    }

}
