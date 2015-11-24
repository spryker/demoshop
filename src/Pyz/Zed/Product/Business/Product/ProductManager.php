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
        /**
         * @todo
         * get all abstract products from database with help of productQueryContainer
         * create AbstractProductCollectionTransfer objects where to store all products from database
         * and return it
         */
        return new AbstractProductCollectionTransfer();
    }
}
