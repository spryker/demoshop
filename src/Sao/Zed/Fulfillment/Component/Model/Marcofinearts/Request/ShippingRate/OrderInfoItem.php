<?php

class Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_ShippingRate_OrderInfoItem
    extends Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_Abstract_OrderInfoItem

{
    /** @var int */
    protected $length;

    /** @var int */
    protected $weight;

    public function initAfterDependencyInjection()
    {
        $sku = $this->item->getSku();
        $finder = $this->factory->getModelFinder();
        $product = $finder->getProductBySku($sku);

        $itemHeight = $product[Sao_Shared_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_SHIP_HEIGHT];
        $itemWidth = $product[Sao_Shared_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_SHIP_WIDTH];
        $itemLength = $product[Sao_Shared_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_SHIP_DEPTH];
        $itemWeight = $product[Sao_Shared_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_SHIP_WEIGHT];

        $this->setHeight($itemHeight);
        $this->setWidth($itemWidth);
        $this->setLength($itemLength);
        $this->setWeight($itemWeight);
    }

    /**
     * @param $length
     * @return $this
     */
    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @param $weight
     * @return $this
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    public function flatten()
    {
        $objectVars = get_object_vars($this);
        $array = array_filter(
            $objectVars,
            function ($var) {
                return !is_object($var);
            }
        );
        return $array;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'width' => (int)$this->width,
            'height' => (int)$this->height,
            'length' => (int)$this->length,
            'weight' => $this->weight,
        ];
    }
}
