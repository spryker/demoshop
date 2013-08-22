<?php
/**
 * Auto-generated Soap Model Class
 */
class Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_BookingResponse extends Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_SoapResponse
{

    /** @var Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_ErrorDetails */
    protected $errorMessage = null;

    /** @var string */
    protected $confirmationNumber = null;

    /**
     * @param stdClass $obj
     */
    public function __construct($obj = null)
    {
        $objectVars = is_object($obj) ? get_object_vars($obj) : [];
        if ($obj && !empty($objectVars)) {
            $this->errorMessage = new Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_ErrorDetails($obj->ErrorMessage);
            if (array_key_exists('ConfirmationNumber', $objectVars)) {
                $this->confirmationNumber = $obj->ConfirmationNumber;
            }
        }
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_ErrorDetails $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_BookingResponse
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
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_BookingResponse
     */
    public function setConfirmationNumber($value)
    {
        $this->confirmationNumber = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getConfirmationNumber()
    {
        return $this->confirmationNumber;
    }

}
