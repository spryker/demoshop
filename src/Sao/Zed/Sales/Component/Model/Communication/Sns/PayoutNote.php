<?php

class Sao_Zed_Sales_Component_Model_Communication_Sns_PayoutNote implements
    ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Sales_Component_Dependency_Facade_Interface,
    Sao_Zed_Aws_Component_Dependency_Facade_Interface,
    Sao_Zed_Fulfillment_Component_Dependency_Facade_Interface,
    Sao_Shared_Catalog_Interface_ProductSetConstant
{
    use ProjectA_Zed_Catalog_Component_Dependency_Facade_Trait;
    use Sao_Zed_Aws_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Sales_Component_Dependency_Facade_Trait;
    use Sao_Zed_Fulfillment_Component_Dependency_Facade_Trait;

    /** @var  $entity ProjectA_Zed_Sales_Persistence_PacSalesOrderItem */
    protected $entity;

    /**
     * @return string
     */
    protected function getMessage()
    {
        assert($this->entity instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrderItem);

        $productEntity = $this->facadeCatalog->getProductBySku($this->entity->getSku());
        $productModel = $this->facadeCatalog->getProduct($productEntity);

        $object = new stdClass();

        $object->event = 'order:item:complete';
        $object->timestamp = $this->entity->getCreatedAt(DateTime::ISO8601);
        $object->order_id = $this->entity->getFkSalesOrder();
        $object->order_item_id = $this->entity->getIdSalesOrderItem();
        $object->sku = $this->entity->getSku();
        $object->buyer_user_id = $this->entity->getOrder()->getSaoOrder()->getUserId();
        $object->seller_user_id = $productModel[Sao_Shared_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ARTIST_USER_ID];
        $object->quantity = 1;

        $object->art_unit_price = $this->entity->getGrossPrice();
        $object->art_unit_cost = $this->getArtistCost($productEntity, $this->entity);
        $object->discount = $this->getDiscounts();
        $object->user_art_id = $productModel[Sao_Shared_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_USER_ART_ID];

        return json_encode($object);
    }

    protected function getDiscounts()
    {
        $array = [];

        $discountCollection = $this->entity->getDiscounts();

        /** @var $discountEntity ProjectA_Zed_Sales_Persistence_PacSalesDiscount */
        foreach ($discountCollection as $discountEntity) {
            $discount = [];

            $saoDiscountEntity = $discountEntity->getSalesDiscount();
            $discountSum = $discountEntity->getAmount();

            $type = 'standard';
            if ($discountSum == $saoDiscountEntity->getArtistAmount()) {
                $type = 'artist';
            } elseif ($discountSum == $saoDiscountEntity->getSaatchiAmount()) {
                $type = 'saatchi';
            }

            $discount["art_discount_unit_amount"] = $discountSum;
            $discount["art_discount_share"] = $type;

            $array[] = $discount;
        }

        return $array;
    }

    /**
     * @param ProjectA_Zed_Catalog_Persistence_PacCatalogProduct $product
     * @return null|string
     */
    protected function getProductType(ProjectA_Zed_Catalog_Persistence_PacCatalogProduct $product)
    {
        $productType = $this->facadeCatalog->getProductAttributeValue(
            $product,
            Sao_Shared_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_PRODUCT_SET
        );
        return $productType;
    }

    /**
     * @param ProjectA_Zed_Catalog_Persistence_PacCatalogProduct $product
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return string
     */
    protected function getArtistCost(
        ProjectA_Zed_Catalog_Persistence_PacCatalogProduct $product,
        ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
    ) {
        $productSet = $this->getProductType($product);
        if ($productSet == self::PRODUCT_SET_MARKETPLACE) {
            $printProviderArtistCost = 0;
        } else {
            $printProviderArtistCost = $this->getFulfillmentArtistCost($orderItemEntity);
        }
        return $printProviderArtistCost;
    }

    protected function getFulfillmentArtistCost(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        $emptyTransferSalesOrderItem = Generated\Shared\Library\TransferLoader::getSalesOrderItem();
        $transferSalesOrderItem = ProjectA_Zed_Library_Copy::entityToTransfer(
            $emptyTransferSalesOrderItem,
            $orderItemEntity,
            Sao_Shared_Application_Transfer_EnrichmentRules::ORDER_ITEM
        );
        $fulfillmentCenterProduct =
            $this->facadeFulfillment->getFulfillmentCenterProductByItem($transferSalesOrderItem);

        return $fulfillmentCenterProduct->getArtistCost();
    }

    /**
     * @return string
     */
    protected function getTopic()
    {
        return 'payout';
    }

    /**
     * @return null
     */
    protected function getSubject()
    {
        return null;
    }


    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $entity
     * @return string
     */
    public function send(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $entity)
    {
        $this->entity = $entity;

        $subject = $this->getSubject();
        $message = $this->getMessage();
        $topic = $this->getTopic();

        return $this->facadeAws->publishSnsMessage($topic, $message, $subject);
    }
}
