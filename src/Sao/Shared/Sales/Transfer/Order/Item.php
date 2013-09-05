<?php

class Sao_Shared_Sales_Transfer_Order_Item extends ProjectA_Shared_Sales_Transfer_Order_Item
{

    protected $uniqueQuoteKey;
    protected $_uniqueQuoteKey = ['is_string'];

    protected $uniqueItemId;
    protected $_uniqueItemId = ['is_string'];

    /**
     * @var Sao_Shared_Catalog_Transfer_Product
     */
    protected $product = 'Sao_Shared_Catalog_Transfer_Product';
    protected $_product = array();

    protected $isMerged = null;
    protected $_isMerged = array();

    protected $totalDiscountOnItem = null;
    protected $_totalDiscountOnItem = array();

    /**
     * @return Sao_Shared_Catalog_Transfer_Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param Sao_Shared_Catalog_Transfer_Product $product
     *
     * @return Sao_Shared_Sales_Transfer_Order_Item
     */
    public function setProduct(Sao_Shared_Catalog_Transfer_Product $product)
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @param $offerKey
     *
     * @return Sao_Shared_Sales_Transfer_Order_Item
     */
    public function setUniqueQuoteKey($offerKey)
    {
        $this->uniqueQuoteKey = $offerKey;

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
     * @param bool $isMerged
     *
     * @return $this
     */
    public function setIsMerged($isMerged)
    {
        $this->isMerged = $isMerged;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsMerged()
    {
        return $this->isMerged;
    }

    /**
     * @param $totalDiscountOnItem
     *
     * @return $this
     */
    public function setTotalDiscountOnItem($totalDiscountOnItem)
    {
        $this->totalDiscountOnItem = $totalDiscountOnItem;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalDiscountOnItem()
    {
        return $this->totalDiscountOnItem;
    }

    /**
     * @param mixed $uniqueItemId
     *
     * @return Sao_Shared_Sales_Transfer_Order_Item
     */
    public function setUniqueItemId($uniqueItemId)
    {
        $this->uniqueItemId = $uniqueItemId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUniqueItemId()
    {
        return $this->uniqueItemId;
    }

}
