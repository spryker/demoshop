<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\AlexaBot\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;

class AlexaBotControllerProvider extends AbstractYvesControllerProvider
{
    const ALEXA_PRODUCT = 'alexa/product';
    const ALEXA_CART = 'alexa/cart';
    const ALEXA_CHECKOUT_AND_ORDER = 'alexa/checkout-and-order';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();

        $this->createGetController('/{alexa}/product', static::ALEXA_PRODUCT, 'AlexaBot', 'AlexaBot', 'product')
            ->assert('alexa', $allowedLocalesPattern . 'alexa|alexa');

        $this->createGetController('/{alexa}/cart', static::ALEXA_CART, 'AlexaBot', 'AlexaBot', 'cart')
            ->assert('alexa', $allowedLocalesPattern . 'alexa|alexa');

        $this->createGetController('/{alexa}/checkout-and-order', static::ALEXA_CHECKOUT_AND_ORDER, 'AlexaBot', 'AlexaBot', 'checkoutAndOrder')
            ->assert('alexa', $allowedLocalesPattern . 'alexa|alexa');
    }
}
