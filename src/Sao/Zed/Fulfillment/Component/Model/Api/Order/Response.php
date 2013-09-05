<?php

class Sao_Zed_Fulfillment_Component_Model_Api_Order_Response extends Sao_Zed_Fulfillment_Component_Model_Api_Response_Abstract
{
    /** @var int */
    protected $printOrderId;

    /** @var string */
    protected $printProvider;

    /** @var string */
    protected $internalOrderId;

    /**
     * @param int $printOrderId
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Order_Response
     */
    public function setPrintOrderId($printOrderId)
    {
        $this->printOrderId = $printOrderId;
        return $this;
    }

    /**
     * @return int
     */
    public function getPrintOrderId()
    {
        return $this->printOrderId;
    }

    /**
     * @param string $printProvider
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Order_Response
     */
    public function setPrintProvider($printProvider)
    {
        $this->printProvider = $printProvider;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrintProvider()
    {
        return $this->printProvider;
    }

    /**
     * @param string $internalOrderId
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Order_Response
     */
    public function setInternalOrderId($internalOrderId)
    {
        $this->internalOrderId = $internalOrderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getInternalOrderId()
    {
        return $this->internalOrderId;
    }

}
