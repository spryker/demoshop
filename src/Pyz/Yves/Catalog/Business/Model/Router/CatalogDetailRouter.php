<?php

namespace Pyz\Yves\Catalog\Business\Model\Router;

use Spryker\Client\Catalog\Model\Exception\ProductNotFoundException;
use Spryker\Yves\Application\Routing\AbstractRouter;
use Spryker\Yves\Kernel\BundleControllerAction;
use Spryker\Yves\Kernel\Controller\RouteNameResolver;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class CatalogDetailRouter extends AbstractRouter
{

    /**
     * @param string $name
     * @param array $parameters
     * @param bool|string $referenceType
     *
     * @return void
     */
    public function generate($name, $parameters = [], $referenceType = self::ABSOLUTE_PATH)
    {
        throw new RouteNotFoundException();
    }

    /**
     * @param string $pathinfo
     *
     * @return array
     */
    public function match($pathinfo)
    {
        try {
            // @TODO get product data
            $product = [];

            $bundleControllerAction = new BundleControllerAction('Catalog', 'CatalogController', 'detail');
            $routeResolver = new RouteNameResolver('catalog/detail');

            $service = $this->createServiceForController($this->app, $bundleControllerAction, $routeResolver);

            return [
                '_controller' => $service,
                '_route' => $routeResolver->resolve(),
                'product' => $product,
            ];
        } catch (ProductNotFoundException $exception) {
        }
        throw new ResourceNotFoundException();
    }

    /**
     * @param string $url
     *
     * @return array
     */
    public function redirectToCorrectUrl($url)
    {
        return [
            '_controller' => function ($url) {
                return new RedirectResponse($url, 301);
            },
            '_route' => null,
            'url' => $url,
        ];
    }

}
