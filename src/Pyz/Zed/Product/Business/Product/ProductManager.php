<?php

namespace Pyz\Zed\Product\Business\Product;

use Generated\Shared\Transfer\AbstractProductTransfer;
use Generated\Shared\Transfer\AbstractProductCollectionTransfer;
use SprykerFeature\Zed\Product\Business\Product\ProductManager as SprykerProductManager;

class ProductManager extends SprykerProductManager
{

    /**
     * @return AbstractProductCollectionTransfer
     */
    public function getAbstractProducts()
    {
        $abstractProducts = $this->productQueryContainer->queryAbstractProducts()->find();

        $productsCollectionTransfer = new AbstractProductCollectionTransfer();

        foreach ($abstractProducts as $product) {
            $abstractProductTransfer = (new AbstractProductTransfer())->fromArray($product->toArray(), true);
            $productsCollectionTransfer->addProduct($abstractProductTransfer);
        }

        return $productsCollectionTransfer;
    }
}
