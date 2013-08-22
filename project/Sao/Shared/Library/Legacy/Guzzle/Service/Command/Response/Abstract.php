<?php

/**
 * Class Sao_Shared_Library_Legacy_Guzzle_Service_Command_Response_Abstract
 *
 * @author Stefan Sorge
 */

abstract class Sao_Shared_Library_Legacy_Guzzle_Service_Command_Response_Abstract
    implements Guzzle\Service\Command\ResponseClassInterface
{
    /**
     * @var Sao_Shared_Application_Transfer_Request
     */
    protected $transferRequest;

    /**
     * @var Guzzle\Http\Message\Response
     */
    protected $response;

    /**
     * @var array
     */
    protected $responseData;

    /**
     * @var Sao_Shared_Application_Transfer_Response
     */
    protected $transferResponse;

    /**
     * @param Guzzle\Service\Command\OperationCommand $command
     *
     * @return Sao_Shared_Library_Legacy_Guzzle_Service_Command_Response_Abstract
     *
     * @throws Exception
     *
     * @see Guzzle\Service\Command\ResponseClassInterface::fromCommand
     */
    /* abstract */
    static public function fromCommand(Guzzle\Service\Command\OperationCommand $command)
    {
        throw new Exception('/* abstract */ static public function fromCommand(Guzzle\Service\Command\OperationCommand $command)');
    }

    /**
     * @param Sao_Shared_Application_Transfer_Request $transferRequest
     *
     * @return self
     */
    public function setTransferRequest(Sao_Shared_Application_Transfer_Request $transferRequest)
    {
        $this->transferRequest = $transferRequest;

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
     * @param Guzzle\Http\Message\Response $response
     *
     * @return self
     */
    public function setResponse(Guzzle\Http\Message\Response $response)
    {
        $this->response = $response;

        $this->parseResponse();

        $this->createTransferResponse();

        return $this;
    }

    /**
     * @return Guzzle\Http\Message\Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return void
     */
    public function parseResponse()
    {
    }

    /**
     * @return array
     */
    public function getParsedResponse()
    {
        return $this->responseData;
    }

    /**
     * @return void
     *
     * @throws Exception
     * @abstract
     */
    /* abstract */
    public function createTransferResponse()
    {
        throw new Exception('/* abstract */ public function createTransferResponse()');
    }

    /**
     * @return Sao_Shared_Application_Transfer_Response
     */
    public function getTransferResponse()
    {
        return $this->transferResponse;
    }
}
