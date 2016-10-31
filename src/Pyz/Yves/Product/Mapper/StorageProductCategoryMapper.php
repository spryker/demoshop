<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product\Mapper;

use ArrayObject;
use Generated\Shared\Transfer\StorageProductCategoryTransfer;
use Generated\Shared\Transfer\StorageProductTransfer;

class StorageProductCategoryMapper implements StorageProductCategoryMapperInterface
{

    /**
     * @param \Generated\Shared\Transfer\StorageProductTransfer $storageProductTransfer
     * @param array $persistedProduct
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    public function mapProductCategories(StorageProductTransfer $storageProductTransfer, array $persistedProduct)
    {
        if (array_key_exists(StorageProductTransfer::CATEGORIES, $persistedProduct) === false) {
            return $storageProductTransfer;
        }

        $persistedCategories = $persistedProduct[StorageProductTransfer::CATEGORIES];
        $categories = new ArrayObject();
        foreach ($persistedCategories as $category) {
            $storageProductCategoryTransfer = new StorageProductCategoryTransfer();
            $storageProductCategoryTransfer->fromArray($category, true);

            $categories->append($storageProductCategoryTransfer);
        }

        $storageProductTransfer->setCategories($categories);

        return $storageProductTransfer;
    }

}
