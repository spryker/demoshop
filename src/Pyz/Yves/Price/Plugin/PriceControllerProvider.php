<?php
/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
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
        $this->createController(
            '/price-mode-switch',
            static::ROUTE_PRICE_SWITCH,
            'Price',
            'PriceModeSwitch',
            'index'
        );
    }
}
