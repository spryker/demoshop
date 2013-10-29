<?php
namespace Pyz\Zed\Catalog\Component\Model\Import;

use ProjectA\Zed\Catalog\Component\Model\Import\ProductImport as CoreProductImport;

class ProductImport extends CoreProductImport
{
    /**
     * @param \ProjectA_Zed_Catalog_Component_Interface_Product $product
     * @return mixed
     */
    protected function createProductUrl(\ProjectA_Zed_Catalog_Component_Interface_Product $product)
    {
        return $product->createProductUrl();
    }
}
