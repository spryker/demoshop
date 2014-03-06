<?php
namespace Pyz\Zed\Catalog\Component\Exporter\Solr;

use ProjectA\Shared\Solr\Code\SolrInstanceBuilder;
use \Pyz\Zed\Catalog\Component\Exporter\QueryBuilder\Solr\ProductsWithoutElectronicsSingle;

class ProductsWithoutElectronicsSingleExporter extends ProductsExporter
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
        return self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_SINGLE;
    }

    /**
     * @return \ProjectA\Zed\Catalog\Component\Exporter\QueryBuilder\AbstractProduct|ProductsWithoutElectronicsSingle
     */
    protected function getProductQueryBuilder()
    {
        return $this->factory->createExporterQueryBuilderSolrProductsWithoutElectronicsSingle();
    }
}
