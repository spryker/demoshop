<?php

namespace Pyz\Yves\Application;

use Pyz\Yves\Application\Plugin\Pimple;
use Pyz\Yves\Twig\Plugin\TwigYves;
use Silex\Application as SilexApplication;
use Spryker\Shared\Library\Context;
use Spryker\Shared\Library\DateFormatter;
use Spryker\Shared\Library\Twig\DateFormatterTwigExtension;
use Spryker\Yves\Application\Application;
use Spryker\Yves\Application\ApplicationFactory as SprykerApplicationFactory;
use Spryker\Yves\Application\Plugin\Provider\ExceptionService\ExceptionHandlerInterface;
use Spryker\Yves\Application\Plugin\Provider\ExceptionService\SubRequestExceptionHandler;
use Spryker\Client\Session\SessionClientInterface;
use Symfony\Component\HttpFoundation\Response;

class ApplicationFactory extends SprykerApplicationFactory
{

    /**
     * @return ExceptionHandlerInterface[]
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
     * @return SubRequestExceptionHandler
     */
    protected function createSubRequestExceptionHandler()
    {
        $application = $this->createApplication();

        return new SubRequestExceptionHandler($application);
    }

    /**
     * @return Application
     */
    protected function createApplication()
    {
        return (new Pimple())->getApplication();
    }

    /**
     * @return SessionClientInterface
     */
    public function getSessionClient()
    {
        return $this->getLocator()->session()->client();
    }

    /**
     * @param SilexApplication $application
     *
     * @return \Twig_Extension
     */
    public function createTwigYvesExtension(SilexApplication $application)
    {
        return (new TwigYves())->getTwigYvesExtension($application);
    }

    /**
     * @return DateFormatterTwigExtension
     */
    public function createDateFormatterTwigExtension()
    {
        return new DateFormatterTwigExtension(new DateFormatter(Context::getInstance()));
    }

}
