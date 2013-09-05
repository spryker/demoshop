<?php
/**
 * Auto-generated Soap Model Class
 */
class Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_ErrorDetails extends Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_SoapResponse
{

    /** @var string */
    protected $errorCode = null;

    /** @var string */
    protected $errorMessage = null;

    /**
     * @param stdClass $obj
     */
    public function __construct($obj = null)
    {
        $objectVars = is_object($obj) ? get_object_vars($obj) : [];
        if ($obj && !empty($objectVars)) {
            $this->errorCode = $obj->ErrorCode;
            $this->errorMessage = $obj->ErrorMessage;
        }
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_ErrorDetails
     */
    public function setErrorCode($value)
    {
        $this->errorCode = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param string $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_ErrorDetails
     */
    public function setErrorMessage($value)
    {
        $this->errorMessage = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

}
