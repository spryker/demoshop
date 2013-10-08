<?php
namespace Pyz\Zed\Catalog\Component\Exporter\KeyValue;

use ProjectA\Zed\Catalog\Component\Exporter\QueryBuilder\AbstractProduct;

class ProductsWithoutElectronicsExporter extends ProductsExporter
{

    /**
     * @return string
     */
    protected function getProductAttributeSetName()
    {
        return self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS;
    }

    /**
     * @return \Pyz\Zed\Catalog\Component\Exporter\QueryBuilder\KeyValue\ProductsWithoutElectronics
     */
    protected function getProductQueryBuilder()
    {
        return $this->factory->getExporterQueryBuilderKeyValueProductsWithoutElectronics();
    }
}
