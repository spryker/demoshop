<?php

/**
 * Class Sao_Shared_Artist_Transfer_ArtworkAvailability
 */
class Sao_Shared_Artist_Transfer_ArtworkAvailability extends ProjectA_Shared_Library_Abstract_Object
{

    const RESULT_MESSAGE_ALREADY_SET = 'availability already set';
    const RESULT_MESSAGE_STATUS_SET_ADDRESS_CHANGED = 'availability set address changed';
    const RESULT_MESSAGE_STATUS_SET_ADDRESS_NOT_CHANGED = 'availability set address not changed';

    /**
     * @var string $hash
     */
    protected $hash = null;
    protected $_hash = ['is_string'];

    /**
     * @var string $artworkAvailability
     */
    protected $artworkAvailability = null;
    protected $_artworkAvailability = [];

    /**
     * @var
     */
    protected $resultMessage = null;
    protected $_resultMessage = ['is_string'];

    /**
     * @var Sao_Shared_Artist_Transfer_Address
     */
    protected $address = 'Sao_Shared_Artist_Transfer_Address';
    protected $_address = [];

    /**
     * @var Sao_Shared_Fulfillment_Transfer_Pickup
     */
    protected $fulfillmentPickup = 'Sao_Shared_Fulfillment_Transfer_Pickup';
    protected $_fulfillmentPickup = [];

    /**
     * @param string $hash
     * @return Sao_Shared_Artist_Transfer_ArtworkAvailability
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
        return $this;
    }

    /**
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param string $artworkAvailability
     * @return Sao_Shared_Artist_Transfer_ArtworkAvailability
     */
    public function setArtworkAvailability($artworkAvailability)
    {
        $this->artworkAvailability = $artworkAvailability;
        return $this;
    }

    /**
     * @return string
     */
    public function getArtworkAvailability()
    {
        return $this->artworkAvailability;
    }

    /**
     * @param $resultMessage
     * @return $this
     */
    public function setResultMessage($resultMessage)
    {
        $this->resultMessage = $resultMessage;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResultMessage()
    {
        return $this->resultMessage;
    }

    /**
     * @param Sao_Shared_Artist_Transfer_Address $address
     * @return Sao_Shared_Artist_Transfer_ArtworkAvailability
     */
    public function setAddress(Sao_Shared_Artist_Transfer_Address $address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return Sao_Shared_Artist_Transfer_Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param Sao_Shared_Fulfillment_Transfer_Pickup $fulfillmentPickup
     * @return Sao_Shared_Artist_Transfer_ArtworkAvailability
     */
    public function setFulfillmentPickup(Sao_Shared_Fulfillment_Transfer_Pickup $fulfillmentPickup)
    {
        $this->fulfillmentPickup = $fulfillmentPickup;
        return $this;
    }

    /**
     * @return Sao_Shared_Fulfillment_Transfer_Pickup
     */
    public function getFulfillmentPickup()
    {
        return $this->fulfillmentPickup;
    }

}