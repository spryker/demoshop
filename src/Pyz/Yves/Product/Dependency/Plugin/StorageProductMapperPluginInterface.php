<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product\Dependency\Plugin;

/**
 * @method \Pyz\Yves\Product\ProductFactory getFactory()
 * @method \Spryker\Client\Product\ProductClientInterface getClient()
 */
interface StorageProductMapperPluginInterface
{
    /**
     * @param array $data
     * @param array $selectedAttributes
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    public function mapStorageProduct(array $data, array $selectedAttributes = []);
}
