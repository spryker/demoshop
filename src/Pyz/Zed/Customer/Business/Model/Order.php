<?php

namespace Pyz\Zed\Customer\Business\Model;

use ProjectA\Zed\Customer\Business\Model\Order as CoreOrder;
use Generated\Shared\Library\TransferLoader;
use Generated\Shared\Customer\Transfer\OrderItem as CustomerOrderItemTransfer;

class Order extends CoreOrder
{

    const FLAG_EXCLUDE_FROM_INVOICE = 'exclude from customer';
    const VIRTUAL_COLUMN_SALES_SKU = 'sales_sku';

    /**
     * In addition to its parents behaviour,
     * excludes orders that contain items flagged to be not shown to the customer.
     *
     * @param int $customerId
     * @return \PropelObjectCollection
     */
    protected function findOrdersByCustomerId($customerId)
    {
        $displayableOrders = new \PropelCollection;
        $orderEntityCollection = parent::findOrdersByCustomerId($customerId);

        foreach ($orderEntityCollection as $orderEntity) {
            /** exclude orders with excluded items */
            if (count($this->facadeOms->getItemsWithFlag($orderEntity, 'exclude from customer')) === 0) {
                $displayableOrders->append($orderEntity);
            }
        }

        return $displayableOrders;
    }

    /**
     * @param \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $orderEntity
     * @return \Generated\Shared\Customer\Transfer\OrderItemCollection
     */
    protected function createCustomerOrderItemCollectionTransfer(\ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $orderEntity)
    {
        $groupedCustomerOrderItemTransfers = [];
        $customerOrderItemTransferTemplate = TransferLoader::loadCustomerOrderItem();

        $orderItemEntityCollection = $this->findOrderItemsGroupedByStatusAndSku($orderEntity->getIdSalesOrder());
        /** @var \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem $orderItemEntity */
        foreach ($orderItemEntityCollection as $orderItemEntity) {
            $sku = $orderItemEntity->getSku();
            $customerItemStatus = $this->findCustomerItemStatusName($orderItemEntity);
            if (isset($groupedCustomerOrderItemTransfers[$sku . $customerItemStatus])) {
                /** @var CustomerOrderItemTransfer $customerOrderItemTransfer */
                $customerOrderItemTransfer = $groupedCustomerOrderItemTransfers[$sku . $customerItemStatus];
                $customerOrderItemTransfer->setQuantity(
                    $customerOrderItemTransfer->getQuantity() + $orderItemEntity->getVirtualColumn('group_quantity')
                );
                $customerOrderItemTransfer->setGrossPrice(
                    $customerOrderItemTransfer->getGrossPrice() + $orderItemEntity->getVirtualColumn(
                        'group_gross_price'
                    )
                );
            } else {
                $customerOrderItemTransfer = clone $customerOrderItemTransferTemplate;
                $customerOrderItemTransfer->setName($orderItemEntity->getName())
                    ->setSku($orderItemEntity->getVirtualColumn(self::VIRTUAL_COLUMN_SALES_SKU))
                    ->setQuantity($orderItemEntity->getVirtualColumn('group_quantity'))
                    ->setGrossPrice($orderItemEntity->getVirtualColumn('group_gross_price'))
                    ->setStatus($customerItemStatus);
            }
            $groupedCustomerOrderItemTransfers[$sku . $customerItemStatus] = $customerOrderItemTransfer;
        }

        $customerOrderItemTransferCollection = TransferLoader::loadCustomerOrderItemCollection(
            $groupedCustomerOrderItemTransfers,
            true
        );

        return $customerOrderItemTransferCollection;
    }

    /**
     * @param int $orderId
     * @return \PropelObjectCollection
     */
    protected function findOrderItemsGroupedByStatusAndSku($orderId)
    {
        return \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItemQuery::create()
            ->filterByFkSalesOrder($orderId)
            ->joinStatus()
            ->joinProcess()
            ->joinBosOrderItem()
            ->groupByFkOmsOrderItemStatus()
            ->groupBySku()
            ->withColumn('COUNT(fk_oms_order_item_status)', 'group_quantity')
            ->withColumn('SUM(price_to_pay)', 'group_price_to_pay')
            ->withColumn('SUM(gross_price)', 'group_gross_price')
            ->withColumn('pac_oms_order_item_status.name', 'group_status')
            ->withColumn('pac_oms_order_process.name', 'group_process')
            ->withColumn('bos_sales_order_item.sales_sku', self::VIRTUAL_COLUMN_SALES_SKU)
            ->orderBy('sku')
            ->find();
    }

}
