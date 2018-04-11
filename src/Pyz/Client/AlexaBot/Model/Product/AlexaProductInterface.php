<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\AlexaBot\Model\Product;

interface AlexaProductInterface
{
    /**
     * @param string $productName
     *
     * @return string[]
     */
    public function getVariantsByProductName($productName);

    /**
     * @param int $abstractProductId
     * @param string $variantName
     *
     * @return mixed
     */
    public function getVariantSkuByAbstractProductIdAndVariantName($abstractProductId, $variantName);
}
