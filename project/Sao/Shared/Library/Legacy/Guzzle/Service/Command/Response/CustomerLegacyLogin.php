<?php
use Guzzle\Http\Message\Header\HeaderInterface;

/**
 * Class Sao_Shared_Library_Legacy_Guzzle_Service_Command_Response_CustomerLegacyLogin
 *
 * @author Stefan Sorge
 */
class Sao_Shared_Library_Legacy_Guzzle_Service_Command_Response_CustomerLegacyLogin
    extends Sao_Shared_Library_Legacy_Guzzle_Service_Command_Response_Json
{

    /**
     * @see Sao_Shared_Library_Legacy_Guzzle_Service_Command_Response_Abstract::createTransferResponse
     */
    public function createTransferResponse()
    {
        $responseData = $this->getParsedResponse();

        if (isset($responseData['success']) && isset($responseData['user_id']) && $responseData['success']) {

            // $response = Generated_Shared_Library_TransferLoader::getResponseLegacy();
            $response = new Sao_Shared_Legacy_Transfer_Response_Legacy();
            $response->setSuccess(true);

            $cookies = $this->getResponse()->getHeader('Set-Cookie');
            $cookies = $cookies instanceof HeaderInterface ? $cookies->toArray() : [];
            $response->setCookies($cookies);

            if (isset($responseData['redirectUrl'])) {
                $response->setRedirectUrl($responseData['redirectUrl']);
            }

            $messages = new Sao_Shared_Application_Transfer_Response_Message_Collection();
            if (isset($responseData['message'])) {
                $messages->add(new Sao_Shared_Application_Transfer_Response_Message(array('message' => $responseData['message'])));
            }
            if (isset($responseData['messages'])) {
                foreach ($responseData['messages'] as $message) {
                    $messages->add(new Sao_Shared_Application_Transfer_Response_Message(array('message' => $message)));
                }
            }
            $response->setMessages($messages);

            /** @var $transfer Sao_Shared_Customer_Transfer_Legacy */
            $transfer = $this->getTransferRequest()->getTransfer();
            $transfer->setUserId($responseData['user_id']);
            $response->setTransfer($transfer);

        } else {

            $response = Generated_Shared_Library_TransferLoader::getResponseLegacy();
            $response->setSuccess(false);

            $cookies = $this->getResponse()->getHeader('Set-Cookie');
            $cookies = $cookies instanceof HeaderInterface ? $cookies->toArray() : [];
            $response->setCookies($cookies);

            $messages = new Sao_Shared_Application_Transfer_Response_Message_Collection();
            if (isset($responseData['message'])) {
                $messages->add(new Sao_Shared_Application_Transfer_Response_Message(array('message' => $responseData['message'])));
            }
            if (isset($responseData['messages'])) {
                foreach ($responseData['messages'] as $message) {
                    $messages->add(new Sao_Shared_Application_Transfer_Response_Message(array('message' => $message)));
                }
            }
            $response->setMessages($messages);

        }

        $this->transferResponse = $response;

        return;
    }
}
