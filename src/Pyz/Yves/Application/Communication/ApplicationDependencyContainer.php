<?php

namespace Pyz\Yves\Application\Communication;

use SprykerEngine\Yves\Application\Communication\ApplicationDependencyContainer as SpyApplicationDependencyContainer;
use SprykerEngine\Yves\Application\Communication\Plugin\ServiceProvider\ExceptionService\ExceptionHandlerInterface;
use Symfony\Component\HttpFoundation\Response;

class ApplicationDependencyContainer extends SpyApplicationDependencyContainer
{
    /**
     * @return ExceptionHandlerInterface[]
     */
    public function createExceptionHandlers()
    {
        $app = $this->getLocator()->application()->pluginPimple()->getApplication();

        return [
            Response::HTTP_NOT_FOUND => $this->getFactory()
                ->createPluginServiceProviderExceptionServiceSubRequestExceptionHandler($app),
        ];
    }
}
