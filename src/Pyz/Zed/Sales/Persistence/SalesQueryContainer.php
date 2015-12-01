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

    /**
     * @param int $salesOrderId
     * @return SpySalesDiscountQuery
     */
    public function querySalesDiscountByOrderId($salesOrderId)
    {
        return SpySalesDiscountQuery::create('salesDiscount')
            ->filterByFkSalesOrder($salesOrderId);
    }

    /**
     * @param int $salesOrderItemId
     * @return PavSalesOrderItemConfigurationQuery
     */
    public function querySalesOrderItemConfigurationByItemId($salesOrderItemId)
    {
        return PavSalesOrderItemConfigurationQuery::create()
            ->filterByFkSalesOrderItem($salesOrderItemId);
    }

    /**
     * @param int $salesDiscountId
     * @return SpySalesDiscountCode
     */
    public function querySalesDiscountCodeBySalesDiscountId($salesDiscountId)
    {
        return SpySalesDiscountCodeQuery::create()
            ->filterByFkSalesDiscount($salesDiscountId);
    }
}
