<?php

/**
 * Class Sao_Shared_Library_Legacy_Guzzle_Service_Command_Request_CustomerLegacyLogin
 *
 * @author Stefan Sorge
 */
class Sao_Shared_Library_Legacy_Guzzle_Service_Command_Request_CustomerLegacyFacebookLogin
    extends Sao_Shared_Library_Legacy_Guzzle_Service_Command_Request_Abstract
{

    /**
     * @see Sao_Shared_Library_Legacy_Guzzle_Service_Command_Request_Abstract::populateParameters
     */
    protected function populateParameters()
    {
        /** @var $transfer Sao_Shared_Customer_Transfer_Legacy */
        $transfer = $this->getTransferRequest()->getTransfer();
        $this->add('code', $transfer->getFacebookCode());
        $this->add('redirectUri', $transfer->getRedirectUri());
        return;
    }

}
