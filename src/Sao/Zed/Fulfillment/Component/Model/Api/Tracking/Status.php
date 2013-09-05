<?php

class Sao_Zed_Fulfillment_Component_Model_Api_Tracking_Status
{

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var DateTime
     */
    protected $statusTimestamp;

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param \DateTime $statusTimestamp
     */
    public function setStatusTimestamp($statusTimestamp)
    {
        $this->statusTimestamp = $statusTimestamp;
    }

    /**
     * @return \DateTime
     */
    public function getStatusTimestamp()
    {
        return $this->statusTimestamp;
    }



}