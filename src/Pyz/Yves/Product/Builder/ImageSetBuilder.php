<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product\Builder;

use Generated\Shared\Transfer\StorageProductTransfer;
use Spryker\Shared\ProductImage\ProductImageConstants;

class ImageSetBuilder implements ImageSetBuilderInterface
{

    /**
     * @param array $persistedProductData
     *
     * @return array
     */
    public function getDisplayImagesFromPersistedProduct(array $persistedProductData)
    {
        if (!isset($persistedProductData[StorageProductTransfer::IMAGES])) {
             return [];
        }

        $imageSets = $persistedProductData[StorageProductTransfer::IMAGES];
        if (isset($imageSets[ProductImageConstants::DEFAULT_IMAGE_SET_NAME])) {
            return $imageSets[ProductImageConstants::DEFAULT_IMAGE_SET_NAME];
        } else {
            return array_shift($imageSets);
        }
    }

}
