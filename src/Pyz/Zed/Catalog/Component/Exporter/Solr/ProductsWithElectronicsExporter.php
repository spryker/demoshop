<?php
namespace Pyz\Zed\Catalog\Component\Exporter\Solr;

use ProjectA\Shared\Solr\Code\SolrInstanceBuilder;
use \Pyz\Zed\Catalog\Component\Exporter\QueryBuilder\Solr\ProductsWithElectronics;

class ProductsWithElectronicsExporter extends ProductsExporter
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
        return self::ATTRIBUTESET_PRODUCTS_WITH_ELECTRONICS;
    }

    /**
     * @return ProductsWithElectronics
     */
    protected function getProductQueryBuilder()
    {
        return $this->factory->createExporterQueryBuilderSolrProductsWithElectronics();
    }
}
