<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product\Plugin;

use Pyz\Yves\Product\Dependency\Plugin\StorageProductMapperPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \Pyz\Yves\Product\ProductFactory getFactory()
 */
class StorageProductMapperPlugin extends AbstractPlugin implements StorageProductMapperPluginInterface
{

    /**
     * @param array $data
     * @param array $selectedAttributes
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    public function mapStorageProduct(array $data, array $selectedAttributes = [])
    {
        $storageProductTransfer = $this->getFactory()
            ->createStorageProductMapper()
            ->mapStorageProduct($data, $selectedAttributes);

        $storageProductTransfer = $this->getFactory()
            ->createStorageImageMapper()
            ->mapProductImages($storageProductTransfer);

        $storageProductTransfer = $this->getFactory()
            ->createStorageProductCategoryMapper()
            ->mapProductCategories($storageProductTransfer, $data);

        $storageProductTransfer = $this->getFactory()
            ->createStorageProductAvailabilityMapper()
            ->mapAvailability($storageProductTransfer);

        return $storageProductTransfer;
    }

}
