<?php
namespace Sao\Zed\Catalog\Component\Exporter\QueryBuilder\Solr;

use ProjectA\Zed\Catalog\Component\Exporter\QueryBuilder\Solr;

/**
 * Class Artwork
 * @package Sao\Zed\Catalog\Component\Exporter\QueryBuilder\Solr
 */
class Artwork extends Solr implements
    \Sao_Shared_Catalog_Interface_ProductAttributeSetConstant
{
    public function getAttributeSetName()
    {
        return self::ATTRIBUTESET_ARTWORK;
    }
}
