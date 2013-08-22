<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 */
class Sao_Shared_Library_Legacy_Guzzle_Service_Command_Request_BlockArtist
    extends Sao_Shared_Library_Legacy_Guzzle_Service_Command_Request_Abstract
{

    /**
     * @see Sao_Shared_Library_Legacy_Guzzle_Service_Command_Request_Abstract::populateParameters
     */
    protected function populateParameters()
    {
        /* @var $transfer Sao_Shared_Legacy_Transfer_Block_Artist */
        $transfer = $this->getTransferRequest()->getTransfer();
        $this->add('user_id', $transfer->getUserId());
        return;
    }
}
