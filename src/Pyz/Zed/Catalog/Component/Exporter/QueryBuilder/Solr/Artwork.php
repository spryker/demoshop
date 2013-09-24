<?php
namespace Pyz\Zed\Catalog\Component\Exporter\QueryBuilder\Solr;

use ProjectA\Zed\Catalog\Component\Exporter\QueryBuilder\Solr;
use Pyz\Shared\Catalog\Code\ProductAttributeSetConstant;

/**
 * Class Artwork
 * @package Pyz\Zed\Catalog\Component\Exporter\QueryBuilder\Solr
 */
class Artwork extends Solr implements
    ProductAttributeSetConstant
{
    public function getAttributeSetName()
    {
        return self::ATTRIBUTESET_ARTWORK;
    }
}
