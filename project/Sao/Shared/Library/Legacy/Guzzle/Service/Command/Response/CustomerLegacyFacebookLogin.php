<?php
use Guzzle\Http\Message\Header\HeaderInterface;

/**
 * Class Sao_Shared_Library_Legacy_Guzzle_Service_Command_Response_CustomerLegacyLogin
 *
 * @author Stefan Sorge
 */
class Sao_Shared_Library_Legacy_Guzzle_Service_Command_Response_CustomerLegacyFacebookLogin
    extends Sao_Shared_Library_Legacy_Guzzle_Service_Command_Response_Json
{

    /**
     * @see Sao_Shared_Library_Legacy_Guzzle_Service_Command_Response_Abstract::createTransferResponse
     */
    public function createTransferResponse()
    {
        $responseData = $this->getParsedResponse();
        $response = Generated_Shared_Library_TransferLoader::getResponseLegacy();

        $cookies = $this->getResponse()->getHeader('Set-Cookie');
        $cookies = $cookies instanceof HeaderInterface ? $cookies->toArray() : [];
        $response->setCookies($cookies);

        if (isset($responseData['redirectUrl'])) {
            $response->setRedirectUrl($responseData['redirectUrl']);
        }
        $messages = Generated_Shared_Library_TransferLoader::getResponseMessageCollection();
        if (isset($responseData['message'])) {
            $messages->add(new Sao_Shared_Application_Transfer_Response_Message(array('message' => $responseData['message'])));
        }
        if (isset($responseData['messages'])) {
            foreach($responseData['messages'] as $message) {
                $messages->add(Generated_Shared_Library_TransferLoader::getResponseMessage(array('message' => $message)));
            }
        }
        $response->setMessages($messages);

        if ($responseData['success']) {
            /* @var $transfer Sao_Shared_Customer_Transfer_Legacy */
            $transfer = $this->getTransferRequest()->getTransfer();
            $transfer->setUserId($responseData['user_id']);
            $response->setTransfer($transfer);
            $response->setSuccess(true);
        } else {
            $response->setSuccess(false);
        }
        $this->transferResponse = $response;

        return;
    }
}
