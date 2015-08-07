<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\FrontendExporter\Communication;

use Generated\Yves\Ide\FactoryAutoCompletion\FrontendExporter;
use Generated\Yves\Ide\FactoryAutoCompletion\FrontendExporterCommunication;
use SprykerFeature\Client\Catalog\Service\Model\FacetConfig;
use SprykerFeature\Client\FrontendExporter\Service\Matcher\UrlMatcher;
use Pyz\Yves\FrontendExporter\Communication\Creator\ResourceCreatorInterface;
use Pyz\Yves\FrontendExporter\Communication\Mapper\UrlMapper;
use SprykerFeature\Yves\FrontendExporter\Communication\Router\StorageRouter;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;
use Silex\Application;

/**
 * @method FrontendExporterCommunication getFactory()
 */
class FrontendExporterDependencyContainer extends AbstractCommunicationDependencyContainer
{

    /**
     * @return ResourceCreatorInterface[]
     */
    public function createResourceCreators()
    {
        $settings = $this->getFactory()->createFrontendExporterSettings(
            $this->getLocator()
        );

        return $settings->getResourceCreators();
    }

    /**
     * @return UrlMapper
     */
    public function createUrlMapper()
    {
        return $this->getFactory()->createMapperUrlMapper(
            $this->createFacetConfig()
        );
    }

    /**
     * @return UrlMatcher
     */
    public function createUrlMatcher()
    {
        $urlMatcher = $this->getLocator()->frontendExporter()
            ->client()
        ;

        return $urlMatcher;
    }

    /**
     * @return FacetConfig
     */
    protected function createFacetConfig()
    {
        return $this->getLocator()->catalog()->client()->createFacetConfig();
    }

    /**
     * @return Application
     */
    public function createApplication()
    {
        return $this->getLocator()->application()->pluginPimple()->getApplication();
    }

}
