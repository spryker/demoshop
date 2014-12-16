<?php
namespace Pyz\Zed\Catalog\Business\Exporter\QueryBuilder\KeyValue;

use ProjectA\Zed\Catalog\Business\Exporter\QueryBuilder\KeyValue;
use Pyz\Shared\Catalog\Code\ProductAttributeSetConstantInterface;

/**
 * Class ProductsWithoutElectronicsSimple
 * @package Pyz\Zed\Catalog\Business\Exporter\QueryBuilder\KeyValue
 */
class ProductsWithoutElectronicsSimple extends KeyValue implements
    ProductAttributeSetConstantInterface
{
    public function getAttributeSetName()
    {
        return self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_SIMPLE;
    }
}
