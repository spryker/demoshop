<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Catalog;

use Pyz\Yves\Application\Plugin\Pimple;
use Pyz\Yves\Collector\Plugin\UrlMapper;
use Pyz\Yves\Collector\Mapper\UrlMapperInterface;
use Silex\Application;
use SprykerEngine\Yves\Kernel\AbstractDependencyContainer;
use SprykerFeature\Client\Catalog\Service\CatalogClient;
use SprykerFeature\Client\CategoryExporter\Service\CategoryExporterClient;

class CatalogDependencyContainer extends AbstractDependencyContainer
{

    /**
     * @return UrlMapperInterface
     */
    public function createUrlMapper()
    {
        return (new UrlMapper())->createUrlMapper();
    }

    /**
     * @return Application
     */
    public function createApplication()
    {
        return (new Pimple())->getApplication();
    }

    /**
     * @return CatalogClient
     */
    public function createCatalogClient()
    {
        return $this->getLocator()->catalog()->client();
    }

    /**
     * @return CategoryExporterClient
     */
    public function createCategoryExporterClient()
    {
        return $this->getLocator()->categoryExporter()->client();
    }

}
