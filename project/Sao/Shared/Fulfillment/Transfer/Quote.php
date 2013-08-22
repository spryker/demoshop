<?php

class Sao_Shared_Fulfillment_Transfer_Quote extends ProjectA_Shared_Library_Abstract_Object
{

    /** @var Sao_Shared_Sales_Transfer_Order_Item_Collection */
    protected $orderItems = 'Sao_Shared_Sales_Transfer_Order_Item_Collection';
    protected $_orderItems = [];

    /** @var string */
    protected $provider;
    protected $_provider = ['is_string'];

    /** @var int */
    protected $quoteId;
    protected $_quoteId = ['is_int'];

    /** @var string */
    protected $shippingAgent;
    protected $_shippingAgent = ['is_string'];

    /** @var string */
    protected $shippingProduct;
    protected $_shippingProduct = ['is_string'];

    /** @var int */
    protected $shippingPrice;
    protected $_shippingPrice = ['is_int'];

    /** @var int */
    protected $shippingFreight;
    protected $_shippingFreight = ['is_int'];

    /** @var int */
    protected $shippingTaxDuties;
    protected $_shippingTacDuties = ['is_int'];

    /** @var string */
    protected $shippingCurrencyCode;
    protected $_shippingCurrencyCode = ['is_string'];

    /** @var bool */
    protected $active;
    protected $_active = ['is_bool'];

    /** @var bool */
    protected $success;
    protected $_success = ['is_bool'];

    /** @var string */
    protected $errorMessage;
    protected $_errorMessage = ['is_string'];

    /** @var string */
    protected $internalOrderNumber;
    protected $_internalOrderNumber = ['is_string'];

    /** @var string */
    protected $providerOrderNumber;
    protected $_providerOrderNumber = ['is_string'];

    /** @var int */
    protected $idQuote;
    protected $_idQuote = ['is_int'];

    /** @var string */
    protected $uniqueQuoteKey;
    protected $_uniqueQuoteKey = ['is_string'];

    /**
     * @return string
     */
    public function getUniqueQuoteKey()
    {
        return $this->uniqueQuoteKey;
    }

    /**
     * @param $quoteUniqueKey
     * @return Sao_Shared_Fulfillment_Transfer_Quote
     */
    public function setUniqueQuoteKey($quoteUniqueKey)
    {
        $this->uniqueQuoteKey = $quoteUniqueKey;
        return $this;
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
     * @return Sao_Shared_Fulfillment_Transfer_Quote
     */
    public function setQuoteId($quoteId)
    {
        $this->quoteId = $quoteId;
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
     * @param string $shippingAgent
     * @return Sao_Shared_Fulfillment_Transfer_Quote
     */
    public function setShippingAgent($shippingAgent)
    {
        $this->shippingAgent = $shippingAgent;
        return $this;
    }

    /**
     * @return string
     */
    public function getShippingProduct()
    {
        return $this->shippingProduct;
    }

    /**
     * @param string $shippingProduct
     * @return Sao_Shared_Fulfillment_Transfer_Quote
     */
    public function setShippingProduct($shippingProduct)
    {
        $this->shippingProduct = $shippingProduct;
        return $this;
    }

    /**
     * @return int
     */
    public function getShippingPrice()
    {
        return $this->shippingPrice;
    }

    /**
     * @param int $shippingPrice
     * @return Sao_Shared_Fulfillment_Transfer_Quote
     */
    public function setShippingPrice($shippingPrice)
    {
        $this->shippingPrice = $shippingPrice;
        return $this;
    }

    /**
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return Sao_Shared_Fulfillment_Transfer_Quote
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return $this->success;
    }

    /**
     * @param bool $success
     * @return Sao_Shared_Fulfillment_Transfer_Quote
     */
    public function setSuccess($success)
    {
        $this->success = $success;
        return $this;
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param $errorMessage
     * @return Sao_Shared_Fulfillment_Transfer_Quote
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Item $item
     * @return Sao_Shared_Fulfillment_Transfer_Quote
     */
    public function addOrderItem(Sao_Shared_Sales_Transfer_Order_Item $item)
    {
        $this->orderItems->add($item);
        return $this;
    }

    /**
     * @return Sao_Shared_Sales_Transfer_Order_Item_Collection
     */
    public function getOrderItems()
    {
        return $this->orderItems;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Item_Collection $collection
     * @return Sao_Shared_Fulfillment_Transfer_Quote
     */
    public function setOrderItems(Sao_Shared_Sales_Transfer_Order_Item_Collection $collection)
    {
        $this->orderItems = $collection;
        return $this;
    }

    /**
     * @return string
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param string $printProvider
     * @return Sao_Shared_Fulfillment_Transfer_Quote
     */
    public function setProvider($printProvider)
    {
        $this->provider = $printProvider;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @return string
     */
    public function getInternalOrderNumber()
    {
        return $this->internalOrderNumber;
    }

    /**
     * @param string $internalOrderNumber
     * @return Sao_Shared_Fulfillment_Transfer_Quote
     */
    public function setInternalOrderNumber($internalOrderNumber)
    {
        $this->internalOrderNumber = $internalOrderNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getProviderOrderNumber()
    {
        return $this->providerOrderNumber;
    }

    /**
     * @param  $providerOrderNumber
     * @return Sao_Shared_Fulfillment_Transfer_Quote
     */
    public function setProviderOrderNumber($providerOrderNumber)
    {
        $this->providerOrderNumber = $providerOrderNumber;
        return $this;
    }

    /**
     * @param int $shippingTaxDuties
     * @return Sao_Shared_Fulfillment_Transfer_Quote
     */
    public function setShippingTaxDuties($shippingTaxDuties)
    {
        $this->shippingTaxDuties = $shippingTaxDuties;
        return $this;
    }

    /**
     * @return int
     */
    public function getShippingTaxDuties()
    {
        return $this->shippingTaxDuties;
    }

    /**
     * @param int $shippingFreight
     * @return Sao_Shared_Fulfillment_Transfer_Quote
     */
    public function setShippingFreight($shippingFreight)
    {
        $this->shippingFreight = $shippingFreight;
        return $this;
    }

    /**
     * @return int
     */
    public function getShippingFreight()
    {
        return $this->shippingFreight;
    }

    /**
     * @return int
     */
    public function getIdQuote()
    {
        return $this->idQuote;
    }

    /**
     * @param int $idQuote
     * @return Sao_Shared_Fulfillment_Transfer_Quote
     */
    public function setIdQuote($idQuote)
    {
        $this->idQuote = $idQuote;
        return $this;
    }

    /**
     * @return string
     */
    public function getShippingCurrencyCode()
    {
        return $this->shippingCurrencyCode;
    }

    /**
     * @param $shipmentCurrencyCode
     * @return Sao_Shared_Fulfillment_Transfer_Quote
     */
    public function setShippingCurrencyCode($shipmentCurrencyCode)
    {
        $this->shippingCurrencyCode = $shipmentCurrencyCode;
        return $this;
    }

}
