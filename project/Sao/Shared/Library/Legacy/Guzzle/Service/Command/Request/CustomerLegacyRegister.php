<?php

/**
 * Class Sao_Shared_Library_Legacy_Guzzle_Service_Command_Request_CustomerLegacyRegister
 *
 * @author Stefan Sorge
 */
class Sao_Shared_Library_Legacy_Guzzle_Service_Command_Request_CustomerLegacyRegister
    extends Sao_Shared_Library_Legacy_Guzzle_Service_Command_Request_Abstract
{
    /**
     * @see Sao_Shared_Library_Legacy_Guzzle_Service_Command_Request_Abstract::populateParameters
     */
    protected function populateParameters()
    {
        /** @var $transfer Sao_Shared_Customer_Transfer_Legacy */
        $transfer = $this->getTransferRequest()->getTransfer();
        $this->add('email', $transfer->getEmail());
        if ($transfer->getPassword()) {
            $this->add('password', $transfer->getPassword());
            $this->add('password_compare', $this->get('password'));
        }
        if ($transfer->getFirstName()) {
            $this->add('first_name', $transfer->getFirstName());
        }
        if ($transfer->getLastName()) {
            $this->add('last_name', $transfer->getLastName());
        }
        return;
    }
}
