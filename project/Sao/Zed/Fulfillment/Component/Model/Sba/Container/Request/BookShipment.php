<?php
/**
 * Auto-generated Soap Model Class
 */
class Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookShipment extends Sao_Zed_Fulfillment_Component_Model_Sba_Container_AbstractContainer
{

    /** @var Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_CustomerInfo */
    protected $Customer = null;

    /** @var Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingShipper */
    protected $Shipper = null;

    /** @var Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingReceiver */
    protected $Receiver = null;

    /** @var Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingPickUpInfo */
    protected $Shipment = null;

    /**
     * @param stdClass $obj
     */
    public function __construct($obj = null)
    {
        $objectVars = is_object($obj) ? get_object_vars($obj) : [];
        if ($obj && !empty($objectVars)) {
            $this->Customer = new Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_CustomerInfo($obj->Customer);
            $this->Shipper = new Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingShipper($obj->Shipper);
            $this->Receiver = new Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingReceiver($obj->receiver);
            $this->Shipment = new Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingPickUpInfo($obj->Shipment);
        }
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_CustomerInfo $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookShipment
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
     * @param Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingShipper $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookShipment
     */
    public function setShipper(Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingShipper $value)
    {
        $this->Shipper = $value;
        return $this;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingShipper
     */
    public function getShipper()
    {
        return $this->Shipper;
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingReceiver $value
     * @return $this
     */
    public function setReceiver(Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingReceiver $value)
    {
        $this->Receiver = $value;
        return $this;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingReceiver
     */
    public function getReceiver()
    {
        return $this->Receiver;
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingPickUpInfo $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookShipment
     */
    public function setShipment(Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingPickUpInfo $value)
    {
        $this->Shipment = $value;
        return $this;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingPickUpInfo
     */
    public function getShipment()
    {
        return $this->Shipment;
    }

}
