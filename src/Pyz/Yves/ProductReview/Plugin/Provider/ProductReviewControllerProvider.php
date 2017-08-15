<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductReview\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;

class ProductReviewControllerProvider extends AbstractYvesControllerProvider
{

    const ROUTE_PRODUCT_REVIEW_INDEX = 'product-review/index';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();

        $this->createController('/{productReview}/{idProductAbstract}', static::ROUTE_PRODUCT_REVIEW_INDEX, 'ProductReview', 'Index', 'index')
            ->assert('productReview', $allowedLocalesPattern . 'product-review|product-review')
            ->value('productReview', 'product-review')
            ->assert('idProductAbstract',  '[1-9][0-9]*');
    }

}
