<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductSearch\Dependency;

use Generated\Shared\Transfer\RawProductAttributesTransfer;
use Spryker\Zed\ProductSearch\Dependency\Facade\ProductSearchToProductBridge as SprykerProductSearchToProductBridge;

class ProductSearchToProductBridge extends SprykerProductSearchToProductBridge implements ProductSearchToProductInterface
{
    /**
     * @param \Generated\Shared\Transfer\RawProductAttributesTransfer $rawProductAttributesTransfer
     *
     * @return array
     */
    public function combineRawProductAttributes(RawProductAttributesTransfer $rawProductAttributesTransfer)
    {
        return $this->productFacade->combineRawProductAttributes($rawProductAttributesTransfer);
    }

    /**
     * @param string $attributes
     *
     * @return array
     */
    public function decodeProductAttributes($attributes)
    {
        return $this->productFacade->decodeProductAttributes($attributes);
    }
}
