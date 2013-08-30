<?php

class Sao_Zed_Checkout_Component_Model_Workflow_Task_AssignIdsToTransferObjects extends ProjectA_Zed_Checkout_Component_Model_Workflow_Task_Abstract
{
    /**
     * @param ProjectA_Shared_Sales_Transfer_Order $transferOrder
     * @param ProjectA_Zed_Checkout_Component_Model_Workflow_Context $context
     */
    public function __invoke(ProjectA_Shared_Sales_Transfer_Order $transferOrder, ProjectA_Zed_Checkout_Component_Model_Workflow_Context $context)
    {
        /**
         * this code works under the assumption that the order item entities where added with addItem to the order entity before saving
         * this should guarantee that the order is the same as in the transfer order (which was used to add the items to the order entity)
         */

        $entityOrder = $context->getOrderEntity();
        $transferOrder->setIdSalesOrder($entityOrder->getIdSalesOrder());

        $transferItems = $transferOrder->getItems();
        $collectionItems = $entityOrder->getItems();

        $key = 0;
        /** @var $transferItem Sao_Shared_Sales_Transfer_Order_Item */
        foreach ($transferItems AS $transferItem) {
            /** @var ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $entityItem */
            $entityItem = $collectionItems->get($key);
            $transferItem->setIdSalesOrderItem($entityItem->getIdSalesOrderItem());
            $key++;
        }
    }
}
