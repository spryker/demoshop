<?php

use Guzzle\Service\Command\ResponseClassInterface;

/**
 * Class Sao_Shared_Library_Legacy_Guzzle_Service_Command_Response_Json
 *
 * @author     Stefan Sorge
 */

abstract class Sao_Shared_Library_Legacy_Guzzle_Service_Command_Response_Json
    extends Sao_Shared_Library_Legacy_Guzzle_Service_Command_Response_Abstract
{
    /**
     * @const string
     */
    const CONTENT_TYPE_APPLICATIONJSON = 'application/json';

    /**
     * @param Guzzle\Service\Command\OperationCommand $command
     *
     * @return Sao_Shared_Library_Legacy_Guzzle_Service_Command_Response_Json
     *
     * @throws Exception
     *
     * @see Guzzle\Service\Command\ResponseClassInterface::fromCommand
     */
    static public function fromCommand(Guzzle\Service\Command\OperationCommand $command)
    {
        $class = get_called_class();

        /** @var Sao_Shared_Library_Legacy_Guzzle_Service_Command_Response_Json $instance */
        $instance = new $class();

        $instance->setTransferRequest($command->getTransferRequest());
        $instance->setResponse($command->getResponse());

        return $instance;
    }

    /**
     * @return void
     *
     * @throws Exception
     */
    public function parseResponse()
    {
        if ($this->response->getContentType() != static::CONTENT_TYPE_APPLICATIONJSON) {
            throw new Exception(
                'Expected content-type application/json in response, but got ' . $this->response->getContentType());
        }

        $this->responseData = json_decode($this->response->getBody(true), true);

        return;
    }

}
