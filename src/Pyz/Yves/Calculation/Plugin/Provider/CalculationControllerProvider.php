<?php
/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\Calculation\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;

class CalculationControllerProvider extends AbstractYvesControllerProvider
{

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $this->createController(
            '/calculation/debug',
            'calculation-debug',
            'Calculation',
            'Debug',
            'cart'
        )->method('GET');
    }
}
