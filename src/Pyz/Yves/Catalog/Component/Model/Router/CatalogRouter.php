<?php
namespace Pyz\Yves\Catalog\Component\Model\Router;

use ProjectA\Yves\Catalog\Component\Model\Catalog;
use ProjectA\Yves\Catalog\Component\Model\Exception\ProductNotFoundException;
use ProjectA\Yves\Library\Silex\Application;
use ProjectA\Yves\Library\Silex\Controller\ControllerProvider;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouterInterface;

class CatalogRouter implements RouterInterface
{
    /**
     * @var RequestContext
     */
    protected $context;

    /**
     * @var Application
     */
    protected $app;

    /**
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * {@inheritdoc}
     */
    public function setContext(RequestContext $context)
    {
        $this->context = $context;
    }

    /**
     * {@inheritdoc}
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * {@inheritdoc}
     */
    public function getRouteCollection()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {

    }

    /**
     * {@inheritdoc}
     */
    public function match($pathinfo)
    {
        if (($parameters = $this->matchDetailUrl($pathinfo)) !== null) {
            return $parameters;
        }

        throw new ResourceNotFoundException();
    }

    /**
     * @param string $pathinfo
     * @return array
     */
    public function matchDetailUrl($pathinfo)
    {
        if (substr($pathinfo, -5) === '.html' && preg_match('~.+-(\d+)\.html~i', $pathinfo, $matches)) {
            try {
                $product = Catalog::createCatalogProduct($matches[1], $this->app->getStorageKeyValue());
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
        return null;
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
