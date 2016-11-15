<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\SpecialOffers\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;

class SpecialOffersControllerProvider extends AbstractYvesControllerProvider
{

    const PERSONALIZED_PRODUCTS = 'personalized-products';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $this->createController('/personalized-products/{limit}', self::PERSONALIZED_PRODUCTS, 'SpecialOffers', 'PersonalizedProducts')
            ->assert('limit', '\d+')
            ->value('limit', 10);
    }

}
