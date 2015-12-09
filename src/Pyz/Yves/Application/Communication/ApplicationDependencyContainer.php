<?php

namespace Pyz\Yves\Application\Communication;

use SprykerEngine\Yves\Application\Communication\ApplicationDependencyContainer as SprykerApplicationDependencyContainer;
use SprykerEngine\Yves\Application\Communication\Plugin\ServiceProvider\ExceptionService\ExceptionHandlerInterface;
use SprykerEngine\Yves\Application\Communication\Plugin\ServiceProvider\ExceptionService\SubRequestExceptionHandler;
use Symfony\Component\HttpFoundation\Response;

class ApplicationDependencyContainer extends SprykerApplicationDependencyContainer
{

    /**
     * @return ExceptionHandlerInterface[]
     */
    public function createExceptionHandlers()
    {
        $defaultExceptionHandlers = parent::createExceptionHandlers();

        $application = $this->getLocator()->application()->pluginPimple()->getApplication();

        $exceptionHandlers = [
            Response::HTTP_NOT_FOUND => new SubRequestExceptionHandler($application),
        ];

        $exceptionHandlers = ($exceptionHandlers + $defaultExceptionHandlers);

        return $exceptionHandlers;
    }

}
