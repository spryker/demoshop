<?php

namespace Pyz\Yves\Catalog\Business\Model\Router;

use Spryker\Shared\Application\Communication\ControllerServiceBuilder;
use Spryker\Yves\Application\Routing\AbstractRouter;
use Spryker\Yves\Catalog\Business\Model\Exception\ProductNotFoundException;
use Spryker\Yves\Kernel\BundleControllerAction;
use Spryker\Yves\Kernel\Controller\RouteNameResolver;
use Spryker\Yves\Kernel\ControllerLocator;
use Spryker\Yves\Kernel\Locator;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class CatalogDetailRouter extends AbstractRouter
{

    /**
     * {@inheritdoc}
     */
    public function generate($name, $parameters = [], $referenceType = self::ABSOLUTE_PATH)
    {
        throw new RouteNotFoundException();
    }

    /**
     * {@inheritdoc}
     */
    public function match($pathinfo)
    {
        try {
            $product = $this->factory->createCatalogDependencyContainer()
                ->createCatalogModel($this->app->getStorageKeyValue())
                ->getProductDataByUrl($pathinfo);

            $bundleControllerAction = new BundleControllerAction('Catalog', 'CatalogController', 'detail');
            $controllerResolver = new ControllerLocator($bundleControllerAction);
            $routeResolver = new RouteNameResolver('catalog/detail');

            $service = (new ControllerServiceBuilder())->createServiceForController(
                $this->app,
                Locator::getInstance(),
                $bundleControllerAction,
                $controllerResolver,
                $routeResolver
            );

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
