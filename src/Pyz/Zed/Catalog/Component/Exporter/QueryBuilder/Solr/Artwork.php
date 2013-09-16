<?php
namespace Pyz\Zed\Catalog\Component\Exporter\QueryBuilder\Solr;

use ProjectA\Zed\Catalog\Component\Exporter\QueryBuilder\Solr;

/**
 * Class Artwork
 * @package Pyz\Zed\Catalog\Component\Exporter\QueryBuilder\Solr
 */
class Artwork extends Solr implements
    \Pyz_Shared_Catalog_Interface_ProductAttributeSetConstant
{
    public function getAttributeSetName()
    {
        return self::ATTRIBUTESET_ARTWORK;
    }
}
