<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\CategoryExporter\Communication\Plugin\Provider;

use Pyz\Yves\Application\Communication\Plugin\Provider\AbstractServiceProvider;
use Silex\Application;
use SprykerFeature\Client\CategoryExporter\Service\CategoryExporterClient;

/**
 * @method CategoryExporterClient getClient()
 */
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
            'categories' => $this->getClient()->getNavigationCategories($app['locale']),
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
