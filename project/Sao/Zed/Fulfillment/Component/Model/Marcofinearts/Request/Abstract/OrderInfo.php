<?php

abstract class Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_Abstract_OrderInfo
    implements ProjectA_Zed_Library_Dependency_Factory_Interface, ProjectA_Zed_Library_Dependency_InitInterface
{
    /** @var array */
    protected $items;

    /** @var Generated_Zed_Fulfillment_Component_Factory */
    protected $factory;

    public function __construct(Traversable $items)
    {
        $this->items = $items;
    }

    abstract public function initAfterDependencyInjection();

    /**
     * @param ProjectA_Zed_Library_Component_Interface_FactoryInterface $factory
     */
    public function setFactory(ProjectA_Zed_Library_Component_Interface_FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

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
