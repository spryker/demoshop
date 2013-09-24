<?php
namespace Pyz\Zed\Catalog\Component\Exporter\Solr;

use ProjectA\Shared\Solr\Code\SolrInstanceBuilder;
use \Pyz\Zed\Catalog\Component\Exporter\QueryBuilder\Solr\Artwork as QueryBuilderSolrArtwork;

class ArtworkExporter extends ProductsExporter
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
        return self::ATTRIBUTESET_ARTWORK;
    }

    /**
     * @return QueryBuilderSolrArtwork
     */
    protected function getProductQueryBuilder()
    {
        return $this->factory->getExporterQueryBuilderSolrArtwork();
    }
}
