<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductBundle\Grouper;

use ArrayObject;

interface ProductBundleGouperInterface
{

    /**
     * @param \ArrayObject $items
     * @param \ArrayObject $bundleItems
     *
     * @return array
     */
    public function getGroupedBundleItems(ArrayObject $items, ArrayObject $bundleItems);

}
