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
            ->innerJoinShipmentMethod()
            ->innerJoinWith('order.BillingAddress billingAddress')
            ->innerJoinWith('billingAddress.Country billingCountry')
            ->innerJoinWith('order.ShippingAddress shippingAddress')
            ->innerJoinWith('shippingAddress.Country shippingCountry')
            ->innerJoinWith('order.ShipmentMethod shipmentMethod')
        ;

        return $query;

    }
}