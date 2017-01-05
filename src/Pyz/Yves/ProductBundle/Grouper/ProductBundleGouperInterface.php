<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */
namespace Pyz\Yves\ProductBundle\Grouper;

use ArrayObject;

interface ProductBundleGouperInterface
{

    /**
     * @param \ArrayObject $items
     * @param \ArrayObject $bundleItems
     * @return array
     */
    public function getGroupedBundleItems(ArrayObject $items, ArrayObject $bundleItems);
}
