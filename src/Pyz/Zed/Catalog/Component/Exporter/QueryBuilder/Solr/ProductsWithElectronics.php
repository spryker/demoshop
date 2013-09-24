<?php
namespace Pyz\Zed\Catalog\Component\Exporter\QueryBuilder\Solr;

use ProjectA\Zed\Catalog\Component\Exporter\QueryBuilder\Solr;
use Pyz\Shared\Catalog\Code\ProductAttributeSetConstant;

/**
 * Class ProductsWithElectronics
 * @package Pyz\Zed\Catalog\Component\Exporter\QueryBuilder\Solr
 */
class ProductsWithElectronics extends Solr implements
    ProductAttributeSetConstant
{
    public function getAttributeSetName()
    {
        return self::ATTRIBUTESET_PRODUCTS_WITH_ELECTRONICS;
    }
}
