<?php

abstract class Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_Abstract_OrderInfo implements
    ProjectA_Zed_Library_Dependency_Factory_Interface,
    ProjectA_Zed_Library_Dependency_InitInterface
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /** @var array */
    protected $items;

    /**
     * @param Traversable $items
     */
    public function __construct(Traversable $items)
    {
        $this->items = $items;
    }

    abstract public function initAfterDependencyInjection();

    /**
     * @return array
     */
    public function toArray()
    {
        $orderInfo = [];
        /** @var Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_Abstract_OrderInfoItem $item */
        foreach ($this->items as $item) {
            $orderInfo[] = $item->toArray();
        }
        return $orderInfo;
    }

}
