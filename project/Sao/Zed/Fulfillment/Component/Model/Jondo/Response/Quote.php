<?php

/**
 * @author Martynas Narbutas <martynas.narbutas @ project-a.com>
 */
class Sao_Zed_Fulfillment_Component_Model_Jondo_Response_Quote
    extends Sao_Zed_Fulfillment_Component_Model_Jondo_Response_Abstract
    implements ProjectA_Zed_Library_Dependency_Factory_Interface
{
    const MESSAGE_GROUP = 'quote';

    const COUNTRY_US = 'US';

    const CODE_SUCCESS = 1000;

    const CODE_INVALID_CREDENTIALS = 1001; // Invalid User ID / Api Key!
    const CODE_DB_CONNECTION_ERROR = 1002; // Database Connection Error!
    const CODE_ADDRESS_ERROR = 1003; // Address Error
    const CODE_ERROR_FOR_ALL_SERVICES = 1004; // Error for all services
    const CODE_REFERENCE_NUMBER_MISSING = 1005; // Reference Number missing
    const CODE_QUANTITY_ZERO = 1006; // Quantity must be greater than 0
    const CODE_PRODUCT_CODE_ERROR = 1007; // Product Code Error

    /**
     * @var Sao_Zed_Fulfillment_Component_Factory
     */
    protected $factory;

    /**
     * @param ProjectA_Zed_Library_Component_Interface_FactoryInterface $factory
     */
    public function setFactory(ProjectA_Zed_Library_Component_Interface_FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @var int
     */
    protected $quoteId;

    /**
     * @var array
     */
    protected $shipping = [];

    /**
     * @var array
     */
    protected $shippingProvider = ['fedex', 'usps'];

    /**
     * @param int $quoteId
     */
    public function setQuoteId($quoteId)
    {
        $this->quoteId = $quoteId;
    }

    /**
     * @return int
     */
    public function getQuoteId()
    {
        return $this->quoteId;
    }


    public function __construct()
    {
        parent::__construct();
        $this->requiredFields = array_merge(
            $this->requiredFields,
            ['quoteId']
        );
        $this->optionalFields = array_merge(
            $this->optionalFields,
            ['refNumber']
        );
    }

    /**
     * @return bool
     */
    public function hasAvailableRates()
    {
        /** @var $provider Sao_Zed_Fulfillment_Component_Model_Jondo_Shipping_Abstract */
        foreach ($this->getPreferredShippingProviders() as $provider) {
            if (true === $provider->hasValidRates()) {
                return true;
            }
        }
        return false;
    }

    /**
     * @return array
     */
    protected function getPreferredShippingProvider()
    {
        $disabledCarriers = [];
        if (0 === strcmp($this->location->getCountry(), static::COUNTRY_US)) {
            $disabledCarriers[] = 'usps';
        }
        return array_diff($this->shippingProvider, $disabledCarriers);
    }

    /**
     * @return array
     */
    protected function getPreferredShippingProviders()
    {
        $preferred = array_flip($this->getPreferredShippingProvider());
        return array_intersect_key($this->shipping, $preferred);
    }

    /**
     * @param $responseXml
     */
    public function parseResponseXml($responseXml)
    {
        // parse base data (userId, apiKey, code, message, quoteId, refNumber)
        parent::parseResponseXml($responseXml);

        // parse location object (city, state, country)
        $this->location = $this->factory->getModelJondoResponseLocation();
        /** @var $locationSimpleXml SimpleXMLElement */
        $locationSimpleXml = $this->responseContainer->{'location'};
        $this->location->parse($locationSimpleXml);

        // parse shipping provider (fedex, usps)
        foreach ($this->shippingProvider as $providerName) {
            $provider = $this->getShippingProviderByName($providerName);
            /** @var $providerSimpleXml SimpleXMLElement */
            $providerSimpleXml = $this->responseContainer->$providerName;
            $provider->parse($providerSimpleXml);
            $this->shipping[$providerName] = $provider;
        }
    }


    /**
     * @param $name
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Shipping_Abstract
     * @throws ErrorException
     */
    protected function getShippingProviderByName($name)
    {
    	// TODO: refactor me
        $factoryMethod = 'getModelJondoShipping' . ucfirst($name);
        if (method_exists($this->factory, $factoryMethod)) {
            $instance = $this->factory->{$factoryMethod}();
            if ($instance instanceof Sao_Zed_Fulfillment_Component_Model_Jondo_Shipping_Abstract) {
                return $instance;
            } else {
                $class   = get_class($instance);
                $message = 'API [' . $class . '] does not implement Sao_Fulfillment_Model_Jondo_Shipping_Abstract';
                throw new ErrorException($message);
            }
        }
        $message = 'Provider ' . $name . ' not found';
        throw new ErrorException($message);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $array = parent::toArray();
        // set location
        $array['location'] = $this->location->toArray();
        /** @var $provider Sao_Zed_Fulfillment_Component_Model_Jondo_Shipping_Abstract */
        foreach ($this->shipping as $name => $provider) {
            $array[$name] = $provider->toArray();
        }
        return $array;
    }

    /**
     * @return bool
     */
    public function isSuccess() {
        return $this->code == self::CODE_SUCCESS;
    }

    /**
     * @return array
     */
    public function getShipping()
    {
        return array_values($this->shipping);
    }

}
