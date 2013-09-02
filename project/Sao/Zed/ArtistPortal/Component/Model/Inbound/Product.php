<?php
/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_ArtistPortal_Component_Model_Inbound_Product implements
    Sao_Zed_ArtistPortal_Component_Interface_InboundProduct,
    ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Price_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Stock_Component_Dependency_Facade_Interface,
    Sao_Zed_ArtistPortal_Component_Interface_ProductFieldConstant,
    ProjectA_Zed_Library_Dependency_Factory_Interface,
    ProjectA_Zed_Library_Dependency_InitInterface
{
    use ProjectA_Zed_Catalog_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Price_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Stock_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /**
     * @var Generated_Zed_ArtistPortal_Component_Factory
     */
    protected $factory;

    protected $wrapOptions;

    /**
     * @param array $data
     * @return array
     */
    public function processProduct(array $data)
    {
        return $this->processProducts([$data]);
    }

    /**
     * Method is called after all dependencies are injected.
     * Use this as a replacement of __contruct() if you want to use injected objects.
     */
    public function initAfterDependencyInjection()
    {
        $this->wrapOptions = $this->getWrapOptions();
    }

    /**
     * @return array
     */
    protected function getWrapOptions()
    {
        $optionQuery = new ProjectA_Zed_Catalog_Persistence_PacCatalogOptionQuery();
        $optionQuery->useOptionTypeQuery()->filterByName(ProjectA_Shared_Library_Catalog_Interface_ProductOptionTypeConstant::OPTION_TYPE_WRAP)->endUse();
        $options = $optionQuery->find();
        $wrapOptions = [];
        /* @var ProjectA_Zed_Catalog_Persistence_PacCatalogOption $option */
        foreach ($options as $option) {
            $wrapOptions[] = $option;
        }
        return $wrapOptions;
    }

    /**
     * @param array $data
     * @return array
     */
    public function processProducts(array $data)
    {
        ProjectA_Zed_Library_Stopwatch::start();

        // Check if we have collection of items or only a single item
        if (array_keys($data) !== array_keys(array_keys($data))) {
            $data = array($data);
        }

        $result = [
            'response_code' => 200,
            'results' => []
        ];

        $model = $this->factory->getModelShareContainerProductManufactured();
        foreach ($data as $productArray) {
            $container = $model->createFromArray($productArray);
            if (empty($container)) {
                $result['response_code'] = 400;
                $result['results'][] = [
                    'status' => false,
                    'messages' => [
                        'Was not able to determine set of product'
                    ]
                ];
                continue;
            }
            if (!$container->validate()) {
                $result['response_code'] = 400;
                $result['results'][] = [
                    'status' => false,
                    'messages' => $container->getValidationMessages()
                ];
                $messages = implode('.', $container->getValidationMessages());
                ProjectA_Shared_Library_NewRelic_Api::getInstance()->noticeError('Validation for inbound product form ArtistPortal failed.', new Exception($messages));
                continue;
            }
            $productMessage = '';
            $successful = $this->createOrUpdateCatalogProducts($container, $productMessage);
            $result['results'][] = [
                'status' => $successful,
                'messages' => [$productMessage]
            ];
        }

        $result['info']['duration'] = ProjectA_Zed_Library_Stopwatch::getDuration();
        $result['info']['memory_usage'] = ProjectA_Zed_Library_Stopwatch::getMemoryUsage();

        return $result;
    }

    /**
     * @param Sao_Zed_ArtistPortal_Component_Model_Share_Container_Product $container
     * @param string $productMessage
     * @return bool
     */
    protected function createOrUpdateCatalogProducts(Sao_Zed_ArtistPortal_Component_Model_Share_Container_Product $container, &$productMessage)
    {
        Propel::getConnection()->beginTransaction();
        $skuModel = new Sao_Shared_Library_Legacy_Sku($container[self::SKU]);
        $configSku = $skuModel->getConfigSku();
        $simpleSku = $container[self::SKU];

        $dataArray = $container->getMappedData();

        $status = ($dataArray[self::AVAILABLE])? ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::STATUS_APPROVED : ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::STATUS_DELETED;

        $simpleEntity = $this->facadeCatalog->getProductBySku($simpleSku);
        $new = false;
        if (empty($simpleEntity)) {
            $productMessage = 'The simple product was created with status "' . $status .'"';
            $configEntity = $this->facadeCatalog->getProductBySku($configSku);
            if (!$configEntity) {
                $configEntity = $this->facadeCatalog->createNewConfigEntityForSimpleProduct(
                    $configSku,
                    Sao_Shared_Library_Catalog_Interface_ProductAttributeSetConstant::ATTRIBUTESET_ARTWORK,
                    ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::STATUS_APPROVED // how to determind the whole config is deleted?
                );
                $productMessage = 'The simple and config product was created with status "' . $status .'"';
            }
            $product = $this->facadeCatalog->createNewSimpleProduct(
                $simpleSku,
                Sao_Shared_Library_Catalog_Interface_ProductAttributeSetConstant::ATTRIBUTESET_ARTWORK,
                $configEntity->getSpecificProduct(),
                $dataArray,
                $status
            );
            $new = true;
        } else {
            /* @var ProjectA_Zed_Catalog_Component_Model_Product $product */
            $product = $this->facadeCatalog->getProduct($simpleEntity, [], false);
            $product->fromArray($dataArray);
            $product->setStatus($status);
            $productMessage = 'The product was updated with status "' . $status .'"';
        }
        // PRICE
        $this->facadeCatalog->addPriceToProduct($product, $this->facadePrice->getPricingModel(ProjectA_Zed_Price_Component_Interface_PriceTypeConstants::FINAL_GROSS_PRICE));
        $product[ProjectA_Zed_Price_Component_Interface_PriceTypeConstants::FINAL_GROSS_PRICE] = $dataArray[self::PRICE] * 100; // we want cent

        // STOCK
        $this->facadeCatalog->addStockToProduct($product, $this->facadeStock->getPhysicalStockModel());
        $product[ProjectA_Zed_Stock_Component_Interface_StockTypeConstants::PHYSICAL_STOCK] = $dataArray[self::QUANTITY];

        // OPTIONS
        if (!empty($dataArray[self::FRAMES])) {
            $frames = [];
            foreach ($dataArray[self::FRAMES] as $legacyFrameIdentifier) {
                $frames[] = 'F' . Sao_Shared_Library_Legacy_FrameOptionMapping::mapLegacyFrameToCatalogFrame(substr($legacyFrameIdentifier, 1), $dataArray[self::PRODUCT_ID]);
            }
            if (!$this->assignOptionsToProduct($product, $frames, $productMessage)) {
                Propel::getConnection()->rollBack();
                return false;
            }
        }

        // add wrap options, all those with product_id between 2-31 are supposed to be be canvas products
        // only for new products
        $hasNoWrapOptions = $product->getProduct()->getOptions(
            ProjectA_Zed_Catalog_Persistence_PacCatalogOptionQuery::create()->useOptionTypeQuery()->filterByName(ProjectA_Shared_Library_Catalog_Interface_ProductOptionTypeConstant::OPTION_TYPE_WRAP)->endUse()
        )->isEmpty();
        if (isset($dataArray[self::PRODUCT_ID]) && $dataArray[self::PRODUCT_ID] > 1 && $dataArray[self::PRODUCT_ID] < 33 && ($new || $hasNoWrapOptions)) {
            $this->assignWrapsToProduct($product, $productMessage);
        }

        // LE SOLD
        if (!empty($dataArray[self::LE_SOLD])) {
            $this->assignEditionToProduct($product, $dataArray[self::FRAMES]);
        }

        $product->save();
        Propel::getConnection()->commit();

        return true;
    }

    /**
     * @param ProjectA_Zed_Catalog_Component_Model_Product $product
     * @param $result
     * @return bool
     */
    protected function assignWrapsToProduct(ProjectA_Zed_Catalog_Component_Model_Product $product, &$result)
    {
        foreach ($this->wrapOptions as $option) {
            $product->getProduct()->addOption($option);
        }
        return true;
    }

    /**
     * @param ProjectA_Zed_Catalog_Component_Model_Product $product
     * @param array $frameIdentifiers
     * @param string $result
     * @return bool
     */
    protected function assignOptionsToProduct(ProjectA_Zed_Catalog_Component_Model_Product $product, array $frameIdentifiers, &$result)
    {
        $entity = $product->getProduct();

        /**
         * @var ProjectA_Zed_Catalog_Persistence_PacCatalogProductOption $productOption
         */
        foreach ($entity->getProductOptions() as $productOption) {
            $key = array_search($productOption->getOption()->getIdentifier(), $frameIdentifiers);
            if ($key !== false) {
                unset($frameIdentifiers[$key]);
            } else {
                /* @var $options PropelObjectCollection */
                $productOption->delete();
            }
        }
        foreach ($frameIdentifiers as $identifier) {
            $option = $this->facadeCatalog->getProductOptionByIdentifier($identifier);
            if ($option) {
                $entity->addOption($option);
            } else {
                $result = 'The option with the identifier "' . $identifier . '" was not found';
                return false;
            }
        }
        return true;
    }

    /**
     * @param ProjectA_Zed_Catalog_Component_Model_Product $product
     * @param array $soldEditions
     * @return bool
     */
    protected function assignEditionToProduct(ProjectA_Zed_Catalog_Component_Model_Product $product, array $soldEditions)
    {
        $entity = $product->getProduct();
        // delete all TODO are we setting this or always getting from remote??!?
        $entity->getSoldLimitedEditions()->delete();

        foreach ($soldEditions as $edition) {
            $editionEntity = new Sao_Zed_Catalog_Persistence_SaoCatalogSoldLimitedEdition();
            $editionEntity->setEditionIdentifier($edition);
            $entity->addSoldLimitedEdition($editionEntity);
        }
        return true;
    }
}
