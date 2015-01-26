<?php

namespace Pyz\Yves\Catalog\Business\Model\Router;

use ProjectA\Shared\Application\Communication\ControllerServiceBuilder;

use ProjectA\Yves\Application\Business\Routing\AbstractRouter;
use ProjectA\Yves\Catalog\Business\Model\Exception\ProductNotFoundException;
use ProjectA\Yves\Kernel\Communication\ControllerLocator;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

/**
 * Class CatalogDetailRouter
 * @package Pyz\Yves\Catalog\Business\Model\Router
 */
class CatalogDetailRouter extends AbstractRouter
{

    /**
     * {@inheritdoc}
     */
    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
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

            $resolver = new ControllerResolver('Catalog', 'CatalogController', 'detail');
            $service = (new ControllerServiceBuilder())->createServiceForController($this->app, $resolver);

            return [
                '_controller' => $service,
                '_route' => 'catalog/detail',
                'product' => $product
            ];
        } catch (ProductNotFoundException $exception) {
        }
        throw new ResourceNotFoundException();
    }

    /**
     * @param string $url
     * @return array
     */
    public function redirectToCorrectUrl($url)
    {
        return [
            '_controller' => function ($url) {
                return new RedirectResponse($url, 301);
            },
            '_route' => null,
            'url' => $url
        ];
    }
}
