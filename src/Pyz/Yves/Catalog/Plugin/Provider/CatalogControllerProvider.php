<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Catalog\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;

class CatalogControllerProvider extends AbstractYvesControllerProvider
{

    const ROUTE_SEARCH = 'search';
    const ROUTE_SUGGESTION = 'search/suggestion';
    const ROUTE_SALE = 'sale';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();

        $this->createController('/{search}', self::ROUTE_SEARCH, 'Catalog', 'Catalog', 'fulltextSearch')
            ->assert('search', $allowedLocalesPattern . 'search|search')
            ->value('search', 'search');

        $this->createController('/{search}/suggestion', self::ROUTE_SUGGESTION, 'Catalog', 'Suggestion', 'index')
            ->assert('search', $allowedLocalesPattern . 'search|search')
            ->value('search', 'search');

        $this->createController('/{sale}', self::ROUTE_SALE, 'Catalog', 'Sale', 'index')
            ->assert('sale', $allowedLocalesPattern . 'outlet|outlet')
            ->value('sale', 'outlet');
    }

}
