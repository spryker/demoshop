<?php
/**
 * Auto-generated Soap Model Class
 */
class Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ShipmentInfo extends Sao_Zed_Fulfillment_Component_Model_Sba_Container_AbstractContainer
{

    /** @var string */
    protected $ServiceType = null;

    /** @var Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfPackageInfo */
    protected $Packages = null;

    /** @var string */
    protected $DimensionUnit = null;

    /** @var string */
    protected $WeightUnit = null;

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

    /**
     * @param stdClass $obj
     */
    public function __construct($obj = null)
    {
        $objectVars = is_object($obj) ? get_object_vars($obj) : [];
        if ($obj && !empty($objectVars)) {
            $this->ServiceType = $obj->ServiceType;
            $this->Packages = new Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfPackageInfo($obj->Packages);
            $this->DimensionUnit = $obj->DimensionUnit;
            $this->WeightUnit = $obj->WeightUnit;
            $this->DeclaredValue = $obj->DeclaredValue;
            $this->DeclaredValueCurrency = $obj->DeclaredValueCurrency;
            $this->Insurance = $obj->Insurance;
            $this->InsuranceCurrency = $obj->InsuranceCurrency;
            $this->SpecialServices = new Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString($obj->SpecialServices);
            $this->Accessorials = new Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString1($obj->Accessorials);
        }
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ShipmentInfo
     */
    public function setServiceType($value)
    {
        $this->ServiceType = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getServiceType()
    {
        return $this->ServiceType;
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfPackageInfo $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ShipmentInfo
     */
    public function setPackages(Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfPackageInfo $value)
    {
        $this->Packages = $value;
        return $this;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfPackageInfo
     */
    public function getPackages()
    {
        return $this->Packages;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ShipmentInfo
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
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ShipmentInfo
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
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ShipmentInfo
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
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ShipmentInfo
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
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ShipmentInfo
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
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ShipmentInfo
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
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ShipmentInfo
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
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ShipmentInfo
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

}
