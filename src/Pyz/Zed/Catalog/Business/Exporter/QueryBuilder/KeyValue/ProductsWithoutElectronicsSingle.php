<?php
namespace Pyz\Zed\Catalog\Business\Exporter\QueryBuilder\KeyValue;

use ProjectA\Zed\Catalog\Component\Exporter\QueryBuilder\KeyValue;
use Pyz\Shared\Catalog\Code\ProductAttributeSetConstantInterface;

/**
 * Class ProductsWithoutElectronicsSingle
 * @package Pyz\Zed\Catalog\Business\Exporter\QueryBuilder\KeyValue
 */
class ProductsWithoutElectronicsSingle extends KeyValue implements
    ProductAttributeSetConstantInterface
{
    public function getAttributeSetName()
    {
        return self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_SINGLE;
    }
}
