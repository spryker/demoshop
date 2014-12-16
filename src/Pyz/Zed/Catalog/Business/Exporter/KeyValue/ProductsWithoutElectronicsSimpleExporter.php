<?php
namespace Pyz\Zed\Catalog\Business\Exporter\KeyValue;

class ProductsWithoutElectronicsSimpleExporter extends ProductsExporter
{

    /**
     * @return string
     */
    protected function getProductAttributeSetName()
    {
        return self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_SIMPLE;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Business\Exporter\QueryBuilder\AbstractProduct|\Pyz\Zed\Catalog\Business\Exporter\QueryBuilder\KeyValue\ProductsWithoutElectronicsSimple
     */
    protected function getProductQueryBuilder()
    {
        return $this->factory->createExporterQueryBuilderKeyValueProductsWithoutElectronicsSimple();
    }
}
