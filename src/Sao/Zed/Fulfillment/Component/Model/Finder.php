<?php

/**
 * Class Sao_Zed_Fulfillment_Component_Model_Finder
 *
 * @property Sao_Zed_Sales_Component_Facade $facadeSales
 */
class Sao_Zed_Fulfillment_Component_Model_Finder implements
    ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Sales_Component_Dependency_Facade_Interface,
    Sao_Shared_Catalog_Interface_ProductAttributeConstant
{

    use ProjectA_Zed_Catalog_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Sales_Component_Dependency_Facade_Trait;

    /**
     * @param string $legacyProductId
     * @return Sao_Zed_Fulfillment_Persistence_FulfillmentProvider|null
     */
    public function getFulfillmentProviderForPrintProduct($legacyProductId)
    {
        $printProduct = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery::create()->findOneByLegacyProductId($legacyProductId);
        if ($printProduct) {
            return $printProduct->getFulfillmentProvider();
        }
    }

    /**
     * @param string $sku
     * @return string
     */
    public function getFulfillmentProviderNameBySku($sku)
    {
        $product = $this->getProductBySku($sku);

        if ($this->isOriginal($product)) {
            return Sao_Zed_Fulfillment_Component_Model_Sba_Api::PROVIDER_NAME;
        }

        $legacyProductId = $product[self::ATTRIBUTE_PRODUCT_ID];
        $printProvider = $this->getFulfillmentProviderForPrintProduct($legacyProductId);
        return $printProvider->getShortName();
    }

    /**
     * @param ProjectA_Zed_Catalog_Component_Interface_Product $product
     * @return bool
     */
    protected function isOriginal(ProjectA_Zed_Catalog_Component_Interface_Product $product)
    {
        return $product[self::ATTRIBUTE_PRODUCT_CATEGORY] == 'original';
    }

    /**
     * @param Traversable $items
     * @return ProjectA_Zed_Catalog_Component_Interface_ProductCollection
     */
    public function getProductCollectionByOrderItems(Traversable $items)
    {
        $skus = [];
        /* @var $item Sao_Shared_Sales_Transfer_Order_Item */
        foreach ($items as $item) {
            $skus[] = $item->getSku();
        }

        $productEntities = $this->getProductsBySku($skus);
        $productCollection = $this->getNewProductCollection();
        $productCollection->addProductEntities($productEntities);

        return $productCollection;
    }

    /**
     * @param array $skus
     * @return ProjectA_Zed_Library_Propel_LazyCollection
     */
    public function getProductsBySku(array $skus)
    {
        return $this->facadeCatalog->getProductsBySku($skus);
    }

    /**
     * @return ProjectA_Zed_Catalog_Component_Interface_ProductCollection
     */
    public function getNewProductCollection()
    {
        return $this->facadeCatalog->getProductCollection(false);
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Item $item
     * @return Sao_Zed_Fulfillment_Persistence_FulfillmentPrintProduct
     * @throws ErrorException
     */
    public function getFulfillmentCenterProductByItem(Sao_Shared_Sales_Transfer_Order_Item $item)
    {
        $product = $this->getProductBySku($item->getSku());
        $legacyProductId = $product[self::ATTRIBUTE_PRODUCT_ID];
        $options = $item->getOptions();

        $frameOption = null;
        /* @var Sao_Shared_Sales_Transfer_Order_Item_Option $option */
        foreach ($options as $option) {
            // TODO later we should save the option type in the sales component
            $catalogOption = $this->facadeCatalog->getProductOptionByIdentifier($option->getIdentifier());
            if (!empty($catalogOption) && $catalogOption->getOptionType()->getName() == ProjectA_Shared_Catalog_Interface_ProductOptionTypeConstant::OPTION_TYPE_FRAME) {
                $frameOption = $option;
                break;
            }
        }

        $printProductQuery = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentPrintProductQuery::create()->filterByLegacyProductId($legacyProductId);
        if ($frameOption) {
            $printProductQuery->useOptionQuery()->filterByIdentifier($frameOption->getIdentifier())->endUse();
        } else {
            $printProductQuery->filterByFkOption(null, Criteria::ISNULL);
        }

        $printProduct = $printProductQuery->findOne();
        if (!$printProduct) {
            throw new ErrorException('Product unknown to print provider');
        }

        return $printProduct;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Item $item
     * @return int
     * @throws ErrorException
     */
    public function getFulfillmentCenterProductIdByItem(Sao_Shared_Sales_Transfer_Order_Item $item)
    {
        $printProduct = $this->getFulfillmentCenterProductByItem($item);
        if (!$printProduct) {
            throw new ErrorException('Product unknown to print provider');
        }
        return $printProduct->getProviderProductId();
    }

    /**
     * @param string $sku
     * @return ProjectA_Zed_Catalog_Component_Interface_Product
     */
    public function getProductBySku($sku)
    {
        return $this->facadeCatalog->getProduct($this->facadeCatalog->getProductBySku($sku));
    }

    /**
     * @param $idSalesOrderItem
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItem
     */
    public function getSalesOrderItemById($idSalesOrderItem)
    {
        return $this->facadeSales->getSalesOrderItemById($idSalesOrderItem);
    }

    /**
     * @param ProjectA_Zed_Catalog_Component_Interface_Product $product
     * @return string
     */
    public function getProductState(ProjectA_Zed_Catalog_Component_Interface_Product $product)
    {
        $attributeNames = [
            self::ATTRIBUTE_ORIGIN_STATE,
            self::ATTRIBUTE_ORIGIN_PROVINCE,
            self::ATTRIBUTE_ORIGIN_REGION
        ];

        foreach ($attributeNames as $attributeName) {
            if (isset($product[$attributeName])) {
                return $product[$attributeName];
            }
        }

        return '';
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress $address
     * @return string
     */
    public function getStateByAddress(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress $address)
    {
        $saoAddress = $address->getSaoAddress();
        if ($saoAddress) {
            $region = $saoAddress->getRegion();
            if ($region) {
                return $region->getShortName();
            }
        }
        return '';
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress $address
     * @return string
     */
    public function getPhoneNumberByAddress(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress $address)
    {
        $phoneNumber = $address->getCellPhone();
        if ($phoneNumber === null) {
            return $address->getPhone();
        }
        return $phoneNumber;
    }

}
