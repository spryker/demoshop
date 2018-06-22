<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Collector\Plugin\Router;

use Silex\Application;
use Spryker\Shared\Application\Communication\ControllerServiceBuilder;
use Spryker\Shared\Kernel\Communication\BundleControllerActionInterface;
use Spryker\Yves\Application\Routing\AbstractRouter;
use Spryker\Yves\Kernel\BundleControllerAction;
use Spryker\Yves\Kernel\ClassResolver\Controller\ControllerResolver;
use Spryker\Yves\Kernel\Controller\BundleControllerActionRouteNameResolver;
use SprykerShop\Yves\ShopRouterExtension\Dependency\Plugin\ResourceCreatorPluginInterface;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

/**
 * @method \Pyz\Yves\Collector\CollectorFactory getFactory()
 */
class StorageRouter extends AbstractRouter
{
    const PARAMETER_PAGE = 'page';

    /**
     * {@inheritdoc}
     * @throws \Symfony\Component\Routing\Exception\RouteNotFoundException
     */
    public function generate($name, $parameters = [], $referenceType = self::ABSOLUTE_PATH)
    {
        $urlMatcher = $this->getFactory()->getUrlClient();
        if ($urlMatcher->matchUrl($name, $this->getApplication()['locale'])) {
            $request = $this->getRequest();
            $requestParameters = $request->query->all();
            //if no page is provided we generate a url to change the filter and therefore want to reset the page
            if (!isset($parameters[self::PARAMETER_PAGE]) && isset($requestParameters[self::PARAMETER_PAGE])) {
                unset($requestParameters[self::PARAMETER_PAGE]);
            }

            $mergedParameters = $this
                ->getFactory()
                ->createParameterMerger()
                ->mergeParameters($requestParameters, $parameters);

            $pathInfo = $this
                ->getFactory()
                ->createUrlMapper()
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
        $defaultLocalePrefix = '/' . mb_substr($this->getApplication()['locale'], 0, 2);

        if ($defaultLocalePrefix === $pathinfo || $defaultLocalePrefix . '/' === $pathinfo) {
            throw new ResourceNotFoundException();
        }

        if ($pathinfo !== '/') {
            $urlMatcher = $this
                ->getFactory()
                ->getUrlClient();
            $urlDetails = $urlMatcher->matchUrl($pathinfo, $this->getApplication()['locale']);

            if ($urlDetails === false) {
                $urlDetails = $urlMatcher->matchUrl($defaultLocalePrefix . $pathinfo, $this->getApplication()['locale']);
            }

            if ($urlDetails) {
                $resourceCreators = $this
                    ->getFactory()
                    ->getResourceCreators();
                foreach ($resourceCreators as $resourceCreator) {
                    if ($urlDetails['type'] === $resourceCreator->getType()) {
                        if ($resourceCreator instanceof ResourceCreatorPluginInterface) {
                            return $this->createResource($resourceCreator, $urlDetails['data']);
                        }
                        return $resourceCreator->createResource($this->getApplication(), $urlDetails['data']);
                    }
                }
            }
        }

        throw new ResourceNotFoundException();
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    protected function getRequest()
    {
        $application = $this->getApplication();
        $request = ($application['request_stack']) ? $application['request_stack']->getCurrentRequest() : $application['request'];

        return $request;
    }

    /**
     * @return \Silex\Application
     */
    protected function getApplication()
    {
        return $this->getFactory()->getApplication();
    }

    /**
     * @param \SprykerShop\Yves\ShopRouterExtension\Dependency\Plugin\ResourceCreatorPluginInterface $resourceCreator
     * @param array $data
     *
     * @return array
     */
    protected function createResource(ResourceCreatorPluginInterface $resourceCreator, array $data)
    {
        $bundleControllerAction = new BundleControllerAction($resourceCreator->getModuleName(), $resourceCreator->getControllerName(), $resourceCreator->getActionName());
        $routeResolver = new BundleControllerActionRouteNameResolver($bundleControllerAction);

        $service = $this->createServiceForShopController($this->getApplication(), $bundleControllerAction, $routeResolver);

        $resourceCreatorResult = $resourceCreator->mergeResourceData($data);
        $resourceCreatorResult['_controller'] = $service;
        $resourceCreatorResult['_route'] = $routeResolver->resolve();

        return $resourceCreatorResult;
    }

    /**
     * @param \Silex\Application $application
     * @param \Spryker\Shared\Kernel\Communication\BundleControllerActionInterface $bundleControllerAction
     * @param \Spryker\Yves\Kernel\Controller\BundleControllerActionRouteNameResolver $routeNameResolver
     *
     * @return string
     */
    protected function createServiceForShopController(
        Application $application,
        BundleControllerActionInterface $bundleControllerAction,
        BundleControllerActionRouteNameResolver $routeNameResolver
    ) {
        $controllerResolver = new ControllerResolver();
        $service = (new ControllerServiceBuilder())->createServiceForController(
            $application,
            $bundleControllerAction,
            $controllerResolver,
            $routeNameResolver
        );

        return $service;
    }
}
