<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 * @version $Id$
 * @property Sao_Zed_Catalog_Component_Facade $facadeCatalog
 */
class Sao_Zed_Mail_Component_Model_Collector_PrintFileCheckFailure extends Sao_Zed_Mail_Component_Model_Collector
    implements ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Catalog_Component_Dependency_Facade_Trait;

    /**
     * @var Sao_Shared_Mail_Transfer_OrderConfirmation
     */
    protected $mailTransfer;

    /**
     * @return string
     */
    protected function getMailType()
    {
        return self::PRINT_FILE_CHECK_FAILURE;
    }

    /**
     * @return string
     */
    protected function getMailSubType()
    {
        return self::MAIL_TYPE_ARTIST;
    }

    /**
     * @return ProjectA_Shared_Mail_Transfer_Mail|Sao_Shared_Mail_Transfer_PrintFileCheckFailure
     */
    protected function createMailTransfer()
    {
        return Generated_Shared_Library_TransferLoader::getMailPrintFileCheckFailure();
    }

    /**
     * @param BaseObject $orderItemEntity - ProjectA_Zed_Sales_Persistence_PacSalesOrderItem
     * @param null $context
     * @return mixed|Sao_Shared_Mail_Transfer_OrderConfirmation
     */
    public function getMailTransfer(BaseObject $orderItemEntity, $context = null)
    {
        /* @var $orderItemEntity ProjectA_Zed_Sales_Persistence_PacSalesOrderItem */
        $product = $this->getProductByEntity($orderItemEntity);
        $orderEntity = $orderItemEntity->getOrder();

        $url = ProjectA_Shared_Library_Config::get('host')->legacy;
        $url .= '/upload/edit/art/';
        $url .= $product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_PRODUCT_ID];
        $url .= '/artist/';
        $url .= $product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ARTIST_USER_ID];

        $profileName = $product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ARTIST_FIRST_NAME]
            . ' ' . $product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ARTIST_LAST_NAME];

        $placeholderData = array(
            'increment_id'   => $orderEntity->getIncrementId(), //don`t remove increment_id here, will be used by subject render
            'profileName' => $profileName,
            'url' => $url
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
