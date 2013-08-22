<?php

abstract class Sao_Zed_Fulfillment_Component_Model_Api_Abstract implements
    ProjectA_Zed_Library_Dependency_Factory_Interface,
    ProjectA_Zed_Library_DataStructure_Named_Interface
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    const METHOD_QUOTE = 'quote';
    const METHOD_ORDER = 'order';

    const PROVIDER_NAME = '';

    /**
     * @var Sao_Zed_Fulfillment_Component_Factory
     */
    protected $factory;

    /**
     * @var ProjectA_Shared_Library_Config_Object
     */
    protected $config;

    /**
     * @var Sao_Zed_Fulfillment_Component_Model_Api_Response_Abstract
     */
    protected $response;

    /**
     * @var array
     */
    protected $apiAuth;

    /**
     * @var bool
     */
    protected $testMode;

    /**
     * @return string
     */
    public function getName()
    {
        return static::PROVIDER_NAME;
    }

    /**
     * @param array $apiAuth
     */
    public function setApiAuth($apiAuth)
    {
        $this->apiAuth = $apiAuth;
    }

    /**
     * @return array
     */
    public function getApiAuth()
    {
        return $this->apiAuth;
    }

    /**
     * @param boolean $testMode
     */
    public function setTestMode($testMode)
    {
        $this->testMode = $testMode;
    }

    /**
     * @return boolean
     */
    public function getTestMode()
    {
        return $this->testMode;
    }

    /**
     * @param ProjectA_Shared_Library_Config_Object $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }

    /**
     * @return ProjectA_Shared_Library_Config_Object
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order
     * @param Traversable $items
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Quote_Response[]
     */
    public abstract function getFulfillmentCosts(Sao_Shared_Sales_Transfer_Order $order, Traversable $items);

    /**
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Order_Response
     */
    public abstract function appointShipping(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote);

    /**
     * @param $action
     * @param array $fields
     */
    public function logRequest($action, array $fields)
    {
        $this->logCommunication($action, 'request', $fields);
    }

    /**
     * @param $action
     * @param array $fields
     */
    public function logResponse($action, array $fields)
    {
        $this->logCommunication($action, 'response', $fields);
    }

    /**
     * @param $action
     * @param $messageType
     * @param $fields
     */
    protected function logCommunication($action, $messageType, $fields)
    {
        $lumberjack = ProjectA_Shared_Lumberjack_Code_Lumberjack::getInstance();

        foreach ($fields as $fieldType => $fieldValue) {
            $lumberjack->addField($fieldType, $fieldValue);
        }
        $lumberjack->send(
            ProjectA_Shared_Lumberjack_Code_Log_Types::FULFILLMENT,
            ucfirst($action) . ' ' . ucfirst($messageType),
            self::getName()
        );
    }

    /**
     * @param $string
     * @return string
     */
    public function formatRaw($string)
    {
        return '<pre>' . htmlspecialchars($string, ENT_QUOTES | ENT_XML1) . '</pre>';
    }

    /**
     * format xml string for output
     *
     * @param string $xml
     * @return string
     */
    public function formatXml($xml)
    {
        if (empty($xml)) {
            return '';
        }

        $dom = new DOMDocument;
        $dom->preserveWhiteSpace = false;
        $dom->loadXML($xml);
        $dom->formatOutput = true;

        return $this->formatRaw($dom->saveXml());
    }

}
