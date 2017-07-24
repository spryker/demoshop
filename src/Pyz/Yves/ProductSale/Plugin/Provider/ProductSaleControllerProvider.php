<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductSale\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;

class ProductSaleControllerProvider extends AbstractYvesControllerProvider
{

    const ROUTE_SALE = 'sale';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();

        $this->createController('/{sale}{categoryPath}', self::ROUTE_SALE, 'ProductSale', 'Sale', 'index')
            ->assert('sale', $allowedLocalesPattern . 'outlet|outlet')
            ->value('sale', 'outlet')
            ->assert('categoryPath', '\/.+')
            ->value('categoryPath', null)
            ->convert('categoryPath', function ($categoryPath) use ($allowedLocalesPattern) {
                return preg_replace('#^\/' . $allowedLocalesPattern . '#', '/', $categoryPath);
            });
    }

}
