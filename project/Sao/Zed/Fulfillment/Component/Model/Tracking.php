<?php

class Sao_Zed_Fulfillment_Component_Model_Tracking implements
    ProjectA_Zed_Library_Dependency_Factory_Interface,
    ProjectA_Zed_Sales_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Library_Dependency_Factory_Trait;
    use ProjectA_Zed_Sales_Component_Dependency_Facade_Trait;

    /** @var Generated_Zed_Fulfillment_Component_Factory */
    protected $factory;

    /**
     * @param $trackingNumber
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quoteEntity
     * @return Sao_Zed_Fulfillment_Persistence_FulfillmentShippingTracking
     */
    public function saveTrackingNumberForQuote($trackingNumber, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quoteEntity)
    {
        $entityTracking = (new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingQuery())
            ->filterByTrackingNumber($trackingNumber)
            ->filterByShippingAgent($this->getShippingAgentByInternalName($quoteEntity->getShippingAgent()->getInternalName()))
            ->filterByQuote($quoteEntity)
            ->findOneOrCreate();

        $entityTracking->save();
        return $entityTracking;
    }

    /**
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking $entity
     * @return string
     */
    public function getTrackingUrlFromEntry(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking $entity)
    {
        $agent = $entity->getShippingAgent();

        return $agent->getTrackingUrl() . $entity->getTrackingNumber();
    }

    /**
     * @param $internalName
     * @return Sao_Zed_Fulfillment_Persistence_FulfillmentShippingAgent
     * @throws ErrorException
     */
    public function getShippingAgentByInternalName($internalName)
    {
        $entity = (new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingAgentQuery())->findOneByInternalName($internalName);

        if (empty($entity)) {
            throw new ErrorException('no shipping agent found');
        }

        return $entity;
    }

    /**
     * @param null $xml
     * @return bool
     */
    public function handleTrackingResponeSba($xml = null)
    {
        return $this->factory->getModelSbaTracking($xml)->run();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function handleTrackingResponeJondo(array $data)
    {
        return $this->factory->getModelJondoTracking($data)->run();
    }

    /**
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote
     * @param $validStatusHistoryCodes
     * @return bool
     */
    public function hasReceivedInfoByStatusHistoryCodes(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote, $validStatusHistoryCodes)
    {
        $trackingCollection = $quote->getTrackings();

        //no tracking entities available, no info received
        if ($trackingCollection->count() < 1) {
            return false;
        }

        //check each status codes for each tracking entity
        $trackingEntityStatusValues = [];
        /* @var Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking $trackingEntity */
        foreach ($trackingCollection as $trackingEntity) {
            $trackingEntityStatusValues[$trackingEntity->getIdShippingTracking()] = false;
            $trackingStatusHistoryCollection = $trackingEntity->getTrackingStatuses();
            /* @var Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory $trackingStatusHistoryEntity */
            foreach ($trackingStatusHistoryCollection as $trackingStatusHistoryEntity) {
                if (in_array($trackingStatusHistoryEntity->getCode(), $validStatusHistoryCodes)) {
                    $trackingEntityStatusValues[$trackingEntity->getIdShippingTracking()] = true;
                }
            }
        }

        //filter false values
        $filteredTrackingEntityStatusValues = array_filter($trackingEntityStatusValues);

        //if all values exists after filtering we have received the info for all items
        if ($filteredTrackingEntityStatusValues === $trackingEntityStatusValues) {
            return true;
        }
        return false;
    }
}
