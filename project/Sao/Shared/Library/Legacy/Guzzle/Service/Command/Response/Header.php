<?php

class Sao_Shared_Library_Legacy_Guzzle_Service_Command_Response_Header
    extends Sao_Shared_Library_Legacy_Guzzle_Service_Command_Response_Json
{

    /**
     * @see Sao_Shared_Library_Legacy_Guzzle_Service_Command_Response_Abstract::createTransferResponse
     */
    public function createTransferResponse()
    {
        $responseData = $this->getParsedResponse();
        $response = Generated_Shared_Library_TransferLoader::getResponseLegacy();
        if ($responseData) {
            $message = serialize($responseData);
            $response->addMessage(Generated_Shared_Library_TransferLoader::getResponseMessage()->setMessage($message));
            $response->setSuccess(true);
        }

        $this->transferResponse = $response;
        return;
    }
}