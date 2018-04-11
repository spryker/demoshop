<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\AlexaBot\Model\Cart;

interface AlexaCartInterface
{
    /**
     * @param string $variantName
     *
     * @return bool
     */
    public function addVariantToCart($variantName);
}
