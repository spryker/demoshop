<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductSearch\Dependency;

use Generated\Shared\Transfer\RawProductAttributesTransfer;
use Spryker\Zed\ProductSearch\Dependency\Facade\ProductSearchToProductInterface as SprykerProductSearchToProductInterface;

interface ProductSearchToProductInterface extends SprykerProductSearchToProductInterface
{
    /**
     * @param \Generated\Shared\Transfer\RawProductAttributesTransfer $rawProductAttributesTransfer
     *
     * @return array
     */
    public function combineRawProductAttributes(RawProductAttributesTransfer $rawProductAttributesTransfer);

    /**
     * @param string $attributes
     *
     * @return array
     */
    public function decodeProductAttributes($attributes);
}
