<?php
namespace Pyz\Yves\Catalog\Component\Model\Router;

use ProjectA\Yves\Library\Silex\Routing\AbstractRouter;
use ProjectA\Yves\Library\DependencyInjection\FactoryTrait;
use ProjectA\Yves\Library\Silex\Application;
use ProjectA\Yves\Library\Silex\Controller\ControllerProvider;
use Pyz\Yves\Application\Module\Bootstrap;
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
        if ($name == 'catalog') {
            $facetConfig = $this->factory->createCatalogModelFacetConfig();
            $request = Bootstrap::getRequest();
            $requestParameters = iterator_to_array($request->query->getIterator());

            $url = UrlMapper::generateUrlFromParameters(
                UrlMapper::mergeParameters($requestParameters, $parameters, $facetConfig),
                $facetConfig
            );

            if ($referenceType === self::ABSOLUTE_PATH) {
                return $this->getSchemeAndPort() . $url;
            } else {
                return $url;
            }
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

            UrlMapper::injectParametersFromUrlIntoRequest(
                $pathinfo,
                Bootstrap::getRequest(),
                $facetConfig
            );

            $service = ControllerProvider::createServiceForController(
                $this->app,
                'catalog/index',
                'CatalogController',
                'index',
                '\\Pyz\\Yves\\Catalog\\Module'
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
