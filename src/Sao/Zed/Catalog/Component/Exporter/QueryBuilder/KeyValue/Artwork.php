<?php
namespace Sao\Zed\Catalog\Component\Exporter\QueryBuilder\KeyValue;

use ProjectA\Zed\Catalog\Component\Exporter\QueryBuilder\KeyValue;

/**
 * Class Artwork
 * @package Sao\Zed\Catalog\Component\Exporter\QueryBuilder\KeyValue
 */
class Artwork extends KeyValue implements
    \Sao_Shared_Catalog_Interface_ProductAttributeSetConstant
{
    public function getAttributeSetName()
    {
        return self::ATTRIBUTESET_ARTWORK;
    }
}
