<?php

/**
 * @author Martynas Narbutas <martynas.narbutas @ project-a.com>
 */
class Sao_Zed_Fulfillment_Component_Model_Jondo_Response_Location
{
    /**
     * @var string
     */
    protected $city = "";

    /**
     * @var string
     */
    protected $state = "";

    /**
     * @var string
     */
    protected $country = "";

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param SimpleXMLElement $simpleXml
     */
    public function parse(SimpleXMLElement $simpleXml)
    {
        $this->city    = (string)($simpleXml->city);
        $this->state   = (string)($simpleXml->state);
        $this->country = (string)($simpleXml->country);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'city'    => $this->city,
            'state'   => $this->state,
            'country' => $this->country
        );
    }
}