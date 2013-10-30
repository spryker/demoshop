<?php
namespace Pyz\Yves\Catalog\Component\Model\Router;

use ProjectA\Yves\Catalog\Component\Model\Exception\ProductNotFoundException;
use ProjectA\Yves\Library\Silex\Routing\AbstractRouter;
use ProjectA\Yves\Library\Silex\Controller\ControllerProvider;
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
        throw new RouteNotFoundException;
    }

    /**
     * {@inheritdoc}
     */
    public function match($pathinfo)
    {
        if (substr($pathinfo, -5) === '.html' && preg_match('~.+-(\d+)\.html~i', $pathinfo, $matches)) {
            try {
                $product = $this->factory->createCatalogModelCatalog()->getProductDataById($matches[1], $this->app->getStorageKeyValue());
//                if ($product['url'] != $pathinfo) {
//                    return $this->redirectToCorrectUrl($product['url']);
//                }
                $service = ControllerProvider::createServiceForController($this->app, 'catalog/detail', 'CatalogController', 'detail', '\\Pyz\\Yves\\Catalog\\Module');
                return [
                    '_controller' => $service,
                    '_route' => 'catalog/detail',
                    'product' => $product
                ];
            } catch (ProductNotFoundException $exception) {
            }
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
            '_controller' => function ($url) { return new RedirectResponse($url, 301); },
            '_route' => null,
            'url' => $url
        ];
    }
}
