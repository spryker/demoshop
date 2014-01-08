<?php
namespace Pyz\Yves\Catalog\Component\Model\Router;

use ProjectA\Yves\Library\Silex\Routing\AbstractRouter;
use ProjectA\Yves\Library\Silex\Application;
use ProjectA\Yves\Library\Silex\Controller\ControllerProvider;
use ProjectA\Yves\Catalog\Component\Model\UrlMapper;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

/**
 * @package Pyz\Yves\Catalog\Component\Model\Router
 */
class CatalogRouter extends AbstractRouter
{
    /**
     * {@inheritdoc}
     */
    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if ('catalog' === $name) {
            $facetConfig = $this->factory->createCatalogModelFacetConfig();
            $request = ($this->app['request_stack'])? $this->app['request_stack']->getCurrentRequest():$this->app['request'];
            $requestParameters = $request->query->all();

            //if no page is provided we generate a url to change the filter and therefore want to reset the page
            //TODO @see ProjectA\Yves\Catalog\Component\Model\AbstractSearch Line 77
            //     same todo to put parameter name into constant
            if (!isset($parameters['page']) && isset($requestParameters['page'])) {
                unset($requestParameters['page']);
            }

            $pathInfo = UrlMapper::generateUrlFromParameters(
                UrlMapper::mergeParameters($requestParameters, $parameters, $facetConfig),
                $facetConfig
            );

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

        if ($pathinfo != '/' && substr($pathinfo, -5) != '.html') {

            $facetConfig = $this->factory->createCatalogModelFacetConfig();
            $request = ($this->app['request_stack'])? $this->app['request_stack']->getCurrentRequest():$this->app['request'];

            UrlMapper::injectParametersFromUrlIntoRequest(
                $pathinfo,
                $request, // TODO Change to RequestStack as of Symfony 2.4
                $facetConfig
            );

            $service = ControllerProvider::createServiceForController(
                $this->app,
                'catalog/index',
                'CatalogController',
                'index',
                '\\ProjectA\\Yves\\Catalog\\Module'
            );

            return [
                '_controller' => $service,
                '_route' => 'catalog/index',
                'facetConfig' => $facetConfig
            ];
        }

        throw new ResourceNotFoundException();
    }
}
