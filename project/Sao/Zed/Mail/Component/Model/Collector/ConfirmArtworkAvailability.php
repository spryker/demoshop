<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 * @version $Id$
 * @property Sao_Zed_Catalog_Component_Facade $facadeCatalog
 */
class Sao_Zed_Mail_Component_Model_Collector_ConfirmArtworkAvailability extends Sao_Zed_Mail_Component_Model_Collector
{

    /**
     * @var Sao_Shared_Mail_Transfer_OrderConfirmation
     */
    protected $mailTransfer;

    /**
     * @return string
     */
    protected function getMailType()
    {
        return self::CONFIRM_ARTWORK_AVAILABILTY;
    }

    /**
     * @return string
     */
    protected function getMailSubType()
    {
        return self::MAIL_TYPE_ARTIST;
    }

    /**
     * @return Sao_Shared_Mail_Transfer_ConfirmArtworkAvailability
     */
    protected function createMailTransfer()
    {
        return Generated_Shared_Library_TransferLoader::getMailConfirmArtworkAvailability();
    }

    /**
     * @param BaseObject $orderItemEntity - ProjectA_Zed_Sales_Persistence_PacSalesOrderItem
     * @param null $context
     * @return mixed|Sao_Shared_Mail_Transfer_ConfirmArtworkAvailability
     */
    public function getMailTransfer(BaseObject $orderItemEntity, $context = null)
    {
        /* @var $orderItemEntity ProjectA_Zed_Sales_Persistence_PacSalesOrderItem */
        $saoSalesOrderItem = $orderItemEntity->getSaoSalesOrderItem();
        $shippingPickup = $saoSalesOrderItem->getShippingPickup();
        $orderEntity = $orderItemEntity->getOrder();
        $profileName = $saoSalesOrderItem->getFirstName() . ' ' . $saoSalesOrderItem->getLastName();

        $placeholderData = array(
            'profileName' => $profileName,
            'pickupDate' => $shippingPickup->getDate(),
            'pickupReadyTime' => $shippingPickup->getReadyTime('H:i'),
            'pickupCloseTime' => $shippingPickup->getCloseTime('H:i')
        );
        $this->mailTransfer->setSubject($this->getSubject($placeholderData));
        $this->mailTransfer->setOrderId($orderEntity->getIdSalesOrder());
        $this->mailTransfer->setId($orderItemEntity->getIdSalesOrderItem());
        $this->mailTransfer->setRecipientAddress($saoSalesOrderItem->getEmail());
        $this->addPlaceholders($placeholderData);
        return $this->mailTransfer;
    }

}
