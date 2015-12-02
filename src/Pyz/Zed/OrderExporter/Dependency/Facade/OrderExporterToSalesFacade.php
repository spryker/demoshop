<?php

namespace Pyz\Zed\OrderExporter\Dependency\Facade;

use Generated\Shared\Sales\ItemInterface;
use Generated\Shared\Sales\OrderInterface;
use Generated\Shared\Sales\SalesDiscountCodeInterface;
use Generated\Shared\Sales\SalesDiscountInterface;
use Generated\Shared\Sales\SalesItemConfigurationInterface;

interface OrderExporterToSalesFacade
{
    /**
     * @param int $orderItemId
     * @return ItemInterface
     */
    public function getOrderItemById($orderItemId);

    /**
     * @param int $idSalesOrder
     * @return OrderInterface
     */
    public function getSalesOrderById($idSalesOrder);

    /**
     * @param int $idSalesOrder
     * @return SalesDiscountInterface[]
     */
    public function getSalesDiscountsByOrderId($idSalesOrder);

    /**
     * @param int $idSalesOrderItem
     * @return SalesItemConfigurationInterface[]
     */
    public function getSalesOrderItemConfigurationByItemId($idSalesOrderItem);

    /**
     * @param int $idSalesDiscount
     * @return SalesDiscountCodeInterface
     */
    public function getSalesDiscountCodeBySalesDiscountId($idSalesDiscount);

    /**
     * @param int $idSalesDiscount
     * @return bool
     */
    public function hasDiscountCodeByDiscountId($idSalesDiscount);
}
