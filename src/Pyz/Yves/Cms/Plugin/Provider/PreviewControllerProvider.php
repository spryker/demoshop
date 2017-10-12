<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cms\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;

class PreviewControllerProvider extends AbstractYvesControllerProvider
{
    const ROUTE_PREVIEW = 'cms-preview';
    const PARAM_PAGE = 'page';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();

        $this->createController(sprintf('/{cms}/preview/{%s}', static::PARAM_PAGE), self::ROUTE_PREVIEW, 'Cms', 'Preview', 'index')
            ->assert('cms', $allowedLocalesPattern . 'cms|cms')
            ->value('cms', 'cms')
            ->assert(static::PARAM_PAGE, '[0-9]+');
    }
}
