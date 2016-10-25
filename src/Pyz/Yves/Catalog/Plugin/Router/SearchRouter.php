<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Catalog\Plugin\Router;

use Spryker\Yves\Application\Routing\AbstractRouter;
use Spryker\Yves\Kernel\BundleControllerAction;
use Spryker\Yves\Kernel\Controller\RouteNameResolver;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

/**
 * @method \Pyz\Yves\Catalog\CatalogFactory getFactory()
 */
class SearchRouter extends AbstractRouter
{

    const SEARCH_PATH = '/search';
    const PARAMETER_PAGE = 'page';

    /**
     * {@inheritdoc}
     * @throws \Symfony\Component\Routing\Exception\RouteNotFoundException
     */
    public function generate($name, $parameters = [], $referenceType = self::ABSOLUTE_PATH)
    {
        if ($name === self::SEARCH_PATH) {
            $request = $this->getRequest();
            $requestParameters = $request->query->all();
            //if no page is provided we generate a url to change the filter and therefore want to reset the page
            if (!isset($parameters[self::PARAMETER_PAGE]) && isset($requestParameters[self::PARAMETER_PAGE])) {
                unset($requestParameters[self::PARAMETER_PAGE]);
            }
            $mergedParameters = $this
                ->getUrlMapperPlugin()
                ->mergeParameters($requestParameters, $parameters);

            $pathInfo = $this
                ->getUrlMapperPlugin()
                ->generateUrlFromParameters($mergedParameters);

            $pathInfo = $name . $pathInfo;

            return $this->getUrlOrPathForType($pathInfo, $referenceType);
        }
        throw new RouteNotFoundException();
    }

    /**
     * {@inheritdoc}
     * @throws \Symfony\Component\Routing\Exception\ResourceNotFoundException
     */
    public function match($pathinfo)
    {
        if ($pathinfo === self::SEARCH_PATH) {
            $bundleControllerAction = new BundleControllerAction('Catalog', 'Catalog', 'fulltextSearch');
            $routeResolver = new RouteNameResolver('catalog');

            $service = $this->createServiceForController($this->getApplication(), $bundleControllerAction, $routeResolver);

            return [
                '_controller' => $service,
                '_route' => $routeResolver->resolve(),
            ];
        }
        throw new ResourceNotFoundException();
    }

    /**
     * @return \Pyz\Yves\Collector\Plugin\UrlMapperPlugin
     */
    private function getUrlMapperPlugin()
    {
        return $this->getFactory()->createUrlMapperPlugin();
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    private function getRequest()
    {
        $application = $this->getApplication();
        $request = ($application['request_stack']) ? $application['request_stack']->getCurrentRequest() : $application['request'];

        return $request;
    }

    /**
     * @return \Silex\Application
     */
    private function getApplication()
    {
        return $this->getFactory()->createApplication();
    }

}
