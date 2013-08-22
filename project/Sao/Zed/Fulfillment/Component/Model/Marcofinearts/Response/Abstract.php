<?php

abstract class Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Response_Abstract
{

    /** @var string */
    protected $res;

    /** @var int */
    protected $code;

    /** @var string */
    protected $message;

    /**
     * @param int $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @param string $message
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @param array $data
     */
    public function initFromArray(array $data)
    {
        foreach ($data as $fieldName => $value) {
            $this->{$fieldName} = $value;
        }
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $res
     * @return $this
     */
    public function setRes($res)
    {
        $this->res = $res;
        return $this;
    }

    /**
     * @return bool
     */
    public function isError() {
        return $this->res != 'success';
    }

    /**
     * @return bool
     */
    public function isSuccess() {
        return $this->res == 'success';
    }

}
