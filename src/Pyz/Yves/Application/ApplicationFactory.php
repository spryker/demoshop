<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Application;

use Spryker\Shared\Library\Context;
use Spryker\Shared\Library\DateFormatter;
use Spryker\Shared\Library\Twig\DateFormatterTwigExtension;
use Spryker\Yves\Application\ApplicationFactory as SprykerApplicationFactory;
use Spryker\Yves\Application\Plugin\Provider\ExceptionService\SubRequestExceptionHandler;
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
     * @throws \Spryker\Yves\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return \Spryker\Yves\Application\Application
     */
    protected function createApplication()
    {
        return $this->getProvidedDependency(ApplicationDependencyProvider::PLUGIN_APPLICATION);
    }

    /**
     * @throws \Spryker\Yves\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return \Spryker\Client\Session\SessionClientInterface
     */
    public function getSessionClient()
    {
        return $this->getProvidedDependency(ApplicationDependencyProvider::CLIENT_SESSION);
    }

    /**
     * @throws \Spryker\Yves\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return \Twig_Extension
     */
    public function createTwigYvesExtension()
    {
        return $this->getProvidedDependency(ApplicationDependencyProvider::PLUGIN_TWIG);
    }

    /**
     * @return \Spryker\Shared\Library\Twig\DateFormatterTwigExtension
     */
    public function createDateFormatterTwigExtension()
    {
        return new DateFormatterTwigExtension($this->createDateFormatter());
    }

    /**
     * @return \Spryker\Shared\Library\DateFormatter
     */
    public function createDateFormatter()
    {
        return new DateFormatter(Context::getInstance());
    }

}
