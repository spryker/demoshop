<?php

abstract class Sao_Zed_Catalog_Component_Exporter_Products extends ProjectA_Zed_Catalog_Component_Exporter_Products implements
     ProjectA_Zed_Yves_Component_Interface_Exporter_Memcache,
     Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant,
     Sao_Shared_Library_Catalog_Interface_ProductAttributeSetConstant,
     Sao_Shared_Library_StorageKeyConstant,
     ProjectA_Zed_Yves_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Yves_Component_Dependency_Facade_Trait;

    /**
     * @return string
     */
    abstract protected function getProductAttributeSetName();

    /**
     * @return ProjectA_Zed_Catalog_Component_Exporter_QueryBuilder_AbstractProduct
     */
    abstract protected function getProductQueryBuilder();

    /**
     * @param array $product
     * @return array
     */
    abstract protected function transformProductToData($product);

    /**
     * @return string
     */
    public function getName()
    {
        return 'Products ' . $this->getProductAttributeSetName();
    }

    /**
     * @return ProjectA_Zed_Yves_Component_Exporter_Task_Entity
     */
    public function getExportTask()
    {
        $task = $this->facadeYves->getExporterTaskRaw();
        $task->setLazyCollection(
            new ProjectA_Zed_Library_Propel_RawLazyCollection($this->getProductQueryBuilder())
        );
        return $task;
    }

    /**
     * @param Traversable $collection
     * @param ProjectA_Zed_Yves_Component_Model_Export_Abstract $exportModel
     * @param ArrayIterator $reporter
     */
    public function exportData(
        Traversable $collection,
        ProjectA_Zed_Yves_Component_Model_Export_Abstract $exportModel,
        ArrayIterator $reporter
    ) {
        $facade = $this->factory->getFacade();
        $reportName = $this->getName() . ' exported';
        $reporter[$reportName] = 0;

        foreach ($collection as $product) {
            $data = array();

            $pairProductData = $this->transformProductToData($product);

            $productKey = ProjectA_Shared_Library_Storage::getProductKey($product['sku']);
            $data[$productKey] = $pairProductData;

            if (isset($product[self::ATTRIBUTE_URL])) {
                $productUrlKey = ProjectA_Shared_Library_Storage::getProductUrlKey($product[self::ATTRIBUTE_URL]);
                $data[$productUrlKey] = $product['sku'];
            }

            $exportModel->write($data);
            $reporter[$reportName]++;
        }
    }

//    /**
//     * @param array $product
//     * @return array
//     */
//    protected function transformProductToData($product)
//    {
//        $pairProductData = $product;
//        $pairProductData[self::STORAGEKEY_PRODUCT_SKU] = $sku = $product['sku'];;
//        $pairProductData[self::STORAGEKEY_PRODUCT_ATTRIBUTE_SET] = $this->getRimAttributeSetName();
//        $pairProductData[self::STORAGEKEY_PRODUCT_PRICE] = $product['price'];
//        $pairProductData[self::STORAGEKEY_PRODUCT_QUANTITY] = $product['quantity'];
//        $pairProductData[self::STORAGEKEY_PRODUCT_ID_CATALOG_PRODUCT] = $product['id_catalog_product'];
//
//        return $pairProductData;
//    }
}
