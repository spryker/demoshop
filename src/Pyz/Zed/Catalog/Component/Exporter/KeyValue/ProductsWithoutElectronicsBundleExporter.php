<?php
namespace Pyz\Zed\Catalog\Component\Exporter\KeyValue;

class ProductsWithoutElectronicsBundleExporter extends ProductsExporter
{

    /**
     * @return string
     */
    protected function getProductAttributeSetName()
    {
        return self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_BUNDLE;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Component\Exporter\QueryBuilder\AbstractProduct|\Pyz\Zed\Catalog\Component\Exporter\QueryBuilder\KeyValue\ProductsWithoutElectronicsBundle
     */
    protected function getProductQueryBuilder()
    {
        return $this->factory->createExporterQueryBuilderKeyValueProductsWithoutElectronicsBundle();
    }

    /**
     * @param array $product
     * @return array
     */
    protected function transformProductToData($product)
    {
        $product['id'] = $product['id_catalog_product'];
        $product['price'] = $product['final_gross_price'];
        $product['dimension_in_cm'] = '';
        unset($product['id_catalog_product']);
        return $product;
    }

}
