<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductNew\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;

class ProductNewControllerProvider extends AbstractYvesControllerProvider
{

    const ROUTE_NEW_PRODUCTS = 'new-products';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();

        $this->createController('/{newProducts}{categoryPath}', self::ROUTE_NEW_PRODUCTS, 'ProductNew', 'NewProducts', 'index')
            ->assert('newProducts', $allowedLocalesPattern . 'new|new')
            ->value('newProducts', 'new')
            ->assert('categoryPath', '\/.+')
            ->value('categoryPath', null)
            ->convert('categoryPath', function ($categoryPath) use ($allowedLocalesPattern) {
                return preg_replace('#^\/' . $allowedLocalesPattern . '#', '/', $categoryPath);
            });
    }

}
