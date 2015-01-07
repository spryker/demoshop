<?php
namespace Pyz\Yves\Catalog\Business\Model\Router;

use ProjectA\Shared\Application\Business\Controller\ServiceControllerBuilder;
use ProjectA\Yves\Application\Business\Controller\ControllerResolver;
use ProjectA\Yves\Catalog\Business\Model\Exception\ProductNotFoundException;
use ProjectA\Yves\Application\Business\Routing\AbstractRouter;
use ProjectA\Yves\Application\Business\Controller\ControllerProvider;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

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
            $product = $this->factory->createCatalogModelCatalog()->getProductDataByUrl($pathinfo, $this->app->getStorageKeyValue());
            $resolver = new ControllerResolver('Catalog', 'Catalog', 'detail');
            $service = (new ServiceControllerBuilder())->createServiceForController($this->app, $resolver);

            return [
                '_controller' => $service,
                '_route' => $resolver->getRouteName(),
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
