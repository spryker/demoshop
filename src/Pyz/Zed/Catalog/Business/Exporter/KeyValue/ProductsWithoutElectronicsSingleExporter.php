<?php
namespace Pyz\Zed\Catalog\Business\Exporter\KeyValue;

class ProductsWithoutElectronicsSingleExporter extends ProductsExporter
{

    /**
     * @return string
     */
    protected function getProductAttributeSetName()
    {
        return self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_SINGLE;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Component\Exporter\QueryBuilder\AbstractProduct|\Pyz\Zed\Catalog\Business\Exporter\QueryBuilder\KeyValue\ProductsWithoutElectronicsSingle
     */
    protected function getProductQueryBuilder()
    {
        return $this->factory->createExporterQueryBuilderKeyValueProductsWithoutElectronicsSingle();
    }
}
