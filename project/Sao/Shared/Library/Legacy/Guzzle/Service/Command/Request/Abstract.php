<?php

/**
 * Class Sao_Shared_Library_Legacy_Guzzle_Service_Command_Request_Abstract
 *
 * @author Stefan Sorge
 */
abstract class Sao_Shared_Library_Legacy_Guzzle_Service_Command_Request_Abstract extends Guzzle\Service\Command\OperationCommand
{
    /**
     * @var Sao_Shared_Application_Transfer_Request
     */
    protected $transferRequest;

    /**
     * @param Sao_Shared_Application_Transfer_Request $transferRequest
     *
     * @return self
     */
    public function setTransferRequest(Sao_Shared_Application_Transfer_Request $transferRequest)
    {
        $this->transferRequest = $transferRequest;

        $this->populateParameters();

        return $this;
    }

    /**
     * @return Sao_Shared_Application_Transfer_Request|null
     */
    public function getTransferRequest()
    {
        return $this->transferRequest;
    }

    /**
     * @return void
     */
    abstract protected function populateParameters();
}
