<?php
namespace Pyz\Zed\Catalog\Component\Exporter\Solr;

use ProjectA\Shared\Solr\Code\SolrInstanceBuilder;
use Pyz\Zed\Catalog\Component\Exporter\Solr\Products;
use \Pyz\Zed\Catalog\Component\Exporter\QueryBuilder\Solr\Artwork as QueryBuilderSolrArtwork;

/**
 * Class Artwork
 * @package Pyz\Zed\Catalog\Component\Exporter\Solr
 */
class Artwork extends Products
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
