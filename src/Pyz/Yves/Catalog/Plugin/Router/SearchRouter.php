<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Catalog\Plugin\Router;

use Pyz\Yves\Collector\Mapper\UrlMapperInterface;
use Silex\Application;
use Spryker\Yves\Kernel\Locator;
use Spryker\Shared\Application\Communication\ControllerServiceBuilder;
use Spryker\Yves\Application\Routing\AbstractRouter;
use Spryker\Yves\Kernel\BundleControllerAction;
use Spryker\Yves\Kernel\Controller\RouteNameResolver;
use Spryker\Yves\Kernel\ControllerLocator;
use Pyz\Yves\Catalog\CatalogDependencyContainer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

/**
 * @method CatalogDependencyContainer getDependencyContainer()
 */
class SearchRouter extends AbstractRouter
{

    /**
     * {@inheritdoc}
     */
    public function generate($name, $parameters = [], $referenceType = self::ABSOLUTE_PATH)
    {
        if ($name === '/search') {
            $request = $this->getRequest();
            $requestParameters = $request->query->all();
            //if no page is provided we generate a url to change the filter and therefore want to reset the page
            //TODO @see Spryker\Yves\Catalog\Business\Model\AbstractSearch Line 77
            //     same todo to put parameter name into constant
            if (!isset($parameters['page']) && isset($requestParameters['page'])) {
                unset($requestParameters['page']);
            }
            $pathInfo = $this->getUrlMapper()->generateUrlFromParameters(
                $this->getUrlMapper()->mergeParameters($requestParameters, $parameters)
            );
            $pathInfo = $name . $pathInfo;

            return $this->getUrlOrPathForType($pathInfo, $referenceType);
        }
        throw new RouteNotFoundException();
    }

    /**
     * {@inheritdoc}
     */
    public function match($pathinfo)
    {
        if ($pathinfo === '/search') {
            $request = $this->getRequest();
            $this->getUrlMapper()->injectParametersFromUrlIntoRequest($pathinfo, $request);

            $bundleControllerAction = new BundleControllerAction('Catalog', 'Catalog', 'fulltextSearch');
            $controllerResolver = new ControllerLocator($bundleControllerAction);
            $routeResolver = new RouteNameResolver('catalog');

            $service = (new ControllerServiceBuilder())->createServiceForController(
                $this->getApplication(),
                Locator::getInstance(),
                $bundleControllerAction,
                $controllerResolver,
                $routeResolver
            );

            return [
                '_controller' => $service,
                '_route' => $routeResolver->resolve(),
            ];
        }
        throw new ResourceNotFoundException();
    }

    /**
     * @return UrlMapperInterface
     */
    private function getUrlMapper()
    {
        return $this->getDependencyContainer()->createUrlMapper();
    }

    /**
     * @return Request
     */
    private function getRequest()
    {
        $application = $this->getApplication();
        $request = ($application['request_stack']) ? $application['request_stack']->getCurrentRequest() : $application['request'];

        return $request;
    }

    /**
     * @return Application
     */
    private function getApplication()
    {
        return $this->getDependencyContainer()->createApplication();
    }

}
