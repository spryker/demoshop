<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\AlexaBot;

interface AlexaBotClientInterface
{
    /**
     * @param string $productName
     *
     * @return mixed
     */
    public function getVariantsByProductName($productName);

    /**
     * @param string $variantName
     *
     * @return string
     */
    public function addVariantToCart($variantName);

    /**
     * @return bool
     */
    public function checkoutAndPlaceOrder();
}
