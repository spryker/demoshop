<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Catalog;

use Pyz\Yves\Application\Plugin\Pimple;
use Pyz\Yves\Collector\Plugin\UrlMapperPlugin;
use Spryker\Yves\Kernel\AbstractFactory;

class CatalogFactory extends AbstractFactory
{

    /**
     * @return \Pyz\Yves\Collector\Plugin\UrlMapperPlugin
     */
    public function createUrlMapperPlugin()
    {
        $urlMapper = new UrlMapperPlugin();

        return $urlMapper;
    }

    /**
     * @return \Silex\Application
     */
    public function createApplication()
    {
        $application = (new Pimple())->getApplication();

        return $application;
    }

    /**
     * @return \Spryker\Client\Catalog\CatalogClient
     */
    public function createCatalogClient()
    {
        return $this->getLocator()->catalog()->client();
    }

    /**
     * @return \Spryker\Client\CategoryExporter\CategoryExporterClient
     */
    public function createCategoryExporterClient()
    {
        return $this->getLocator()->categoryExporter()->client();
    }

}
