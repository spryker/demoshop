<?php

class Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Quote
    extends Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Abstract
{

    const MESSAGE_GROUP = 'quote';

    /**
     * @var string
     */
    protected $refNumber;


    public function __construct()
    {
        parent::__construct();
        $this->optionalFields = array_merge(
            $this->optionalFields,
            ['city', 'state', 'refNumber']
        );
    }

    /**
     * @param $refNumber
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Quote
     */
    public function setRefNumber($refNumber)
    {
        $this->refNumber = $refNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getRefNumber()
    {
        return $this->refNumber;
    }




}