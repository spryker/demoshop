<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\CategoryExporter\Provider;

use Pyz\Yves\Application\Provider\AbstractServiceProvider;
use Silex\Application;

class CategoryExporterServiceProvider extends AbstractServiceProvider
{

    /**
     * @param Application $app
     *
     * @return void
     */
    public function register(Application $app)
    {
        $this->addGlobalTemplateVariable($app, [
            'categories' => $this->getLocator()->categoryExporter()->client()->getNavigationCategories($app['locale']),
        ]);
    }

    /**
     * @param Application $app
     *
     * @return void
     */
    public function boot(Application $app)
    {
        // do nothing
    }

}
