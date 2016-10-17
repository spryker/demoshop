<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product\Builder;

/**
 * Interface FrontendProductBuilderInterface
 */
interface StorageProductBuilderInterface
{

    /**
     * @param array $productData
     * @param array $selectedAttributes
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    public function buildProduct(array $productData, array $selectedAttributes);

}
