<?php

abstract class Sao_Zed_Fulfillment_Component_Model_Jondo_Shipping_Abstract
    implements ProjectA_Zed_Library_Dependency_Factory_Interface
{
    const AGENT_NAME = 'abstract';

    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /**
     * @var int
     */
    protected $response;

    /**
     * @var int
     */
    protected $errorCode = 0;

    /**
     * @var string
     */
    protected $errorMessage = "";

    /**
     * @var array
     */
    protected $rates = [];

    /**
     * @var array
     */
    protected $methodsNational = [];

    /**
     * @var array
     */
    protected $methodsInternational = [];

    /**
     * @var array
     */
    protected $methodsDisabled = [];

    /**
     * @return int
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return int
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @return array
     */
    public function getMethodsNational()
    {
        return $this->methodsNational;
    }

    /**
     * @return array
     */
    public function getMethodsInternational()
    {
        return $this->methodsInternational;
    }

    /**
     * @return array
     */
    public function getAvailableMethods()
    {
        return array_merge($this->methodsNational, $this->methodsInternational);
    }

    /**
     * @return array
     */
    public function getAllowedMethods()
    {
        return array_diff($this->getAvailableMethods(), $this->methodsDisabled);
    }

    /**
     * @return bool
     */
    public function hasValidRates()
    {
        /** @var $rate Sao_Zed_Fulfillment_Component_Model_Jondo_Shipping_Rate */
        foreach ($this->getAvailableRates() as $rate) {
            if (true === $rate->hasPrice()) {
                return true;
            }
        }
        return false;
    }

    /**
     * @return array
     */
    public function getAvailableRates()
    {
        return array_intersect_key($this->rates, array_flip($this->getAllowedMethods()));
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Shipping_Rate
     */
    public function getCheapestRate()
    {
        /** @var $minRate Sao_Zed_Fulfillment_Component_Model_Jondo_Shipping_Rate */
        $minRate = null;
        /** @var $rate Sao_Zed_Fulfillment_Component_Model_Jondo_Shipping_Rate */
        foreach ($this->rates as $rate) {
            if (is_null($minRate) && $rate->hasPrice()) {
                $minRate = $rate;
                continue;
            }
            if ($rate->hasPrice() && ($minRate->getTotal() > $rate->getTotal())) {
                $minRate = $rate;
            }
        }
        return $minRate;
    }

    /**
     * @param SimpleXMLElement $simpleXml
     */
    public function parse(SimpleXMLElement $simpleXml)
    {
        $this->response     = (int)$simpleXml->{'resp'};
        $this->errorCode    = (int)$simpleXml->{'errorCode'};
        $this->errorMessage = (string)$simpleXml->{'errorMessage'};
        foreach ($this->getAvailableMethods() as $methodName) {
            $rate = $this->factory->getModelJondoShippingRate();
            /* @var $rateXml SimpleXMLElement */
            $rateXml = $simpleXml->$methodName;
            if (empty($rateXml)) {
                continue;
            }
            $rate->parse($rateXml);
            $this->rates[$methodName] = $rate;
        }
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $array = array(
            'resp'         => (int)$this->response,
            'errorCode'    => (int)$this->errorCode,
            'errorMessage' => (string)$this->errorMessage,
        );
        /** @var $rate Sao_Zed_Fulfillment_Component_Model_Jondo_Shipping_Rate */
        foreach ($this->getAvailableMethods() as $methodName) {
            if (!empty($this->rates[$methodName])) {
                $rate               = $this->rates[$methodName];
                $array[$methodName] = $rate->toArray();
            }
        }
        return $array;
    }

    /**
     * @return string
     */
    public function getAgentName()
    {
        return static::AGENT_NAME;
    }

}
