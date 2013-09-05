<?php

/**
 * Class Sao_Shared_Fulfillment_Transfer_Pickup
 */
class Sao_Shared_Fulfillment_Transfer_Pickup extends ProjectA_Shared_Library_Abstract_Object
{

    /**
     * @var string
     */
    protected $date = null;
    protected $_date = [];
    /**
     * @var string
     */
    protected $readyTime = null;
    protected $_readyTime = [];

    /**
     * @var string
     */
    protected $closeTime = null;
    protected $_closeTime = [];

    /**
     * @param string $date
     * @return Sao_Shared_Fulfillment_Transfer_Pickup
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param $closeTime
     * @return $this
     */
    public function setCloseTime($closeTime)
    {
        $this->closeTime = $closeTime;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCloseTime()
    {
        return $this->closeTime;
    }

    /**
     * @param $readyTime
     * @return Sao_Shared_Fulfillment_Transfer_Pickup
     */
    public function setReadyTime($readyTime)
    {
        $this->readyTime = $readyTime;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getReadyTime()
    {
        return $this->readyTime;
    }



}