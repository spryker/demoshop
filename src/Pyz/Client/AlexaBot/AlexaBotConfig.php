<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\AlexaBot;

use Spryker\Client\Kernel\AbstractBundleConfig;

class AlexaBotConfig extends AbstractBundleConfig
{
    const PRODUCT_SESSION_NAME = 'alexa-product.session';
    const CART_SESSION_NAME = 'alexa-cart.session';

    /**
     * @return string
     */
    public function getProductSessionName()
    {
        return static::PRODUCT_SESSION_NAME;
    }

    /**
     * @return string
     */
    public function getCartSessionName()
    {
        return static::CART_SESSION_NAME;
    }
}
