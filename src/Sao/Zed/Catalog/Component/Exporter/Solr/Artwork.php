<?php
namespace Sao\Zed\Catalog\Component\Exporter\Solr;

use Sao\Zed\Catalog\Component\Exporter\Solr\Products;
use \Sao\Zed\Catalog\Component\Exporter\QueryBuilder\Solr\Artwork as QueryBuilderSolrArtwork;

/**
 * Class Artwork
 * @package Sao\Zed\Catalog\Component\Exporter\Solr
 */
class Artwork extends Products
{

    /**
     * @return string
     */
    public function getCoreName()
    {
        return null; //default
        //return \ProjectA_Shared_Library_Store::getInstance()->getSolrCore();
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
