<?php
use Guzzle\Http\Message\Header\HeaderInterface;

/**
 * @author René Klatt <rene.klatt@project-a.com>
 */
class Sao_Shared_Library_Legacy_Guzzle_Service_Command_Response_BlockArtwork
    extends Sao_Shared_Library_Legacy_Guzzle_Service_Command_Response_Json
{

    /**
     * @see Sao_Shared_Library_Legacy_Guzzle_Service_Command_Response_Abstract::createTransferResponse
     */
    public function createTransferResponse()
    {
        $responseData = $this->getParsedResponse();
        $response = Generated_Shared_Library_TransferLoader::getResponseLegacy();

        $messages = Generated_Shared_Library_TransferLoader::getResponseMessageCollection();
        if (isset($responseData['message'])) {
            $messages->add(new Sao_Shared_Application_Transfer_Response_Message(array('message' => $responseData['message'])));
        }
        if (isset($responseData['messages'])) {
            foreach ($responseData['messages'] as $message) {
                $messages->add(Generated_Shared_Library_TransferLoader::getResponseMessage(array('message' => $message)));
            }
        }
        $response->setMessages($messages);

        if ($responseData['success']) {
            /* @var $transfer Sao_Shared_Legacy_Transfer_Block_Artwork */
            $transfer = $this->getTransferRequest()->getTransfer();
            $response->setTransfer($transfer);
            $response->setSuccess(true);
        } else {
            $response->setSuccess(false);
        }
        $this->transferResponse = $response;

        return;
    }

}
