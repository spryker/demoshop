<?php

namespace Pyz\Zed\Sales\Persistence;

use Orm\Zed\Sales\Persistence\Base\SpySalesOrderQuery;
use Orm\Zed\Sales\Persistence\SpySalesOrderItemQuery;
use SprykerFeature\Zed\Sales\Persistence\SalesQueryContainer as SprykerSalesQueryContainer;

class SalesQueryContainer extends SprykerSalesQueryContainer implements SalesQueryContainerInterface
{
    /**
     * @param $idSalesOrder
     * @return \Orm\Zed\Sales\Persistence\SpySalesOrderQuery
     */
    public function querySalesOrderDetailsById($idSalesOrder)
    {
        $query = SpySalesOrderQuery::create('order');
        $query->filterByIdSalesOrder($idSalesOrder);
        $query
            ->leftJoinShipmentMethod()
            ->letfJoinWith('order.BillingAddress billingAddress')
            ->leftJoinWith('billingAddress.Country billingCountry')
            ->leftJoinWith('order.ShippingAddress shippingAddress')
            ->leftJoinWith('shippingAddress.Country shippingCountry')
            ->leftJoinWith('order.ShipmentMethod shipmentMethod')
        ;

        return $query;
    }

    /**
     * @param $orderItemId
     * @return $this|SpySalesOrderItemQuery
     */
    public function querySalesOrderItemById($orderItemId)
    {
        $query = SpySalesOrderItemQuery::create('orderItem')
            ->filterByIdSalesOrderItem($orderItemId);

        return $query;
    }
}