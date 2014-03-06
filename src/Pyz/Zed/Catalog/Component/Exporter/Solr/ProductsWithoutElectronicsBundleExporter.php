<?php
namespace Pyz\Zed\Catalog\Component\Exporter\Solr;

use ProjectA\Shared\Solr\Code\SolrInstanceBuilder;
use \Pyz\Zed\Catalog\Component\Exporter\QueryBuilder\Solr\ProductsWithoutElectronicsBundle;

class ProductsWithoutElectronicsBundleExporter extends ProductsExporter
{

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return SolrInstanceBuilder::getStoreEndpointName();
    }

    /**
     * @return string
     */
    protected function getProductAttributeSetName()
    {
        return self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_BUNDLE;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Component\Exporter\QueryBuilder\AbstractProduct|ProductsWithoutElectronicsBundle
     */
    protected function getProductQueryBuilder()
    {
        return $this->factory->createExporterQueryBuilderSolrProductsWithoutElectronicsBundle();
    }
}
