<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\AlexaBot\Model\Product;

interface AlexaProductInterface
{
    /**
     * @param int $abstractId
     *
     * @return array
     */
    public function getConcreteListByAbstractId($abstractId);

    /**
     * @param int $abstractId
     * @param string $variantName
     *
     * @return string
     */
    public function getConcreteSkuByAbstractIdAndVariant($abstractId, $variantName);
}
