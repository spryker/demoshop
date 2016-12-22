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

    const ROUTE_SUGGESTION = 'search/suggestion';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();

        $this->createController('/{search}/suggestion', self::ROUTE_SUGGESTION, 'Catalog', 'Suggestion', 'index')
            ->assert('search', $allowedLocalesPattern . 'search|search')
            ->value('search', 'search');
    }

}
