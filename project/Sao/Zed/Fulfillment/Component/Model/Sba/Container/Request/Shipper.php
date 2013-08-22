<?php
/**
 * Auto-generated Soap Model Class
 */
class Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Shipper extends Sao_Zed_Fulfillment_Component_Model_Sba_Container_AbstractContainer
{

    /** @var string */
    protected $Country = null;

    /** @var string */
    protected $State = null;

    /** @var string */
    protected $City = null;

    /** @var string */
    protected $PostalCode = null;

    /** @var Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString2 */
    protected $Address = null;

    /**
     * @param stdClass $obj
     */
    public function __construct($obj = null)
    {
        $objectVars = is_object($obj) ? get_object_vars($obj) : [];
        if ($obj && !empty($objectVars)) {
            $this->Country = $obj->Country;
            $this->State = $obj->State;
            $this->City = $obj->City;
            $this->PostalCode = $obj->PostalCode;
            $this->Address = new Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString2($obj->Address);
        }
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Shipper
     */
    public function setCountry($value)
    {
        $this->Country = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->Country;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Shipper
     */
    public function setState($value)
    {
        $this->State = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->State;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Shipper
     */
    public function setCity($value)
    {
        $this->City = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->City;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Shipper
     */
    public function setPostalCode($value)
    {
        $this->PostalCode = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->PostalCode;
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString2 $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Shipper
     */
    public function setAddress(Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString2 $value)
    {
        $this->Address = $value;
        return $this;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString2
     */
    public function getAddress()
    {
        return $this->Address;
    }

}
