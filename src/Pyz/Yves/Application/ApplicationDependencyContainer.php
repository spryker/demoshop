<?php

namespace Pyz\Yves\Application;

use Pyz\Yves\Application\Plugin\Pimple;
use SprykerEngine\Yves\Application\ApplicationDependencyContainer as SprykerApplicationDependencyContainer;
use SprykerEngine\Yves\Application\Plugin\ServiceProvider\ExceptionService\ExceptionHandlerInterface;
use SprykerEngine\Yves\Application\Plugin\ServiceProvider\ExceptionService\SubRequestExceptionHandler;
use Symfony\Component\HttpFoundation\Response;

class ApplicationDependencyContainer extends SprykerApplicationDependencyContainer
{

    /**
     * @return ExceptionHandlerInterface[]
     */
    public function createExceptionHandlers()
    {
        $defaultExceptionHandlers = parent::createExceptionHandlers();

        $application = (new Pimple())->getApplication();

        $exceptionHandlers = [
            Response::HTTP_NOT_FOUND => new SubRequestExceptionHandler($application),
        ];

        $exceptionHandlers = ($exceptionHandlers + $defaultExceptionHandlers);

        return $exceptionHandlers;
    }

}
