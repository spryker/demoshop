<?php

abstract class Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_Abstract_OrderInfoItem implements
    ProjectA_Zed_Library_Dependency_Factory_Interface,
    ProjectA_Zed_Library_Dependency_InitInterface
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /** @var int */
    protected $width;

    /** @var int */
    protected $height;

    /** @var Sao_Shared_Sales_Transfer_Order_Item */
    protected $item;



    /**
     * @param Sao_Shared_Sales_Transfer_Order_Item $item
     */
    public function __construct(Sao_Shared_Sales_Transfer_Order_Item $item)
    {
        $this->item = $item;
    }

    /**
     * @param $height
     * @return $this
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @param $width
     * @return $this
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return array
     */
    abstract public function toArray();

}
