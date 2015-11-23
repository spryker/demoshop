<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Catalog\Communication;

use Silex\Application;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;
use Pyz\Yves\FrontendExporter\Communication\Mapper\UrlMapperInterface;
use Pyz\Client\Catalog\Service\CatalogClient;

class CatalogDependencyContainer extends AbstractCommunicationDependencyContainer
{

    /**
     * @return UrlMapperInterface
     */
    public function createUrlMapper()
    {
        return $this->getLocator()->frontendExporter()->pluginUrlMapper()->createUrlMapper();
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
}
