<?php
namespace Pyz\Zed\Catalog\Component\Exporter\QueryBuilder\KeyValue;

use ProjectA\Zed\Catalog\Component\Exporter\QueryBuilder\KeyValue;
use Pyz\Shared\Catalog\Code\ProductAttributeSetConstantInterface;

/**
 * Class ProductsWithoutElectronicsConfig
 * @package Pyz\Zed\Catalog\Component\Exporter\QueryBuilder\KeyValue
 */
class ProductsWithoutElectronicsConfig extends KeyValue implements
    ProductAttributeSetConstantInterface
{
    public function getAttributeSetName()
    {
        return self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_CONFIG;
    }
}
