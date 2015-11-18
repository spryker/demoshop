<?php

namespace Pyz\Zed\ProductCategory\Business;

use Generated\Shared\Transfer\ProductCategoryTransfer;
use Orm\Zed\ProductCategory\Persistence\SpyProductCategory;
use SprykerFeature\Zed\ProductCategory\Business\TransferGenerator as SprykerTransferGenerator;

class TransferGenerator extends SprykerTransferGenerator
{

    /**
     * parent::convertProductCategory() is missing "true" parameter for fuzzy matching
     *
     * @param SpyProductCategory $productCategoryEntity
     *
     * @return ProductCategoryTransfer
     */
    public function convertProductCategory(SpyProductCategory $productCategoryEntity)
    {
        return (new ProductCategoryTransfer())
            ->fromArray($productCategoryEntity->toArray(), true);
    }

}
