<?php

namespace Pyz\Yves\Application;

use Pyz\Yves\Application\Plugin\Pimple;
use Spryker\Yves\Application\Application;
use Spryker\Yves\Application\ApplicationDependencyContainer as SprykerApplicationDependencyContainer;
use Spryker\Yves\Application\Plugin\Provider\ExceptionService\ExceptionHandlerInterface;
use Spryker\Yves\Application\Plugin\Provider\ExceptionService\SubRequestExceptionHandler;
use Spryker\Client\Session\SessionClientInterface;
use Symfony\Component\HttpFoundation\Response;

class ApplicationDependencyContainer extends SprykerApplicationDependencyContainer
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

}
