<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 */
class Sao_Shared_Library_Legacy_Guzzle_Service_Command_Request_BlockArtwork
    extends Sao_Shared_Library_Legacy_Guzzle_Service_Command_Request_Abstract
{

    /**
     * @see Sao_Shared_Library_Legacy_Guzzle_Service_Command_Request_Abstract::populateParameters
     */
    protected function populateParameters()
    {
        /** @var $transfer Sao_Shared_Legacy_Transfer_Block_Artwork */
        $transfer = $this->getTransferRequest()->getTransfer();
        $this->add('sku', $transfer->getSku());
        $this->add('availability', $transfer->getAvailability());
        return;
    }

}
