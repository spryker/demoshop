<?php
namespace Pyz\Zed\Catalog\Component\Exporter\QueryBuilder\KeyValue;

use ProjectA\Zed\Catalog\Component\Exporter\QueryBuilder\KeyValue;
use Pyz\Shared\Catalog\Code\ProductAttributeSetConstant;

/**
 * Class Artwork
 * @package Pyz\Zed\Catalog\Component\Exporter\QueryBuilder\KeyValue
 */
class Artwork extends KeyValue implements
    ProductAttributeSetConstant
{
    public function getAttributeSetName()
    {
        return self::ATTRIBUTESET_ARTWORK;
    }
}
