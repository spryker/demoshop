<?php
namespace Pyz\Zed\Catalog\Component\Model\Import;

use ProjectA\Zed\Catalog\Component\Model\Import\Product as CoreProduct;
use Pyz\Zed\Catalog\Component\Model\Product as ProductModel;

/**
 * Class Product
 * @package Pyz\Zed\Catalog\Component\Model\Import
 */
class Product extends CoreProduct
{
    /**
     * @param $product
     * @return string
     */
    protected function createProductUrl(ProductModel $product)
    {
        return $product->createProductUrl();
    }
}
