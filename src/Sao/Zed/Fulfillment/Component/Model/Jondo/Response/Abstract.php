<?php

abstract class Sao_Zed_Fulfillment_Component_Model_Jondo_Response_Abstract
    extends Sao_Zed_Fulfillment_Component_Model_Jondo_Message_Abstract
{
    // it's a response
    const MESSAGE_TYPE = 'response';
    const MESSAGE_CONTAINER = 'Reply';

    // it's a abstract class, group still abstract
    //const MESSAGE_GROUP = 'abstract';

    /**
     * @var int
     */
    protected $code;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var Sao_Zed_Fulfillment_Component_Model_Jondo_Response_Location
     */
    protected $location;

    /**
     * @var SimpleXMLElement
     */
    protected $responseContainer;

    /**
     * @param int $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param \Sao_Fulfillment_Model_Jondo_Response_Location $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return \Sao_Fulfillment_Model_Jondo_Response_Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    public function __construct()
    {
        $this->requiredFields = array_merge(
            $this->requiredFields,
            ['code', 'message']
        );
    }

    /**
     * @param $responseXml
     */
    public function parseResponseXml($responseXml)
    {
        $simpleXml = simplexml_load_string($responseXml, 'SimpleXMLElement');

        /** @var $responseContainer SimpleXMLElement */
        $this->responseContainer = $simpleXml->{$this->getMessageContainerName()};
        foreach ($this->getAllFields() as $field) {
            $this->{$field} = (string)$this->responseContainer->{$field};
        }
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $array = [];
        foreach ($this->getAllFields() as $field) {
            $array[$field] = $this->$field;
        }
        return $array;
    }
    
    /**
     * @return bool
     */
    public abstract function isSuccess();

}