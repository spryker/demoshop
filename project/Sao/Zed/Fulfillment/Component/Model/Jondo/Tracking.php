<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 */

class Sao_Zed_Fulfillment_Component_Model_Jondo_Tracking extends Sao_Zed_Fulfillment_Component_Model_Api_Tracking_Abstract
    implements ProjectA_Zed_Library_Dependency_InitInterface
{

    const KEY_USER_ID = 'userId';
    const KEY_USER_KEY = 'userKey';
    const KEY_PO_NUMBER = 'poNumber';
    const KEY_ID_SALES_ORDER = 'orderId';
    const KEY_TRACKING_NUMBER = 'tracking';
    const TRACKING_NUMBER_SEPARATOR = '|';

    /**
     * @var array
     */
    protected $data;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return bool
     */
    public function run()
    {
        return $this->saveTrackingNumber();
    }

    /**
     *
     */
    public function initAfterDependencyInjection()
    {
        $this->validateData();
    }

    /**
     * @throws Exception
     */
    protected function validateData()
    {
        $config = $this->getConfig();
        if (!isset($this->data[self::KEY_USER_KEY]) || $config->userKey !== $this->data[self::KEY_USER_KEY]) {
            throw new Exception('The given API Key is invalid!');
        }
        if (!isset($this->data[self::KEY_USER_ID]) || $config->userId != $this->data[self::KEY_USER_ID]) {
            throw new Exception('The given User Id is invalid!');
        }
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Tracking_Result_Collection
     */
    protected function getTrackingResultCollection()
    {
        $resultCollection = $this->factory->getModelApiTrackingResultCollection();
        $trackingNumbers = explode(self::TRACKING_NUMBER_SEPARATOR, $this->data[self::KEY_TRACKING_NUMBER]);
        foreach ($trackingNumbers as $trackingNumber) {
            $result = $this->factory->getModelApiTrackingResult();
            $result->setTrackingNumber($trackingNumber);
            $result->setQuote($this->getQuote());
            $resultCollection->attach($result);
        }
        return $resultCollection;
    }

    /**
     * @return int
     */
    protected function getFulfillmentReferenceNumber()
    {
        return $this->data[self::KEY_PO_NUMBER];
    }

    /**
     * @return ProjectA_Shared_Library_Config_Object
     */
    protected function getConfig()
    {
        return $this->factory->getSettings()->getConfig()->jondo;
    }

}
