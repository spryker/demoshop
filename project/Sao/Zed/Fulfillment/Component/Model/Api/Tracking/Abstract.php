<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 */
abstract class Sao_Zed_Fulfillment_Component_Model_Api_Tracking_Abstract implements
     ProjectA_Zed_Library_Dependency_Factory_Interface,
     Sao_Zed_Sales_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Library_Dependency_Factory_Trait;
    use Sao_Zed_Sales_Component_Dependency_Facade_Trait;

    /**
     * @var Sao_Zed_Fulfillment_Component_Factory
     */
    protected $factory;

    /**
     * @return bool
     */
    public function saveTrackingNumber()
    {
        $resultCollection = $this->getTrackingResultCollection();
        $trackingModel = $this->factory->getModelTracking();
        return (bool)$this->saveTrackingNumbers($resultCollection, $trackingModel);
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Api_Tracking_Result_Collection $resultCollection
     * @param Sao_Zed_Fulfillment_Component_Model_Tracking $trackingModel
     * @return int
     */
    protected function saveTrackingNumbers(
        Sao_Zed_Fulfillment_Component_Model_Api_Tracking_Result_Collection $resultCollection,
        Sao_Zed_Fulfillment_Component_Model_Tracking $trackingModel)
    {
        $trackingNumbersSaved = 0;
        /* @var $result Sao_Zed_Fulfillment_Component_Model_Api_Tracking_Result */
        foreach ($resultCollection as $result) {
            /* @var $entity Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking */
            $entity = $trackingModel->saveTrackingNumberForQuote(
                $result->getTrackingNumber(),
                $result->getQuote()
            );
            $trackingNumbersSaved += $this->addStatusToTracking($result, $entity);
        }
        return $trackingNumbersSaved;
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Api_Tracking_Result $result
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking $entity
     * @return int
     */
    protected function addStatusToTracking(Sao_Zed_Fulfillment_Component_Model_Api_Tracking_Result $result, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking $entity)
    {
        foreach ($result->getStatus() as $status) {
            $statusEntity = new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTrackingStatusHistory();
            $statusEntity->setCode($status->getCode());
            $statusEntity->setDescription($status->getDescription());
            $statusEntity->setNotificationTimestamp($status->getStatusTimestamp());
            $entity->addTrackingStatus($statusEntity);
        }
        return $entity->save();
    }

    /**
     * @return Sao_Zed_Fulfillment_Persistence_FulfillmentQuote
     */
    protected function getQuote()
    {
        list ($incrementId, $quoteId) = explode('-', $this->getFulfillmentReferenceNumber());
        return $this->factory->getModelQuote()->getOrdersQuoteById($incrementId, $quoteId);
    }

    /**
     * @return string
     */
    abstract protected function getFulfillmentReferenceNumber();

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Tracking_Result_Collection
     */
    abstract protected function getTrackingResultCollection();

}
