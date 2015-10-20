<?php

namespace Pyz\Zed\Sales\Persistence;

use SprykerFeature\Zed\Sales\Persistence\Propel\Base\SpySalesOrderQuery;
use SprykerFeature\Zed\Sales\Persistence\SalesQueryContainer as SprykerSalesQueryContainer;

class SalesQueryContainer extends SprykerSalesQueryContainer implements SalesQueryContainerInterface
{
    /**
     * @param $idSalesOrder
     * @return \SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrderQuery
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
}