<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductSet\Mapper;

use Generated\Shared\Transfer\ProductSetStorageTransfer;

class ProductSetStorageMapper implements ProductSetStorageMapperInterface
{

    /**
     * @param array $productSetData
     *
     * @return \Generated\Shared\Transfer\ProductSetStorageTransfer
     */
    public function mapDataToTransfer(array $productSetData)
    {
        $productSetStorageTransfer = new ProductSetStorageTransfer();
        $productSetStorageTransfer->fromArray($productSetData, true);

        return $productSetStorageTransfer;
    }

}
