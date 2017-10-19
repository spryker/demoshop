<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product\Mapper;

use Generated\Shared\Transfer\StorageProductTransfer;

interface StorageProductCategoryMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\StorageProductTransfer $storageProductTransfer
     * @param array $persistedProduct
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    public function mapProductCategories(StorageProductTransfer $storageProductTransfer, array $persistedProduct);
}
