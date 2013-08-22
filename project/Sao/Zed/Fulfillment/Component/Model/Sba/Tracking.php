<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 */

class Sao_Zed_Fulfillment_Component_Model_Sba_Tracking extends Sao_Zed_Fulfillment_Component_Model_Api_Tracking_Abstract
{

    /**
     * @var string
     */
    protected $vendorNumber;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $referenceNumber;

    /**
     * @var string
     */
    protected $trackingNumber;

    /**
     * @var array
     */
    protected $statuses;

    /**
     * @var array
     */
//    protected $statusMap = array(
//        'AF' => 'Picked Up and In Transit',
//        'AJ' => 'Confirmed and On Board',
//        'AP' => 'Missed Pickup',
//        'AV' => 'Picked Up and On Hand',
//        'BA' => 'Pickup Scheduled',
//        'D1' => 'Proof Of Delivery',
//        'PR' => 'Customs Delay',
//        'X6' => 'Out for Delivery',
//        'FF' => '* Free Form'
//    );

    /**
     * @param $xml
     */
    public function __construct($xml = null)
    {
        $this->xml = $xml;
    }

    /**
     * @throws Exception
     */
    protected function validateData()
    {
        $config = $this->getConfig();
        if ($config->customer_number !== $this->vendorNumber) {
            throw new Exception('The given vendor number is invalid!');
        }
        if ($config->password !== $this->password) {
            throw new Exception('The given password is invalid!');
        }
    }

    /**
     *
     */
    public function run()
    {
        libxml_disable_entity_loader(false);
        $soapServer = $this->factory->getModelSoapServer($this->getWsdlUrl());
        $handler = $this->factory->getModelSbaTrackingWebserviceHandler($this);
        $soapServer->setObject($handler);
        $soapServer->handle($this->xml);
        $this->addToLumberjack($soapServer->getLastResponse());
        return true;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Tracking_Result_Collection
     */
    protected function getTrackingResultCollection()
    {
        $resultCollection = $this->factory->getModelApiTrackingResultCollection();
        $result = $this->factory->getModelApiTrackingResult();

        $result->setTrackingNumber($this->trackingNumber);
        $result->setQuote($this->getQuote());

        foreach ($this->statuses as $status) {
            $s = $this->factory->getModelApiTrackingStatus();
            $s->setCode($status->Code);
            $s->setDescription($status->Description);

            $timestamp = new DateTime($status->Date.' '.$status->Time1);
            $s->setStatusTimestamp($timestamp->format(DateTime::ISO8601));
            $result->addStatus($s);
        }

        $resultCollection->attach($result);
        return $resultCollection;
    }

    /**
     * @return int
     */
    protected function getFulfillmentReferenceNumber()
    {
        return $this->referenceNumber;
    }

    /**
     * @return ProjectA_Shared_Library_Config_Object
     */
    protected function getConfig()
    {
        return $this->factory->getSettings()->getConfig()->sba;
    }

    /**
     * @param $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @param $referenceNumber
     * @return $this
     */
    public function setReferenceNumber($referenceNumber)
    {
        $this->referenceNumber = $referenceNumber;
        return $this;
    }

    /**
     * @param $statuses
     * @return $this
     */
    public function setStatuses($statuses)
    {
        $this->statuses = $statuses;
        return $this;
    }

    /**
     * @param $trackingNumber
     * @return $this
     */
    public function setTrackingNumber($trackingNumber)
    {
        $this->trackingNumber = $trackingNumber;
        return $this;
    }

    /**
     * @param $vendorNumber
     * @return $this
     */
    public function setVendorNumber($vendorNumber)
    {
        $this->vendorNumber = $vendorNumber;
        return $this;
    }

    /**
     * @param $response
     */
    protected function addToLumberjack($response)
    {
        $lumberJack = ProjectA_Shared_Lumberjack_Code_Lumberjack::getInstance();
        $lumberJack->addField('response', $response);
        $lumberJack->send(ProjectA_Shared_Lumberjack_Code_Log_Types::FULFILLMENT, 'Sba Tracking Response', 'sba');
    }

    /**
     * @return string
     */
    protected function getWsdlUrl()
    {
        return __DIR__ . '/Tracking/Webservice/shipmentstatus.wsdl';
    }

}