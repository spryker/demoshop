<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 */

class Sao_Zed_Fulfillment_Component_Model_Sba_Tracking_Webservice_Handler implements
    ProjectA_Zed_Sales_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Sales_Component_Dependency_Facade_Trait;

    /**
     * @var Sao_Zed_Fulfillment_Component_Model_Sba_Tracking
     */
    protected $tracking;

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Sba_Tracking $tracking
     */
    public function __construct(Sao_Zed_Fulfillment_Component_Model_Sba_Tracking $tracking)
    {
        $this->tracking = $tracking;
    }

    /**
     * @param $params
     * @return array
     */
    public function ShipmentStatus($params)
    {
        $this->addToLumberjack($params);
        $this->tracking->setVendorNumber($params->Vendor->VendorNumber);
        $this->tracking->setPassword($params->Vendor->Password);
        $this->tracking->setReferenceNumber($params->Shipment->ReferenceNumber);
        $this->tracking->setTrackingNumber($params->Shipment->TrackingNumber);
        $this->tracking->setStatuses((array) $params->Shipment->Statuses);
        $this->tracking->saveTrackingNumber();

        // Is this the correct location
        $orderEntity = $this->facadeSales->getOrderByIncrementId(strtok($params->Shipment->ReferenceNumber, '-'));
        if ($orderEntity) {
            $this->facadeSales->saveNote('sba - tracking number received: ' . $params->Shipment->TrackingNumber, $orderEntity, true, get_class($this));
        }

        // Fire state machine but which event? where to do that?
        // $this->facadeSales->getFacadeStateMachine()->triggerEventBulk(Sao_Sales_Interface_OrderprocessConstant::EVENT_PICKUP_INFO_RECEIVED, $orderEntity->getItems());
        return array('status' => 'OK');
    }

    /**
     * @param $request
     */
    protected function addToLumberjack($request)
    {
        $lumberJack = ProjectA_Shared_Lumberjack_Code_Lumberjack::getInstance();
        $lumberJack->addField('request', $request);
        $lumberJack->send(ProjectA_Shared_Lumberjack_Code_Log_Types::FULFILLMENT, 'Sba Tracking Request', 'sba');
    }

}
