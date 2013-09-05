<?php

/**
 * @property Generated_Zed_Yves_Component_Factory $factory
 * @property Sao_Zed_Catalog_Component_Facade $facadeCatalog
 */
class Sao_Zed_Yves_Component_Model_Export_Exporter_Memcache_Products_Artwork extends ProjectA_Zed_Catalog_Component_Exporter_Products implements
    ProjectA_Zed_Yves_Component_Interface_Exporter_Memcache,
    Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant,
    Sao_Shared_Library_Catalog_Interface_ProductAttributeSetConstant,
    Sao_Shared_Library_StorageKeyConstant
{
//    /** @var array */
//    protected $urlkeyAttributes = array(
//    );

    /**
     * @return string
     */
    public function getName ()
    {
        return 'Products ' . self::ATTRIBUTESET_ARTWORK;
    }

    /**
     * @return ProjectA_Zed_Yves_Component_Model_Export_Task
     */
    public function getExportTask()
    {
        $task = $this->factory->getModelExportTaskRaw();
        $task->setLazyCollection(
            new ProjectA_Zed_Library_Propel_RawLazyCollection($this->facadeCatalog->getQueryBuilderMemcacheArtwork())
        );
        return $task;
    }

    /**
     * @param Traversable $collection
     * @param ProjectA_Zed_Yves_Component_Model_Export_Abstract $exportModel
     * @param ArrayIterator $reporter
     */
    public function exportData(Traversable $collection, ProjectA_Zed_Yves_Component_Model_Export_Abstract $exportModel, ArrayIterator $reporter)
    {
        $facade = $this->factory->getFacade();
        $reportName = $this->getName() . ' exported';
        $reporter[$reportName] = 0;

        foreach ($collection as $product) {
            $sku = $product['sku'];
            $data = array();
            //$productUrlKey = ProjectA_Shared_Library_Storage::getProductUrlKey($product[self::ATTRIBUTE_URL]);
           // $data[$productUrlKey] = $sku;

            $productKey = $facade->getProductKey($sku);
            //$urlkeyData = $this->getUrlkeyData($product, $productKey);
            //$data = array_merge($data, $urlkeyData);

            $data[$productKey] = $product;

            $exportModel->write($data);

            $reporter[$reportName]++;
        }
    }

//    /**
//     * Returns entries for all attributes (manufacturer, tread_txt) for this product
//     *
//     * @param ProjectA_Zed_Catalog_Component_Interface_Product $product
//     * @param string $productKey
//     * @return array keys: STORE_urlkey_<manufacturer>, STORE_urlkey_<tread_txt>
//     */
//    protected function getUrlkeyData($product, $productKey)
//    {
//        $data = array();
//        foreach ($this->urlkeyAttributes as $attribute) {
//
//            if (isset($product[$attribute])) {
//                $urlkey = Sao_Shared_Library_Storage::getUrlkey($product[$attribute]);
//                $data[$urlkey] = array(
//                    'type' => $attribute,
//                    'value' => mb_strtolower($product[$attribute]),
//                    'product_key' => $productKey,
//                );
//            }
//        }
//        return $data;
//    }
}
