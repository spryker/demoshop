<?php

/**
 * Class Sao_Shared_Library_Legacy_Guzzle_Service_Command_Request_SalesLegacyItemPaid
 * @author Daniel Tschinder
 */
class Sao_Shared_Library_Legacy_Guzzle_Service_Command_Request_SalesLegacyItemCanceled extends Sao_Shared_Library_Legacy_Guzzle_Service_Command_Request_Abstract
{
    /**
     * @see Sao_Shared_Library_Legacy_Guzzle_Service_Command_Request_Abstract::populateParameters
     */
    protected function populateParameters()
    {
        /* @var $transfer Sao_Shared_Sales_Transfer_Order_Item_Legacy */
        $transfer = $this->getTransferRequest()->getTransfer();
        $this->add('id', $transfer->getFkArtistSales());
    }
}
