<?php

namespace Pyz\Yves\Catalog\Business\Model\Router;

use Silex\Application;
use ProjectA\Yves\Application\Business\Routing\AbstractRouter;
use ProjectA\Yves\Catalog\Business\Model\UrlMapper;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use ProjectA\Shared\Application\Business\Controller\ServiceControllerBuilder;
use ProjectA\Yves\Application\Business\Controller\ControllerResolver;

/**
 * @package Pyz\Yves\Catalog\Business\Model\Router
 */
class SearchRouter extends AbstractRouter
{

    /**
     * {@inheritdoc}
     */
    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if ('/search' === $name) {
            $facetConfig = $this->factory->createCatalogModelFacetConfig();
            $request = ($this->app['request_stack'])? $this->app['request_stack']->getCurrentRequest():$this->app['request'];
            $requestParameters = $request->query->all();
            //if no page is provided we generate a url to change the filter and therefore want to reset the page
            //TODO @see ProjectA\Yves\Catalog\Business\Model\AbstractSearch Line 77
            //     same todo to put parameter name into constant
            if (!isset($parameters['page']) && isset($requestParameters['page'])) {
                unset($requestParameters['page']);
            }
            $pathInfo = UrlMapper::generateUrlFromParameters(
                UrlMapper::mergeParameters($requestParameters, $parameters, $facetConfig),
                $facetConfig
            );
            $pathInfo = $name . $pathInfo;

            return $this->getUrlOrPathForType($pathInfo, $referenceType);
        }
        throw new RouteNotFoundException;
    }

    /**
     * {@inheritdoc}
     */
    public function match($pathinfo)
    {
        //TODO handle "/catalog/" to show everything if needed
//        if ($pathinfo != '/' && substr($pathinfo, -5) != '.html') {

        if ('/search' === $pathinfo) {
            $facetConfig = $this->factory->createCatalogModelFacetConfig();
            $request = ($this->app['request_stack'])? $this->app['request_stack']->getCurrentRequest():$this->app['request'];
            UrlMapper::injectParametersFromUrlIntoRequest(
                $pathinfo,
                $request, // TODO Change to RequestStack as of Symfony 2.4
                $facetConfig
            );

            $resolver = new ControllerResolver('Catalog', 'Catalog', 'fulltextSearch');
            $service = (new ServiceControllerBuilder())->createServiceForController($this->app, $resolver);

            return [
                '_controller' => $service,
                '_route' => $resolver->getRouteName(),
                'facetConfig' => $facetConfig
            ];
        }
        throw new ResourceNotFoundException();
    }

}