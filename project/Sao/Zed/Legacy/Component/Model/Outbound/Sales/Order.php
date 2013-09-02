<?php

class Sao_Zed_Legacy_Component_Model_Outbound_Sales_Order
{
    /**
     * @var Generated_Zed_Legacy_Component_Factory
     */
    protected $factory;

    /**
     * @param Sao_Shared_Sales_Transfer_Order $transferOrder
     *
     * @return Sao_Zed_Legacy_Persistence_LegacySalesOrder
     */
    public function saveOrder(Sao_Shared_Sales_Transfer_Order $transferOrder)
    {
        // prepare
        $order = $this->getOrderEntity();
        $order->setPrimaryKey($transferOrder->getIdSalesOrder());
        $order->setUserId($transferOrder->getLegacyUserId());

        $order->save();

        return $order;
    }

    /**
     * @return Sao_Zed_Legacy_Persistence_LegacySalesOrder
     */
    protected function getOrderEntity()
    {
        $order = Generated_Zed_EntityLoader::getSaoLegacySalesOrder();
        return $order;
    }

}
