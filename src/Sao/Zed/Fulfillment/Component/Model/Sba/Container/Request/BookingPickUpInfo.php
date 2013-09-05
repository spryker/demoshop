<?php
/**
 * Auto-generated Soap Model Class
 */
class Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingPickUpInfo
{

    /** @var Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfPackage */
    protected $Packages = null;

    /** @var string */
    protected $WeightUnit = null;

    /** @var string */
    protected $DimensionUnit = null;

    /** @var string */
    protected $ShipDate = null;

    /** @var string */
    protected $ReadyTime = null;

    /** @var string */
    protected $CloseTime = null;

    /** @var string */
    protected $DeliveryDate = null;

    /** @var string */
    protected $Service = null;

    /** @var string */
    protected $SpecialInstruction = null;

    /** @var string */
    protected $DeclaredValue = null;

    /** @var string */
    protected $DeclaredValueCurrency = null;

    /** @var string */
    protected $Insurance = null;

    /** @var string */
    protected $InsuranceCurrency = null;

    /** @var Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString */
    protected $SpecialServices = null;

    /** @var Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString1 */
    protected $Accessorials = null;

    /** @var string */
    protected $ReferenceNumber = null;

    /**
     * @param stdClass $obj
     */
    public function __construct($obj = null)
    {
        $objectVars = is_object($obj) ? get_object_vars($obj) : [];
        if ($obj && !empty($objectVars)) {
            $this->Packages = new Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfPackage($obj->packages);
            $this->WeightUnit = $obj->weightUnit;
            $this->DimensionUnit = $obj->dimensionUnit;
            $this->ShipDate = $obj->shipDate;
            $this->ReadyTime = $obj->readyTime;
            $this->CloseTime = $obj->closeTime;
            $this->DeliveryDate = $obj->deliveryDate;
            $this->Service = $obj->service;
            $this->SpecialInstruction = $obj->specialInstruction;
            $this->DeclaredValue = $obj->declaredValue;
            $this->DeclaredValueCurrency = $obj->declaredValueCurrency;
            $this->Insurance = $obj->insurance;
            $this->InsuranceCurrency = $obj->insuranceCurrency;
            $this->SpecialServices = new Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString($obj->specialServices);
            $this->Accessorials = new Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString1($obj->accessorials);
            $this->ReferenceNumber = $obj->referenceNumber;
        }
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfPackage $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingPickUpInfo
     */
    public function setPackages(Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfPackage $value)
    {
        $this->Packages = $value;
        return $this;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfPackage
     */
    public function getPackages()
    {
        return $this->Packages;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingPickUpInfo
     */
    public function setWeightUnit($value)
    {
        $this->WeightUnit = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getWeightUnit()
    {
        return $this->WeightUnit;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingPickUpInfo
     */
    public function setDimensionUnit($value)
    {
        $this->DimensionUnit = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDimensionUnit()
    {
        return $this->DimensionUnit;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingPickUpInfo
     */
    public function setShipDate($value)
    {
        $this->ShipDate = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getShipDate()
    {
        return $this->ShipDate;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingPickUpInfo
     */
    public function setReadyTime($value)
    {
        $this->ReadyTime = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getReadyTime()
    {
        return $this->ReadyTime;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingPickUpInfo
     */
    public function setCloseTime($value)
    {
        $this->CloseTime = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCloseTime()
    {
        return $this->CloseTime;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingPickUpInfo
     */
    public function setDeliveryDate($value)
    {
        $this->DeliveryDate = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryDate()
    {
        return $this->DeliveryDate;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingPickUpInfo
     */
    public function setService($value)
    {
        $this->Service = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getService()
    {
        return $this->Service;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingPickUpInfo
     */
    public function setSpecialInstruction($value)
    {
        $this->SpecialInstruction = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getSpecialInstruction()
    {
        return $this->SpecialInstruction;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingPickUpInfo
     */
    public function setDeclaredValue($value)
    {
        $this->DeclaredValue = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeclaredValue()
    {
        return $this->DeclaredValue;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingPickUpInfo
     */
    public function setDeclaredValueCurrency($value)
    {
        $this->DeclaredValueCurrency = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeclaredValueCurrency()
    {
        return $this->DeclaredValueCurrency;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingPickUpInfo
     */
    public function setInsurance($value)
    {
        $this->Insurance = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getInsurance()
    {
        return $this->Insurance;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingPickUpInfo
     */
    public function setInsuranceCurrency($value)
    {
        $this->InsuranceCurrency = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getInsuranceCurrency()
    {
        return $this->InsuranceCurrency;
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingPickUpInfo
     */
    public function setSpecialServices(Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString $value)
    {
        $this->SpecialServices = $value;
        return $this;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString
     */
    public function getSpecialServices()
    {
        return $this->SpecialServices;
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString1 $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingPickUpInfo
     */
    public function setAccessorials(Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString1 $value)
    {
        $this->Accessorials = $value;
        return $this;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString1
     */
    public function getAccessorials()
    {
        return $this->Accessorials;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingPickUpInfo
     */
    public function setReferenceNumber($value)
    {
        $this->ReferenceNumber = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getReferenceNumber()
    {
        return $this->ReferenceNumber;
    }

}
