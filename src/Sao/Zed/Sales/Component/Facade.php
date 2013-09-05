<?php

/**
 * Class Sao_Zed_Sales_Component_Facade
 */
class Sao_Zed_Sales_Component_Facade extends ProjectA_Zed_Sales_Component_Facade
{

    const BLOCK_PRODUCT = 0;
    const UNBLOCK_PRODUCT = 1;



    /**
     * @param PropelObjectCollection $orderItems
     * @return Iterator
     */
    public function getFilterPrintableItems(PropelObjectCollection $orderItems)
    {
        return $this->factory->getModelOrderprocessFinder()->getFilterPrintableOrderItems($orderItems->getIterator());
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     * @param null|bool $jsCheckResult
     * @param null|bool $paymentProviderResult
     */
    public function saveCCValidationResult(ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity, $jsCheckResult = null, $paymentProviderResult = null)
    {
        $this->factory->getModelCCValidation()->saveCCValidationResult($orderEntity, $jsCheckResult, $paymentProviderResult);
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return Sao_Shared_Legacy_Transfer_Response_Legacy
     */
    public function sendSalesNotification(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        return $this->factory->getModelCommunicationWebserviceItemPaid($orderItemEntity)->send();
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return Sao_Shared_Legacy_Transfer_Response_Legacy
     */
    public function cancelSalesNotification(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        return $this->factory->getModelCommunicationWebserviceItemCanceled($orderItemEntity)->send();
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return Sao_Shared_Legacy_Transfer_Response_Legacy
     */
    public function blockArtist(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        return $this->factory->getModelCommunicationWebserviceBlockArtist($orderItemEntity)->send();
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return Sao_Shared_Legacy_Transfer_Response_Legacy
     */
    public function blockArtwork(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        return $this->factory->getModelCommunicationWebserviceBlockArtwork($orderItemEntity, self::BLOCK_PRODUCT)->send();
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return Sao_Shared_Legacy_Transfer_Response_Legacy
     */
    public function unblockArtwork(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        return $this->factory->getModelCommunicationWebserviceBlockArtwork($orderItemEntity, self::UNBLOCK_PRODUCT)->send();
    }

    /**
     * @param $userId
     * @return Sao_Shared_Legacy_Transfer_Response_Legacy
     */
    public function getCustomerInformation($userId)
    {
        return $this->factory->getModelCommunicationWebserviceCustomerInformation($userId)->send();
    }

    /**
     * @see Sao_Zed_Sales_Component_Model_Item::createSalesOrderItemNotification
     */
    public function createSalesOrderItemNotification(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity, $event)
    {
        $this->factory->getModelItem()->createNotification($orderItemEntity, $event);
    }

    /**
     * @param Sao_Shared_Sales_Transfer_OriginalNotification $originalNotification
     * @return Sao_Shared_Sales_Transfer_OriginalNotification
     */
    public function updateSalesOrderItemNotification(Sao_Shared_Sales_Transfer_OriginalNotification $originalNotification)
    {
        return $this->factory->getModelItem()->updateSalesOrderItemNotification($originalNotification);
    }

    /**
     * @param Sao_Shared_Artist_Transfer_ArtworkAvailability $artworkAvailabilityTransfer
     * @return mixed
     */
    public function getArtworkAvailabilityInformation(Sao_Shared_Artist_Transfer_ArtworkAvailability $artworkAvailabilityTransfer)
    {
        return $this->factory->getModelItem()->getArtworkAvailabilityInformation($artworkAvailabilityTransfer);
    }

    /**
     * @param Sao_Shared_Artist_Transfer_ArtworkAvailability $artworkAvailabilityTransfer
     * @return mixed
     */
    public function updateArtworkAvailability(Sao_Shared_Artist_Transfer_ArtworkAvailability $artworkAvailabilityTransfer)
    {
        return $this->factory->getModelItem()->updateArtworkAvailability($artworkAvailabilityTransfer);
    }

    /**
     * @param array $processesInMatrix
     * @param $flag
     * @return string
     */
    public function renderStatusItemOverviewByFlag(array $processesInMatrix, $flag)
    {
        return $this->factory->getGuiHtmlFlaggedStatusItemOverview()->init($processesInMatrix)->filter($flag)->run()->getHtml();
    }

    /**
     * @param $idCustomer
     * @return PropelCollection
     */
    public function getOrderItemsByCustomerId($idCustomer)
    {
        return $this->factory->getModelOrder()->getOrderItemsByCustomerId($idCustomer);
    }

    /**
     * @param PropelObjectCollection $orderItems
     * @return Iterator
     */
    public function getNonHiddenOrderItems(PropelObjectCollection $orderItems)
    {
        return $this->factory->getModelOrderprocessFinder()->getNonHiddenOrderItems($orderItems->getIterator());
    }

    /**
     *
     */
    public function triggerArtworkAvailabilityEvents()
    {
        $this->factory->getModelItem()->triggerArtworkAvailabilityEvents();
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return string
     */
    public function sendPayoutNotificationForItem(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        return $this->factory->getModelCommunicationSnsPayoutNote()->send($orderItemEntity);
    }

    public function cancelOrderOnFailedPaypalPayment(ProjectA_Zed_Sales_Persistence_PacSalesOrder $transferOrder)
    {
        return $this->factory->getModelOrder()->triggerCancelOrder($transferOrder);
    }

    /**
     * @param $orderId
     * @param string $newStatus
     * @return int
     */
    public function setFlagOnOrder($orderId, $newStatus = 'cycle')
    {
        return $this->factory->getModelOrder()->setFlagOnOrder($orderId, $newStatus);
    }

    /**
     * @param $idSalesOrderItem
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItem
     */
    public function getSalesOrderItemById($idSalesOrderItem)
    {
        return $this->factory->getModelItem()->getSalesOrderItemById($idSalesOrderItem);
    }

    /**
     * @param $idSalesOrderItem
     * @return bool
     */
    public function markItemForRefund($idSalesOrderItem)
    {
        return $this->factory->getModelItem()->markForRefund($idSalesOrderItem);
    }

    /**
     * @param $idSalesOrderItem
     * @return bool
     */
    public function unmarkItemForRefund($idSalesOrderItem)
    {
        return $this->factory->getModelItem()->unmarkForRefund($idSalesOrderItem);
    }

    /**
     * @param $flag
     * @return mixed
     */
    public function getFlaggedStates($flag)
    {
        return $this->factory->getModelOrderprocessFinderStatus()->getFlaggedStates($flag);
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @param $eventTriggered
     * @param $status
     */
    public function resetSalesOrderItemNotification(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity, $eventTriggered, $status)
    {
        $this->factory->getModelItem()->resetNotification($orderItemEntity, $eventTriggered, $status);
    }

}
