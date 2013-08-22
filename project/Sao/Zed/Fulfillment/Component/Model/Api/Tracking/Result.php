<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 */

class Sao_Zed_Fulfillment_Component_Model_Api_Tracking_Result
{

    /**
     * @var string
     */
    protected $trackingNumber;

    /**
     * @var Sao_Zed_Fulfillment_Persistence_FulfillmentQuote
     */
    protected $quote;

    /**
     * @var array|Sao_Zed_Fulfillment_Component_Model_Api_Tracking_Status[]
     */
    protected $status = array();

    /**
     * @param string $trackingNumber
     */
    public function setTrackingNumber($trackingNumber)
    {
        $this->trackingNumber = $trackingNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrackingNumber()
    {
        if (is_null($this->trackingNumber)) {
            throw new Exception('Couldn\'t find a tracking number!');
        }
        return $this->trackingNumber;
    }

    /**
     * @param \Entity_SaoFulfillmentQuote $quote
     */
    public function setQuote($quote)
    {
        $this->quote = $quote;
        return $this;
    }

    /**
     * @return \Entity_SaoFulfillmentQuote
     */
    public function getQuote()
    {
        if (is_null($this->quote)) {
            throw new Exception('Couldn\'t find a quote!');
        }
        return $this->quote;
    }

    /**
     * @param array $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function addStatus(Sao_Zed_Fulfillment_Component_Model_Api_Tracking_Status $status)
    {
        $this->status[] = $status;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Tracking_Status[]
     */
    public function getStatus()
    {
        return $this->status;
    }

}