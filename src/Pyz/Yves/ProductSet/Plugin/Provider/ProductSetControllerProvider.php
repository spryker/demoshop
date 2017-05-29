<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductSet\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;

class ProductSetControllerProvider extends AbstractYvesControllerProvider
{

    const ROUTE_PRODUCT_SETS = 'product-sets';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();

        $this->createController('/{sets}', self::ROUTE_PRODUCT_SETS, 'ProductSet', 'Catalog', 'index')
            ->assert('sets', $allowedLocalesPattern . 'product-sets|product-sets')
            ->value('sets', 'product-sets');
    }

}
