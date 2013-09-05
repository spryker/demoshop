<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 */
class Sao_Zed_Sales_Component_Model_Communication_Webservice_CustomerInformation implements
    Sao_Zed_Sales_Component_Model_Communication_Webservice_Command
{
    /**
     * @var int
     */
    protected $userId;

    /**
     * @param null $userId
     */
    public function __construct($userId = null)
    {
        $this->userId = (int) $userId;
    }

    /**
     * @param null $userId
     * @return Sao_Shared_Legacy_Transfer_Response_Legacy
     * @throws Exception
     */
    public function send($userId = null)
    {
        if ($userId !== null) {
            $this->userId = (int) $userId;
        }
        if (!$this->userId) {
            throw new Exception('Missing legacy user-id in sales-object');
        }
        $customer = new Sao_Shared_Customer_Transfer_Legacy(array('user_id' => $this->userId));
        $transferResponse = $this->getLegacyRequest()->request(
            'customer/legacy/profile',
            $customer
        );
        return $transferResponse;
    }

    /**
     * @return Sao_Shared_Library_Legacy_Request
     */
    protected function getLegacyRequest()
    {
        return new Sao_Shared_Library_Legacy_Request();
    }

    /**
     * @param \ProjectA_Zed_Sales_Persistence_PacSalesOrder $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
}
