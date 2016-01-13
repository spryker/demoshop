<?php

namespace Pyz\Yves\Category\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractServiceProvider;
use Pyz\Yves\Category\CategoryFactory;
use Silex\Application;

/**
 * @method CategoryFactory getFactory()
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
            'categories' => $this->getFactory()->getCategoryExporterClient()->getNavigationCategories($app['locale']),
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
