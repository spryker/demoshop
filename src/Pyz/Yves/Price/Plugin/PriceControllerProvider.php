<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Price\Plugin;

use Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;

class PriceControllerProvider extends AbstractYvesControllerProvider
{
    const ROUTE_PRICE_SWITCH = 'price-mode-switch';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();

        $this->createController(
            '/{price}/mode-switch',
            static::ROUTE_PRICE_SWITCH,
            'Price',
            'PriceModeSwitch',
            'index'
        )->assert('price', $allowedLocalesPattern . 'price|price')
            ->value('price', 'price');;
    }
}
