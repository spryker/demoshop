<?php
/**
 * Auto-generated Soap Model Class
 */
class Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Kage extends Sao_Zed_Fulfillment_Component_Model_Sba_Container_AbstractContainer
{

    /** @var string */
    protected $Weight = null;

    /** @var string */
    protected $Height = null;

    /** @var string */
    protected $Length = null;

    /** @var string */
    protected $Width = null;

    /** @var string */
    protected $Description = null;

    /** @var string */
    protected $HSCode = null;

    /** @var string */
    protected $ManufacturerCountry = null;

    /** @var string */
    protected $Amount = null;

    /** @var string */
    protected $AmountUnit = null;

    /** @var string */
    protected $ProductValue = null;

    /**
     * @param stdClass $obj
     */
    public function __construct($obj = null)
    {
        $objectVars = is_object($obj) ? get_object_vars($obj) : [];
        if ($obj && !empty($objectVars)) {
            $this->Weight = $obj->Weight;
            $this->Height = $obj->Height;
            $this->Length = $obj->Length;
            $this->Width = $obj->width;
            $this->Description = $obj->description;
            $this->HSCode = $obj->hSCode;
            $this->ManufacturerCountry = $obj->manufacturerCountry;
            $this->Amount = $obj->amount;
            $this->AmountUnit = $obj->amountUnit;
            $this->ProductValue = $obj->productValue;
        }
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Kage
     */
    public function setWeight($value)
    {
        $this->Weight = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getWeight()
    {
        return $this->Weight;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Kage
     */
    public function setHeight($value)
    {
        $this->Height = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getHeight()
    {
        return $this->Height;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Kage
     */
    public function setLength($value)
    {
        $this->Length = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLength()
    {
        return $this->Length;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Kage
     */
    public function setWidth($value)
    {
        $this->Width = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getWidth()
    {
        return $this->Width;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Kage
     */
    public function setDescription($value)
    {
        $this->Description = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Kage
     */
    public function setHSCode($value)
    {
        $this->HSCode = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getHSCode()
    {
        return $this->HSCode;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Kage
     */
    public function setManufacturerCountry($value)
    {
        $this->ManufacturerCountry = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getManufacturerCountry()
    {
        return $this->ManufacturerCountry;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Kage
     */
    public function setAmount($value)
    {
        $this->Amount = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAmount()
    {
        return $this->Amount;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Kage
     */
    public function setAmountUnit($value)
    {
        $this->AmountUnit = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAmountUnit()
    {
        return $this->AmountUnit;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Kage
     */
    public function setProductValue($value)
    {
        $this->ProductValue = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getProductValue()
    {
        return $this->ProductValue;
    }

}
