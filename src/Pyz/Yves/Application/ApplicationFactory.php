<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Application;

use Spryker\Service\UtilDateTime\Model\DateTimeFormatterTwigExtension;
use Spryker\Yves\Application\ApplicationFactory as SprykerApplicationFactory;
use Spryker\Yves\Application\Plugin\Provider\ExceptionService\SubRequestExceptionHandler;
use Spryker\Yves\Navigation\Twig\NavigationTwigExtension;
use Symfony\Component\HttpFoundation\Response;

class ApplicationFactory extends SprykerApplicationFactory
{

    /**
     * @return \Spryker\Yves\Application\Plugin\Provider\ExceptionService\ExceptionHandlerInterface[]
     */
    public function createExceptionHandlers()
    {
        $defaultExceptionHandlers = parent::createExceptionHandlers();

        $exceptionHandlers = [
            Response::HTTP_NOT_FOUND => $this->createSubRequestExceptionHandler(),
        ];

        $exceptionHandlers = ($exceptionHandlers + $defaultExceptionHandlers);

        return $exceptionHandlers;
    }

    /**
     * @return \Spryker\Yves\Application\Plugin\Provider\ExceptionService\SubRequestExceptionHandler
     */
    protected function createSubRequestExceptionHandler()
    {
        $application = $this->createApplication();

        return new SubRequestExceptionHandler($application);
    }

    /**
     * @return \Spryker\Yves\Kernel\Application
     */
    protected function createApplication()
    {
        return $this->getProvidedDependency(ApplicationDependencyProvider::PLUGIN_APPLICATION);
    }

    /**
     * @return \Spryker\Client\Session\SessionClientInterface
     */
    public function getSessionClient()
    {
        return $this->getProvidedDependency(ApplicationDependencyProvider::CLIENT_SESSION);
    }

    /**
     * @return \Twig_Extension
     */
    public function createTwigYvesExtension()
    {
        return $this->getProvidedDependency(ApplicationDependencyProvider::PLUGIN_TWIG);
    }

    /**
     * @return \Spryker\Service\UtilDateTime\Model\DateTimeFormatterTwigExtension
     */
    public function createDateFormatterTwigExtension()
    {
        return new DateTimeFormatterTwigExtension($this->getUtilDateTimeService());
    }

    /**
     * @return \Spryker\Yves\Navigation\Twig\NavigationTwigExtension
     */
    public function createNavigationTwigExtension()
    {
        return new NavigationTwigExtension($this->getNavigationClient(), $this->createApplication());
    }

    /**
     * @return \Spryker\Service\UtilDateTime\UtilDateTimeServiceInterface
     */
    protected function getUtilDateTimeService()
    {
        return $this->getProvidedDependency(ApplicationDependencyProvider::SERVICE_UTIL_DATE_TIME);
    }

    /**
     * @return \Pyz\Client\Catalog\CatalogClientInterface
     */
    public function getCatalogClient()
    {
        return $this->getProvidedDependency(ApplicationDependencyProvider::CLIENT_CATALOG);
    }

    /**
     * @return \Spryker\Client\Navigation\NavigationClientInterface
     */
    protected function getNavigationClient()
    {
        return $this->getProvidedDependency(ApplicationDependencyProvider::CLIENT_NAVIGATION);
    }

}
