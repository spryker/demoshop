<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Category\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractServiceProvider;
use Pyz\Yves\Category\CategoryDependencyContainer;
use Silex\Application;

/**
 * @method CategoryDependencyContainer getDependencyContainer()
 */
class CategoryServiceProvider extends AbstractServiceProvider
{

    /**
     * @param Application $app
     *
     * @return void
     */
    public function register(Application $app)
    {
        $this->addGlobalTemplateVariable($app, [
            'categories' => $this->getDependencyContainer()->getCategoryExporterClient()->getNavigationCategories($app['locale']),
        ]);
    }

    /**
     * @param Application $app
     *
     * @return void
     */
    public function boot(Application $app)
    {
    }

}
