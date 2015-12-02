<?php

namespace Pyz\Zed\Sales\Persistence;

use Orm\Zed\Sales\Persistence\Base\SpySalesOrderQuery;
use Orm\Zed\Sales\Persistence\PavSalesOrderItemConfigurationQuery;
use Orm\Zed\Sales\Persistence\SpySalesDiscountCode;
use Orm\Zed\Sales\Persistence\SpySalesDiscountCodeQuery;
use Orm\Zed\Sales\Persistence\SpySalesOrderItemQuery;
use SprykerFeature\Zed\Sales\Persistence\SalesQueryContainer as SprykerSalesQueryContainer;
use Orm\Zed\Sales\Persistence\SpySalesDiscountQuery;

class SalesQueryContainer extends SprykerSalesQueryContainer implements SalesQueryContainerInterface
{
    /**
     * @param int $idSalesOrder
     * @return SpySalesOrderQuery
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
     * @param int $idOrderItem
     * @return SpySalesOrderItemQuery
     */
    public function querySalesOrderItemById($idOrderItem)
    {
        $query = SpySalesOrderItemQuery::create('orderItem')
            ->filterByIdSalesOrderItem($idOrderItem);

        return $query;
    }

    /**
     * @param int $idSalesOrder
     * @return SpySalesDiscountQuery
     */
    public function querySalesDiscountByOrderId($idSalesOrder)
    {
        return SpySalesDiscountQuery::create('salesDiscount')
            ->filterByFkSalesOrder($idSalesOrder);
    }

    /**
     * @param int $idSalesOrderItem
     * @return PavSalesOrderItemConfigurationQuery
     */
    public function querySalesOrderItemConfigurationByItemId($idSalesOrderItem)
    {
        return PavSalesOrderItemConfigurationQuery::create()
            ->filterByFkSalesOrderItem($idSalesOrderItem);
    }

    /**
     * @param int $idSalesDiscount
     * @return SpySalesDiscountCode
     */
    public function querySalesDiscountCodeBySalesDiscountId($idSalesDiscount)
    {
        return SpySalesDiscountCodeQuery::create()
            ->filterByFkSalesDiscount($idSalesDiscount);
    }

}
