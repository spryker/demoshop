<?php
/**
 * Auto-generated Soap Model Class
 */
class Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_CalculateRates extends Sao_Zed_Fulfillment_Component_Model_Sba_Container_AbstractContainer
{

    /** @var Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_CustomerInfo */
    protected $Customer = null;

    /** @var Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ShipmentInfo */
    protected $Shipment = null;

    /** @var Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Shipper */
    protected $Shipper = null;

    /** @var Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Receiver */
    protected $Receiver = null;

    /**
     * @param stdClass $obj
     */
    public function __construct($obj = null)
    {
        $objectVars = is_object($obj) ? get_object_vars($obj) : [];
        if ($obj && !empty($objectVars)) {
            $this->Customer = new Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_CustomerInfo($obj->Customer);
            $this->Shipment = new Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ShipmentInfo($obj->Shipment);
            $this->Shipper = new Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Shipper($obj->Shipper);
            $this->Receiver = new Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Receiver($obj->Receiver);
        }
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_CustomerInfo $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_CalculateRates
     */
    public function setCustomer(Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_CustomerInfo $value)
    {
        $this->Customer = $value;
        return $this;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_CustomerInfo
     */
    public function getCustomer()
    {
        return $this->Customer;
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ShipmentInfo $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_CalculateRates
     */
    public function setShipment(Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ShipmentInfo $value)
    {
        $this->Shipment = $value;
        return $this;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ShipmentInfo
     */
    public function getShipment()
    {
        return $this->Shipment;
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Shipper $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_CalculateRates
     */
    public function setShipper(Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Shipper $value)
    {
        $this->Shipper = $value;
        return $this;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Shipper
     */
    public function getShipper()
    {
        return $this->Shipper;
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Receiver $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_CalculateRates
     */
    public function setReceiver(Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Receiver $value)
    {
        $this->Receiver = $value;
        return $this;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Receiver
     */
    public function getReceiver()
    {
        return $this->Receiver;
    }

}
