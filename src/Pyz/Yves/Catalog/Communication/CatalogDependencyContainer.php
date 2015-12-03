<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Catalog\Communication;

use Pyz\Yves\Collector\Communication\Mapper\UrlMapperInterface;
use Silex\Application;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;
use SprykerFeature\Client\Catalog\Service\CatalogClient;
use SprykerFeature\Client\CategoryExporter\Service\CategoryExporterClient;

class CatalogDependencyContainer extends AbstractCommunicationDependencyContainer
{

    /**
     * @return UrlMapperInterface
     */
    public function createUrlMapper()
    {
        return $this->getLocator()->collector()->pluginUrlMapper()->createUrlMapper();
    }

    /**
     * @return Application
     */
    public function createApplication()
    {
        return $this->getLocator()->application()->pluginPimple()->getApplication();
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
