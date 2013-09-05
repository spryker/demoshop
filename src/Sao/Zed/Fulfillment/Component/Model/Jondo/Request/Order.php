<?php

class Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Order
    extends Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Abstract
{

    const MESSAGE_GROUP = 'order';

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var string
     */
    protected $phoneNumber;

    /**
     * @var string
     */
    protected $shippingType;

    /**
     * @var string
     */
    protected $poNumber;

    /**
     * @var string
     */
    protected $aptNumber;

    /**
     * @var int
     */
    protected $quoteId;

    /**
     * @var bool
     */
    protected $testMode;

    /**
     * @var Sao_Zed_Fulfillment_Component_Model_Jondo_Request_ServiceManager
     */
    protected $serviceManager;

    /**
     * @param string $aptNumber
     */
    public function setAptNumber($aptNumber)
    {
        $this->aptNumber = $aptNumber;
    }

    /**
     * @return string
     */
    public function getAptNumber()
    {
        return $this->aptNumber;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $poNumber
     */
    public function setPoNumber($poNumber)
    {
        $this->poNumber = $poNumber;
    }

    /**
     * @return string
     */
    public function getPoNumber()
    {
        return $this->poNumber;
    }

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

    /**
     * @param string $shippingType
     */
    public function setShippingType($shippingType)
    {
        $this->shippingType = $shippingType;
    }

    /**
     * @return string
     */
    public function getShippingType()
    {
        return $this->shippingType;
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
     * @param Sao_Zed_Fulfillment_Component_Model_Jondo_Request_ServiceManager $serviceManager
     */
    public function setServiceManager($serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Request_ServiceManager
     */
    public function getServiceManager()
    {
        return $this->serviceManager;
    }

    public function __construct()
    {
        parent::__construct();
        $this->requiredFields = array_merge(
            $this->requiredFields,
            ['firstName', 'lastName', 'city', 'state', 'phoneNumber', 'shippingType', 'quoteId']
        );
        $this->optionalFields = array_merge(
            $this->optionalFields,
            ['aptNumber', 'poNumber', 'testMode']
        );

        $this->serviceManager = new Sao_Zed_Fulfillment_Component_Model_Jondo_Request_ServiceManager();
    }

    public function initDefaultServices()
    {
        $stickerService = Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_Factory::getService(
            Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_Interface::TYPE_STICKER
        );
        $this->getServiceManager()->addService($stickerService);
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_Abstract $service
     */
    public function addService(Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_Abstract $service)
    {
        $this->getServiceManager()->addService($service);
    }

    /**
     * @param DOMDocument $dom
     * @param DOMElement $parent
     */
    protected function appendServices(DOMDocument $dom, DOMElement $parent)
    {
        $this->getServiceManager()->appendToDom($dom, $parent);
    }

}