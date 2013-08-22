<?php

/**
 * Class Sao_Shared_Library_Legacy_Guzzle_Service_Command_Response_CustomerLegacyProfile
 *
 * @author Stefan Sorge
 */
class Sao_Shared_Library_Legacy_Guzzle_Service_Command_Response_CustomerLegacyProfile
    extends Sao_Shared_Library_Legacy_Guzzle_Service_Command_Response_Json
{

    /**
     * @see Sao_Shared_Library_Legacy_Guzzle_Service_Command_Response_Abstract::createTransferResponse
     */
    public function createTransferResponse()
    {
        $responseData = $this->getParsedResponse();

        // @todo Fix legacy response to pass at least a minimum valueable structure
        if (empty($responseData) || !is_array($responseData)) {
            $responseData = array('success' => false);
        } else {
            $responseData['success'] = true;
        }

        if ($responseData['success']) {

            // $response = Generated_Shared_Library_TransferLoader::getResponseLegacy();
            $response = new Sao_Shared_Legacy_Transfer_Response_Legacy();
            $response->setSuccess(true);

            /** @var $transfer Sao_Shared_Customer_Transfer_Legacy */
            $transfer = $this->getTransferRequest()->getTransfer();

            $transfer->setUserId($responseData['user_id']);
            $transfer->setFirstName($responseData['first_name']);
            $transfer->setLastName($responseData['last_name']);
            $transfer->setEmail($responseData['email']);

            $response->setTransfer($transfer);

        } else {

            $response = Generated_Shared_Library_TransferLoader::getResponseLegacy();
            $response->setSuccess(false);
        }

        $this->transferResponse = $response;

        return;
    }
}
