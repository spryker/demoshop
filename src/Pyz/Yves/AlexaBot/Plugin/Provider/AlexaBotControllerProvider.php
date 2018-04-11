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
    const ALEXA_PRODUCT = 'alexa/variant';
    const ALEXA_CART = 'alexa/concrete';
    const ALEXA_CHECKOUT_AND_ORDER  = 'alexa/payment';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();

        $this->createGetController('/{alexa}/variant', static::ALEXA_PRODUCT, 'AlexaBot', 'Alexa', 'product')
            ->assert('alexa', $allowedLocalesPattern . 'alexa|alexa');

        $this->createGetController('/{alexa}/concrete', static::ALEXA_CART, 'AlexaBot', 'Alexa', 'cart')
            ->assert('alexa', $allowedLocalesPattern . 'alexa|alexa');

        $this->createGetController('/{alexa}/payment', static::ALEXA_CHECKOUT_AND_ORDER, 'AlexaBot', 'Alexa', 'checkoutAndOrder')
            ->assert('alexa', $allowedLocalesPattern . 'alexa|alexa');
    }
}
