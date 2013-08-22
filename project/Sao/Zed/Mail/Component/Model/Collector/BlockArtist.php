<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 * @version $Id$
 * @property Sao_Zed_Catalog_Component_Facade $facadeCatalog
 */
class Sao_Zed_Mail_Component_Model_Collector_BlockArtist extends Sao_Zed_Mail_Component_Model_Collector
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
        return self::BLOCK_ARTIST;
    }

    /**
     * @return string
     */
    protected function getMailSubType()
    {
        return self::MAIL_TYPE_ARTIST;
    }

    /**
     * @return ProjectA_Shared_Mail_Transfer_Mail|Sao_Shared_Mail_Transfer_BlockArtist
     */
    protected function createMailTransfer()
    {
        return Generated_Shared_Library_TransferLoader::getMailBlockArtist();
    }

    /**
     * @param BaseObject $orderItemEntity - ProjectA_Zed_Sales_Persistence_PacSalesOrder
     * @param null $context
     * @return mixed|Sao_Shared_Mail_Transfer_OrderConfirmation
     */
    public function getMailTransfer(BaseObject $orderItemEntity, $context = null)
    {
        $product = $this->getProductByEntity($orderItemEntity);
        /* @var $orderItemEntity ProjectA_Zed_Sales_Persistence_PacSalesOrderItem */
        $orderEntity = $orderItemEntity->getOrder();

        $profileName = $product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ARTIST_FIRST_NAME]
            . ' ' . $product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ARTIST_LAST_NAME];

        /* @var $orderEntity ProjectA_Zed_Sales_Persistence_PacSalesOrder */
        $placeholderData = array(
            'profileName' => $profileName
        );

        $this->mailTransfer->setSubject($this->getSubject($placeholderData));
        $this->mailTransfer->setOrderId($orderEntity->getIdSalesOrder());
        $this->mailTransfer->setId($orderItemEntity->getIdSalesOrderItem());
        $this->mailTransfer->setRecipientAddress($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ARTIST_EMAIL]);
        $this->addPlaceholders($placeholderData);
        return $this->mailTransfer;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return ProjectA_Zed_Catalog_Persistence_PacCatalogProduct|null
     */
    protected function getProductByEntity(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        $product = $this->facadeCatalog->getProductBySku($orderItemEntity->getSku());
        return $this->facadeCatalog->getProduct($product);
    }

}
