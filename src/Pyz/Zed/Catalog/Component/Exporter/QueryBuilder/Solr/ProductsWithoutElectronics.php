<?php
namespace Pyz\Zed\Catalog\Component\Exporter\QueryBuilder\Solr;

use ProjectA\Zed\Catalog\Component\Exporter\QueryBuilder\Solr;
use Pyz\Shared\Catalog\Code\ProductAttributeSetConstant;

/**
 * Class ProductsWithoutElectronics
 * @package Pyz\Zed\Catalog\Component\Exporter\QueryBuilder\Solr
 */
class ProductsWithoutElectronics extends Solr implements
    ProductAttributeSetConstant
{
    public function getAttributeSetName()
    {
        return self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS;
    }
}
