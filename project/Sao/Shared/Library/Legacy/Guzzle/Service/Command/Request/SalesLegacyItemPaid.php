<?php

/**
 * Class Sao_Shared_Library_Legacy_Guzzle_Service_Command_Request_SalesLegacyItemPaid
 *
 * @author René Klatt
 */
class Sao_Shared_Library_Legacy_Guzzle_Service_Command_Request_SalesLegacyItemPaid
    extends Sao_Shared_Library_Legacy_Guzzle_Service_Command_Request_Abstract
{
    /**
     * @see Sao_Shared_Library_Legacy_Guzzle_Service_Command_Request_Abstract::populateParameters
     */
    protected function populateParameters()
    {
        /* @var $transfer Sao_Shared_Sales_Transfer_Order_Item_Legacy */
        $transfer = $this->getTransferRequest()->getTransfer();
        $dateTime = new DateTime($transfer->getCreatedAt());
        $this->add('timestamp', $dateTime->format('Y-m-dTH:i:s'));
        $this->add('order_id', $transfer->getFkSalesOrder());
        $this->add('order_item_id', $transfer->getIdSalesOrderItem());
        $this->add('sku', $transfer->getSku());
        $this->add('seller_user_id', $transfer->getFkCustomer());
        $this->add('user_art_id', $transfer->getUserArtId());
        $this->add('quantity', $transfer->getQuantity());
        $this->add('impression', $transfer->getEditionIdentifier());

        //additional params requested with this story #52375337
        $this->add('art_unit_price', $transfer->getGrossPrice());
        $this->add('art_unit_cost', $transfer->getArtistCost());
        $this->add('discount', $transfer->getArtDiscounts());

        return;
    }
}
