<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 */
class Sao_Zed_Sales_Component_Model_Communication_Webservice_ItemPaid extends Sao_Zed_Sales_Component_Model_Communication_Webservice_Abstract implements
    Sao_Shared_Library_Catalog_Interface_ProductSetConstant,
    Sao_Zed_Fulfillment_Component_Dependency_Facade_Interface
{
    use Sao_Zed_Fulfillment_Component_Dependency_Facade_Trait;

    /**
     * @return Sao_Shared_Legacy_Transfer_Response_Legacy
     */
    public function send()
    {
        $request = $this->getLegacyRequest();
        /* @var Sao_Shared_Legacy_Transfer_Response_Legacy $transferResponse */
        $transferResponse = $request->request(
            'legacy/webservice/sale',
            $this->getTransferSalesOrderItemLegacy($this->orderItemEntity)
        );
        return $transferResponse;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return Sao_Shared_Sales_Transfer_Order_Item_Legacy
     */
    protected function getTransferSalesOrderItemLegacy(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        $transferSalesOrderItemLegacy = Generated_Shared_Library_TransferLoader::getSalesOrderItemLegacy();
        $product = $this->getProductBySku($orderItemEntity);
        $transferSalesOrderItemLegacy->setFkCustomer($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ARTIST_USER_ID]);
        $transferSalesOrderItemLegacy->setUserArtId($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_USER_ART_ID]);
        $transferSalesOrderItemLegacy->setFkSalesOrder($orderItemEntity->getFkSalesOrder());
        $transferSalesOrderItemLegacy->setIdSalesOrderItem($orderItemEntity->getIdSalesOrderItem());
        $transferSalesOrderItemLegacy->setQuantity(1);
        $transferSalesOrderItemLegacy->setCreatedAt($orderItemEntity->getCreatedAt());
        $transferSalesOrderItemLegacy->setSku($orderItemEntity->getSku());
        $transferSalesOrderItemLegacy->setGrossPrice($orderItemEntity->getGrossPrice());
        $transferSalesOrderItemLegacy->setPriceToPay($orderItemEntity->getPriceToPay());
        $transferSalesOrderItemLegacy->setArtDiscounts($this->getArtDiscounts($orderItemEntity));
        $transferSalesOrderItemLegacy->setArtistCost(
            $this->getArtistCost($product, $orderItemEntity)
        );
        return $transferSalesOrderItemLegacy;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return array
     */
    protected function getArtDiscounts(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        $artDiscounts = [];
        $discountCollection = $orderItemEntity->getDiscounts();

        /** @var $discountEntity ProjectA_Zed_Sales_Persistence_PacSalesDiscount */
        foreach ($discountCollection as $discountEntity) {
            $saoDiscountEntity = $discountEntity->getSalesDiscount();
            $discountSum = $discountEntity->getAmount();

            $type = 'standard';
            if ($discountSum == $saoDiscountEntity->getArtistAmount()) {
                $type = 'artist';
            } elseif ($discountSum == $saoDiscountEntity->getSaatchiAmount()) {
                $type = 'saatchi';
            }

            $artDiscounts[] = [
                'art_discount_unit_amount' => $discountSum,
                'art_discount_share' => $type
            ];
        }

        return $artDiscounts;
    }

    /**
     * @param ProjectA_Zed_Catalog_Component_Interface_Product $product
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return string
     */
    protected function getArtistCost(ProjectA_Zed_Catalog_Component_Interface_Product $product, ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        $productSet = $product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_PRODUCT_SET];
        if ($productSet == self::PRODUCT_SET_MARKETPLACE) {
            $printProviderArtistCost = 0;
        } else {
            $printProviderArtistCost = $this->getFulfillmentArtistCost($orderItemEntity);
        }
        return $printProviderArtistCost;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return int
     */
    protected function getFulfillmentArtistCost(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        $emptyTransferSalesOrderItem = Generated_Shared_Library_TransferLoader::getSalesOrderItem();
        $transferSalesOrderItem = ProjectA_Zed_Library_Copy::entityToTransfer(
            $emptyTransferSalesOrderItem,
            $orderItemEntity,
            Sao_Shared_Application_Transfer_EnrichmentRules::ORDER_ITEM
        );
        $fulfillmentCenterProduct =
            $this->facadeFulfillment->getFulfillmentCenterProductByItem($transferSalesOrderItem);

        return $fulfillmentCenterProduct->getArtistCost();
    }
}
