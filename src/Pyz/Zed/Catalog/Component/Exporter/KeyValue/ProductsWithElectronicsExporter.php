<?php
namespace Pyz\Zed\Catalog\Component\Exporter\KeyValue;

class ProductsWithElectronicsExporter extends ProductsExporter
{

    /**
     * @return string
     */
    protected function getProductAttributeSetName()
    {
        return self::ATTRIBUTESET_PRODUCTS_WITH_ELECTRONICS;
    }

    /**
     * @return \Pyz\Zed\Catalog\Component\Exporter\QueryBuilder\KeyValue\ProductsWithElectronics
     */
    protected function getProductQueryBuilder()
    {
        return $this->factory->getExporterQueryBuilderKeyValueProductsWithElectronics();
    }
}
