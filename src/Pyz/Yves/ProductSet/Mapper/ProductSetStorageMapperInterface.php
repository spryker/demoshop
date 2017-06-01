<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductSet\Mapper;

interface ProductSetStorageMapperInterface
{

    /**
     * @param array $productSetData
     *
     * @return \Generated\Shared\Transfer\ProductSetStorageTransfer
     */
    public function mapDataToTransfer(array $productSetData);

}
