<?php

namespace Pyz\Zed\ProductCategory\Business;
use SprykerFeature\Zed\ProductCategory\Business\ProductCategoryManagerInterface as SprykerProductCategoryManagerInterface;

use Generated\Shared\Transfer\CategoryTransfer;

interface ProductCategoryManagerInterface extends SprykerProductCategoryManagerInterface
{
    /**
     * @param $idAbstractProduct
     * @return CategoryTransfer[]
     */
    public function getCategoriesByAbstractProductId($idAbstractProduct);


}
