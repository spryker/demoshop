<?php

abstract class Sao_Zed_Fulfillment_Component_Model_Api_Response_Abstract
{
    /**
     * @var bool
     */
    protected $success;

    /**
     * @var int
     */
    protected $code;

    /**
     * @var string
     */
    protected $message;

    /**
     * @param $success
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Response_Abstract
     */
    public function setSuccess($success)
    {
        $this->success = $success;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isSuccess()
    {
        return $this->success;
    }

    /**
     * @param $code
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Response_Abstract
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param $message
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Response_Abstract
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

}
