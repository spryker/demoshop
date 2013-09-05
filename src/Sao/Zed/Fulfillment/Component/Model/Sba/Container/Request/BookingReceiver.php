<?php
/**
 * Auto-generated Soap Model Class
 */
class Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingReceiver
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

    /** @var string */
    protected $Name = null;

    /** @var string */
    protected $Email = null;

    /** @var string*/
    protected $Phone = null;

    /**
     * @param stdClass $obj
     */
    public function __construct($obj = null)
    {
        $objectVars = is_object($obj) ? get_object_vars($obj) : [];
        if ($obj && !empty($objectVars)) {
            $this->Country = $obj->country;
            $this->State = $obj->state;
            $this->City = $obj->city;
            $this->PostalCode = $obj->postalCode;
            $this->Address = new Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString2($obj->address);
            $this->Name = $obj->name;
            $this->Email = $obj->email;
            $this->Phone = $obj->Phone;
        }
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingReceiver
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
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingReceiver
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
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingReceiver
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
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingReceiver
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
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingReceiver
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

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingReceiver
     */
    public function setName($value)
    {
        $this->Name = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingReceiver
     */
    public function setEmail($value)
    {
        $this->Email = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingReceiver
     */
    public function setPhone($value)
    {
        $this->Phone = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->Phone;
    }
}
