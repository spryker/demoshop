<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\AlexaBot;

interface AlexaBotClientInterface
{
    /**
     * @param $abstractName
     *
     * @return int
     */
    public function getAbstractIdByAbstractName($abstractName);

    /**
     * @param int $abstractId
     *
     * @return string[]
     */
    public function getVariantsByProductName($abstractId);

    /**
     * @param int $abstractId
     * @param string $variantName
     *
     * @return string
     */
    public function getConcreteSkuByAbstractIdAndVariantName($abstractId, $variantName);

    /**
     * @param string $concreteSku
     * @param int $sessionId
     *
     * @return bool
     */
    public function addConcreteToCartBySku($concreteSku, $sessionId);

    /**
     * @param int $sessionId
     *
     * @return bool
     */
    public function checkoutAndPlaceOrder($sessionId);
}
