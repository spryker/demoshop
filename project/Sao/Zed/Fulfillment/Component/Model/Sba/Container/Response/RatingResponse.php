<?php
/**
 * Auto-generated Soap Model Class
 */
class Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_RatingResponse extends Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_SoapResponse
{

    /** @var Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_ErrorDetails */
    protected $errorMessage = null;

    /** @var string */
    protected $freightCharge = null;

    /** @var string */
    protected $dutiesAndTaxes = null;

    /** @var string */
    protected $totalCharge = null;

    /**
     * @param stdClass $obj
     */
    public function __construct($obj = null)
    {
        $objectVars = is_object($obj) ? get_object_vars($obj) : [];
        if ($obj && !empty($objectVars)) {
            $this->errorMessage = new Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_ErrorDetails($obj->ErrorMessage);
            $this->freightCharge = $obj->FreightCharge;
            $this->dutiesAndTaxes = $obj->DutiesAndTaxes;
            $this->totalCharge = $obj->TotalCharge;
        }
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_ErrorDetails $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_RatingResponse
     */
    public function setErrorMessage(Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_ErrorDetails $value)
    {
        $this->errorMessage = $value;
        return $this;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_ErrorDetails
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_RatingResponse
     */
    public function setFreightCharge($value)
    {
        $this->freightCharge = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getFreightCharge()
    {
        return $this->freightCharge;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_RatingResponse
     */
    public function setDutiesAndTaxes($value)
    {
        $this->dutiesAndTaxes = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDutiesAndTaxes()
    {
        return $this->dutiesAndTaxes;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_RatingResponse
     */
    public function setTotalCharge($value)
    {
        $this->totalCharge = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTotalCharge()
    {
        return $this->totalCharge;
    }

}
