<?php

/**
 * Class Sao_Zed_Sales_Component_Model_Item
 *
 * @property Sao_Zed_Misc_Component_Facade $facadeMisc
 */
class Sao_Zed_Sales_Component_Model_Item extends ProjectA_Zed_Sales_Component_Model_Item
{

    const VERSION_CREATOR_ARTIST = 'artist';

    /**
     * @var array
     */
    protected $statusEventMapping = [
        Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::STATUS_ENABLED => Sao_Zed_Sales_Component_Interface_OrderprocessConstant::EVENT_ARTIST_CONFIRMED_AVAILABILITY,
        Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::STATUS_DISABLED => Sao_Zed_Sales_Component_Interface_OrderprocessConstant::EVENT_ARTIST_DISCONFIRMED_AVAILABILITY
    ];

    /**
     * @var array
     */
    protected $availabilityStatusMapping = [
        0 => Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::STATUS_DISABLED,
        1 => Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::STATUS_ENABLED,
    ];

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @param string $event
     * @return Sao_Zed_Sales_Persistence_SalesOrderItemNotification
     */
    public function createNotification(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity, $event)
    {
        $notification = new Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification();
        $notification->setFkSalesOrderItem($orderItemEntity->getPrimaryKey());
        $notification->setEvent($event);
        $notification->setHash(md5($orderItemEntity->getPrimaryKey() . $event));
        $notification->setStatus(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::STATUS_UNKNOWN);
        $notification->save();
        return $notification;
    }

    /**
     * @param Sao_Shared_Artist_Transfer_ArtworkAvailability $artworkAvailabilityTransfer
     * @return Sao_Shared_Sales_Transfer_OriginalNotification
     */
    public function getArtworkAvailabilityInformation(Sao_Shared_Artist_Transfer_ArtworkAvailability $artworkAvailabilityTransfer)
    {
        $notification = Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery::create()
            ->filterByHash($artworkAvailabilityTransfer->getHash())
            ->findOne();

        if (!$notification) {
            $artworkAvailabilityTransfer->setResultMessage(Sao_Shared_Artist_Transfer_ArtworkAvailability::RESULT_MESSAGE_ALREADY_SET);
            return $artworkAvailabilityTransfer;
        }

        if ($notification->getStatus() === Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::STATUS_UNKNOWN) {
            $saoSalesOrderItem = $notification->getSalesOrderItem()->getSaoSalesOrderItem();
            $countryEntity = $saoSalesOrderItem->getCountry();
            $regionEntity = $saoSalesOrderItem->getRegion();
            /* @var $transferAddress Sao_Shared_Artist_Transfer_Address */
            $transferAddress = Generated_Shared_Library_TransferLoader::getArtistAddress();
            $transferAddress = ProjectA_Zed_Library_Copy::entityToTransfer($transferAddress, $saoSalesOrderItem);
            if ($countryEntity) {
                $transferAddress->setIso2Country($countryEntity->getIso2Code());
            }
            if ($regionEntity) {
                $transferAddress->setRegion($regionEntity->getShortName());
            }
            $artworkAvailabilityTransfer->setAddress($transferAddress);
        } else {
            $artworkAvailabilityTransfer->setResultMessage(Sao_Shared_Artist_Transfer_ArtworkAvailability::RESULT_MESSAGE_ALREADY_SET);
        }
        return $artworkAvailabilityTransfer;
    }

    /**
     * @param Sao_Shared_Artist_Transfer_ArtworkAvailability $artworkAvailabilityTransfer
     * @return Sao_Shared_Artist_Transfer_ArtworkAvailability
     */
    public function updateArtworkAvailability(Sao_Shared_Artist_Transfer_ArtworkAvailability $artworkAvailabilityTransfer)
    {
        $notification = Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery::create()
            ->filterByHash($artworkAvailabilityTransfer->getHash())
            ->findOne();

        if ($notification->getStatus() === Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::STATUS_UNKNOWN) {
            $status = $this->mapAvailabilityToStatus($artworkAvailabilityTransfer);
            $notification->setStatus($status);
            $notification->save();

            /* @var $saoSalesOrderItem Sao_Zed_Sales_Persistence_SaoSalesOrderItem */
            $saoSalesOrderItem = $notification->getSalesOrderItem()->getSaoSalesOrderItem();

            $addressTransfer = $artworkAvailabilityTransfer->getAddress();
            $this->addAddressToEntity($addressTransfer, $saoSalesOrderItem);

            if ($saoSalesOrderItem->isModified()) {
                $artworkAvailabilityTransfer->setResultMessage(Sao_Shared_Artist_Transfer_ArtworkAvailability::RESULT_MESSAGE_STATUS_SET_ADDRESS_CHANGED);
            } else {
                $artworkAvailabilityTransfer->setResultMessage(Sao_Shared_Artist_Transfer_ArtworkAvailability::RESULT_MESSAGE_STATUS_SET_ADDRESS_NOT_CHANGED);
            }

            if ($artworkAvailabilityTransfer->getArtworkAvailability()) {
                $pickupTransfer = $artworkAvailabilityTransfer->getFulfillmentPickup();
                $this->addPickupToEntity($pickupTransfer, $saoSalesOrderItem);
            }

            $saoSalesOrderItem->setVersionCreatedBy(self::VERSION_CREATOR_ARTIST);
            $saoSalesOrderItem->save();
        } else {
            $artworkAvailabilityTransfer->setResultMessage(Sao_Shared_Artist_Transfer_ArtworkAvailability::RESULT_MESSAGE_ALREADY_SET);
        }
        return $artworkAvailabilityTransfer;
    }

    /**
     * @param Sao_Shared_Artist_Transfer_Address $addressTransfer
     * @param Sao_Zed_Sales_Persistence_SaoSalesOrderItem $saoSalesOrderItem
     */
    protected function addAddressToEntity(Sao_Shared_Artist_Transfer_Address $addressTransfer, Sao_Zed_Sales_Persistence_SaoSalesOrderItem $saoSalesOrderItem)
    {
        $entityRegion = $this->facadeMisc->getRegionByShortName($addressTransfer->getRegion());
        $entityCountry = $this->facadeMisc->getCountryFacade()->getCountryByIso2Code($addressTransfer->getIso2Country());

        $saoSalesOrderItem->setRegion($entityRegion);
        $saoSalesOrderItem->setCountry($entityCountry);

        $saoSalesOrderItem->setFirstName($addressTransfer->getFirstName());
        $saoSalesOrderItem->setLastName($addressTransfer->getLastName());
        $saoSalesOrderItem->setPhone($addressTransfer->getPhone());
        $saoSalesOrderItem->setAddress1($addressTransfer->getAddress1());
        $saoSalesOrderItem->setAddress2($addressTransfer->getAddress2());
        $saoSalesOrderItem->setAddress3($addressTransfer->getAddress3());
        $saoSalesOrderItem->setZipCode($addressTransfer->getZipCode());
        $saoSalesOrderItem->setCity($addressTransfer->getCity());
    }

    /**
     * @param Sao_Shared_Fulfillment_Transfer_Pickup $pickupTransfer
     * @param Sao_Zed_Sales_Persistence_SaoSalesOrderItem $saoSalesOrderItem
     */
    protected function addPickupToEntity(Sao_Shared_Fulfillment_Transfer_Pickup $pickupTransfer, Sao_Zed_Sales_Persistence_SaoSalesOrderItem $saoSalesOrderItem)
    {
        $pickupEntity = new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingPickup();
        $pickupEntity->setDate($pickupTransfer->getDate());
        $pickupEntity->setReadyTime($pickupTransfer->getReadyTime() . ':00');
        $pickupEntity->setCloseTime($pickupTransfer->getCloseTime() . ':00');
        $saoSalesOrderItem->setShippingPickup($pickupEntity);
    }

    /**
     * @param Sao_Shared_Artist_Transfer_ArtworkAvailability $artworkAvailabilityTransfer
     * @return string
     */
    protected function mapAvailabilityToStatus(Sao_Shared_Artist_Transfer_ArtworkAvailability $artworkAvailabilityTransfer)
    {
        return $this->availabilityStatusMapping[$artworkAvailabilityTransfer->getArtworkAvailability()];
    }

    /**
     * @param Sao_Shared_Sales_Transfer_OriginalNotification $originalNotification
     * @return Sao_Shared_Sales_Transfer_OriginalNotification
     */
    public function updateSalesOrderItemNotification(Sao_Shared_Sales_Transfer_OriginalNotification $originalNotification)
    {
        $notification = Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery::create()
            ->filterByHash($originalNotification->getHash())
            ->findOne();

        // Case status not set, user can perform status change
        if ($notification->getStatus() === Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::STATUS_UNKNOWN) {
            $notification->setStatus($originalNotification->getStatus());
            $notification->save();
        }
        $originalNotification = $this->setResultMessage($originalNotification, $notification);
        return $originalNotification;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_OriginalNotification $originalNotification
     * @param Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification $notification
     * @return Sao_Shared_Sales_Transfer_OriginalNotification
     */
    protected function setResultMessage(Sao_Shared_Sales_Transfer_OriginalNotification $originalNotification, Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification $notification)
    {
        // Case user set status to "enabled" or want set the same status again. Show user message change status
        if ($notification->getStatus() === Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::STATUS_ENABLED && $originalNotification->getStatus() === Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::STATUS_ENABLED) {
            $originalNotification->setResultMessage(Sao_Shared_Sales_Transfer_OriginalNotification::RESULT_MESSAGE_CONFIRM);
        }
        // Case user set status to "disabled" or want to set the same status again. Show user message change status
        if ($notification->getStatus() === Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::STATUS_DISABLED && $originalNotification->getStatus() === Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::STATUS_DISABLED) {
            $originalNotification->setResultMessage(Sao_Shared_Sales_Transfer_OriginalNotification::RESULT_MESSAGE_REFUTE);
        }
        // Case user allready set status to "enabled" and want to set the status to "disabled". Show user message that this is not allowed
        if ($notification->getStatus() === Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::STATUS_ENABLED && $originalNotification->getStatus() === Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::STATUS_DISABLED) {
            $originalNotification->setResultMessage(Sao_Shared_Sales_Transfer_OriginalNotification::RESULT_MESSAGE_INVALID_AVAILABLE_TO_UNAVAILABLE);
        }
        // Case user allready set status to "disabled" and want to set the status to "enabled". Show user message that this is not allowed
        if ($notification->getStatus() === Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::STATUS_DISABLED && $originalNotification->getStatus() === Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::STATUS_ENABLED) {
            $originalNotification->setResultMessage(Sao_Shared_Sales_Transfer_OriginalNotification::RESULT_MESSAGE_INVALID_UNAVAILABLE_TO_AVAILABLE);
        }
        return $originalNotification;
    }

    /**
     *
     */
    public function triggerArtworkAvailabilityEvents()
    {
        foreach ($this->statusEventMapping as $status => $event) {
            $itemsInStatus = $this->getNotificationItemsInStatus($status);
            $itemCollection = $this->transferNotificationCollectionToSalesOrderItemCollection($itemsInStatus);
            $this->factory->getModelOrderprocess()->triggerEventBulk($event, $itemCollection);
            $this->markItemsAsTriggered($itemsInStatus);
        }
    }

    /**
     * @param $status
     * @return array|mixed|PropelObjectCollection
     */
    protected function getNotificationItemsInStatus($status)
    {
        $itemInStatus = Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery::create()
            ->filterByStatus($status)
            ->filterByEventTriggered(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::EVENT_TRIGGERED_FALSE)
            ->find();

        return $itemInStatus;
    }

    /**
     * @param $notificationCollection
     * @return SplObjectStorage
     */
    protected function transferNotificationCollectionToSalesOrderItemCollection($notificationCollection)
    {
        $itemCollection = new SplObjectStorage();
        /* @var $notificationItem Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification */
        foreach ($notificationCollection as $notificationItem) {
            $itemCollection->attach($notificationItem->getSalesOrderItem());
        }
        return $itemCollection;
    }

    /**
     * @param PropelObjectCollection $notificationItems
     */
    protected function markItemsAsTriggered(PropelObjectCollection $notificationItems)
    {
        /* @var $notificationItem Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification */
        foreach ($notificationItems as $notificationItem) {
            $notificationItem->setEventTriggered(Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationPeer::EVENT_TRIGGERED_TRUE);
            $notificationItem->save();
        }
    }

    /**
     * @param $idSalesOrderItem
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItem
     */
    public function getSalesOrderItemById($idSalesOrderItem)
    {
        return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery::create()->findOneByIdSalesOrderItem($idSalesOrderItem);
    }

    /**
     * @param $idSalesOrderItem
     * @return bool
     */
    public function markForRefund($idSalesOrderItem)
    {
        return $this->setMarkForRefund($idSalesOrderItem, true);
    }

    /**
     * @param $idSalesOrderItem
     * @return bool
     */
    public function unmarkForRefund($idSalesOrderItem)
    {
        return $this->setMarkForRefund($idSalesOrderItem, false);
    }

    /**
     * @param $idSalesOrderItem
     * @return bool
     */
    protected function setMarkForRefund($idSalesOrderItem, $flag)
    {
        $pacSalesOrderItem = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery::create()->findOneByIdSalesOrderItem($idSalesOrderItem);
        if ($this->getCurrentStateFlagValueByItem($pacSalesOrderItem, Sao_Zed_Sales_Component_Interface_OrderprocessConstant::FLAG_CLARIFY_REFUND)) {
            $saoSalesOrderItem = $pacSalesOrderItem->getSaoSalesOrderItem();
            $saoSalesOrderItem->setMarkedForRefund($flag);
            $saoSalesOrderItem->save();
            if ($flag) {
                $this->factory->getModelOrderNote()->saveNote('Mark item for refund', $pacSalesOrderItem->getOrder(), true, 'MarkItemForRefund');
            } else {
                $this->factory->getModelOrderNote()->saveNote('Unmark item for refund', $pacSalesOrderItem->getOrder(), true, 'MarkItemForRefund');
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItem
     * @param $flagName
     * @return bool
     */
    public function getCurrentStateFlagValueByItem(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItem, $flagName)
    {
        $factory = $this->getStatemachineFactory();
        $definition = $factory->getDefintion($orderItem);
        $currentState = $this->factory->getModelOrderprocessStateMachineCurrentState();
        $stateName = $currentState->getCurrentStateName($orderItem);
        $state = $definition->getState($stateName);
        return (boolean) $state->getInfo($flagName);
    }

    /**
     * @return ProjectA_Zed_Library_StateMachine_Definition_Factory
     */
    protected function getStatemachineFactory()
    {
        $settings = $this->factory->getSettings();
        $definitions = $settings->getStatemachineDefinitionContainer();
        $matcher = $settings->getStateMachineMatcher();
        return new ProjectA_Zed_Library_StateMachine_Definition_Factory($definitions, $matcher);
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @param $eventTriggered
     * @param $status
     */
    public function resetNotification(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity, $eventTriggered, $status)
    {
        /* @var Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotification $notification */
        $notification = (new Sao_Zed_Sales_Persistence_SaoSalesOrderItemNotificationQuery())->filterByFkSalesOrderItem($orderItemEntity->getPrimaryKey());
        $notification->setEventTriggered($eventTriggered);
        $notification->setStatus($status);
        $notification->save();
    }

}
