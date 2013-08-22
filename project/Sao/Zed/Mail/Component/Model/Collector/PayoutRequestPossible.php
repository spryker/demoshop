<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 * @version $Id$
 * @property Sao_Zed_Catalog_Component_Facade $facadeCatalog
 */
class Sao_Zed_Mail_Component_Model_Collector_PayoutRequestPossible extends Sao_Zed_Mail_Component_Model_Collector
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
        return self::PAYOUT_REQUEST_POSSIBLE;
    }

    /**
     * @return string
     */
    protected function getMailSubType()
    {
        return self::MAIL_TYPE_ARTIST;
    }

    /**
     * @return ProjectA_Shared_Mail_Transfer_Mail|Sao_Shared_Mail_Transfer_PayoutRequestPossible
     */
    protected function createMailTransfer()
    {
        return Generated_Shared_Library_TransferLoader::getMailPayoutRequestPossible();
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

        $accountUrl = ProjectA_Shared_Library_Config::get('url')->legacy;
        $accountUrl .= '/accounts/items';

        $profileName = $product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ARTIST_FIRST_NAME]
            . ' ' . $product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ARTIST_LAST_NAME];

        $placeholderData = array(
            'increment_id'   => $orderEntity->getIncrementId(),
            'artTitle' => $product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_NAME],
            'profileName' => $profileName,
            'accountUrl' => $accountUrl,
            'productType' => $this->getProductType($product)
        );

        $this->mailTransfer->setSubject($this->getSubject($placeholderData));
        $this->mailTransfer->setOrderId($orderEntity->getIdSalesOrder());
        $this->mailTransfer->setId($orderItemEntity->getIdSalesOrderItem());
        $this->mailTransfer->setRecipientAddress($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ARTIST_EMAIL]);
        $this->addPlaceholders($placeholderData);
        return $this->mailTransfer;
    }

    /**
     * @param $product
     * @return string
     */
    protected function getProductType($product)
    {
        if ($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_PRODUCT_SET] === Sao_Zed_ArtistPortal_Component_Interface_ProductValueConstant::SET_MANUFACTURE) {
            return 'Print';
        } else {
            return 'Original';
        }
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
