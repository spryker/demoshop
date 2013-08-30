<?php

class Sao_Zed_Fulfillment_Component_Model_Sba_SoapClient implements
    ProjectA_Zed_Library_Dependency_Factory_Interface,
    ProjectA_Zed_Library_Dependency_InitInterface
{

    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /** @var Generated_Zed_Fulfillment_Component_Factory */
    protected $factory;

    /** @var Zend_Soap_Client */
    protected $soapClient;

    /**
     * @var mixed SOAP functions may return one, or multiple values.
     * If only one value is returned by the SOAP function, the return value of __soapCall will be a simple value (e.g. an integer, a string, etc).
     * If multiple values are returned, __soapCall will return     * an associative array of named output parameters.
     */
    public $response = null;

    /** @var string The last SOAP request, as an XML string. */
    protected $rawRequest = null;

    /** @var string The last SOAP response, as an XML string. */
    protected $rawResponse = null;

    /** @var SoapFault */
    protected $soapError;

    /**
     * Method is called after all dependencies are injected.
     * Use this as a replacement of __contruct() if you want to use injected objects.
     */
    public function initAfterDependencyInjection()
    {
        $this->createSoapClient();
    }

    protected function createSoapClient()
    {
        $this->handleWsdlCaching(false);
        $wsdlUrl = $this->factory->getSettings()->getConfigForProvider('sba')->apiUrl;
        $this->soapClient = new Zend_Soap_Client($wsdlUrl, array());
    }

    /**
     * @param bool $isEnabled
     * @return void
     */
    protected function handleWsdlCaching($isEnabled)
    {
        assert(is_bool($isEnabled));
        $cacheFlag = (true === $isEnabled) ? 1 : 0;
        ini_set('soap.wsdl_cache_enabled', $cacheFlag);
    }

    protected function setWsdlCaching($enable)
    {
        ini_set('soap.wsdl_cache_enabled', (int)$enable);
    }

    /**
     * @param $action
     * @param $method
     * @param $params
     */
    public function doCall($action, $method, $params)
    {
        $startTime = microtime(true);
        try {
            $this->response = $this->soapClient->$method($params);
            $duration = number_format(microtime(true) - $startTime, 4);

            $this->rawRequest = $this->soapClient->getLastRequest();
            $this->rawResponse = $this->soapClient->getLastResponse();

            $api = $this->factory->getModelSbaApi();
            $api->logRequest($action, ['request' => $params, 'raw request' => $api->formatXml($this->rawRequest), 'request headers' => $api->formatRaw($this->soapClient->getLastRequestHeaders())]);
            $api->logResponse($action, ['duration' => $duration, 'response' => $this->response, 'raw response' => $api->formatXml($this->rawResponse)]);
        } catch (SoapFault $sf) {
            $duration       = number_format(microtime(true) - $startTime, 4);

            $this->rawRequest  = $this->soapClient->getLastRequest();
            $this->rawResponse = $this->soapClient->getLastResponse();

            $api = $this->factory->getModelSbaApi();
            $api->logRequest($action, ['request' => $params, 'raw request' => $api->formatXml($this->rawRequest), 'request headers' => $api->formatRaw($this->soapClient->getLastRequestHeaders())]);
            $api->logResponse($action, ['duration' => $duration, 'response' => $this->response, 'raw response' => $api->formatXml($this->rawResponse)]);

            throw $sf;
        }
    }

    /**
     * get the current response
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * get the current request as xml
     * @return null|string
     */
    public function getRawRequest()
    {
        return $this->rawRequest;
    }

    /**
     * get the current response as xml
     * @return null|string
     */
    public function getRawResponse()
    {
        return $this->rawResponse;
    }

    /**
     * @return \SoapFault
     */
    public function getSoapError()
    {
        return $this->soapError;
    }

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return (null === $this->getSoapError());
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_CalculateRates $parameters
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_CalculateRatesResponse
     */
    public function calculateRates(Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_CalculateRates $parameters)
    {
        $this->doCall(Sao_Zed_Fulfillment_Component_Model_Api_Abstract::METHOD_QUOTE, 'CalculateRates', $parameters);
        if ($this->getSoapError()) {
            $response = new Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_CalculateRatesResponse();
            $response->setError($this->soapError);
        } else {
            $response = new Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_CalculateRatesResponse($this->response);
        }
        return $response;
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookShipment $parameters
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_BookShipmentResponse
     */
    public function bookShipment(Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookShipment $parameters)
    {
        $this->doCall(Sao_Zed_Fulfillment_Component_Model_Api_Abstract::METHOD_ORDER, 'BookShipment', $parameters);
        if ($this->getSoapError()) {
            $response = new Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_BookShipmentResponse();
            $response->setError($this->response);
        } else {
            $response = new Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_BookShipmentResponse($this->response);
        }
        return $response;
    }

}
