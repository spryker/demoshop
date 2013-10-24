<?php
namespace Pyz\Yves\Catalog\Component\Model\Router;

use ProjectA\Yves\Catalog\Component\Model\Catalog;
use ProjectA\Yves\Catalog\Component\Model\Exception\ProductNotFoundException;
use ProjectA\Yves\Library\DependencyInjection\FactoryInterface;
use ProjectA\Yves\Library\DependencyInjection\FactoryTrait;
use ProjectA\Yves\Library\Silex\Application;
use ProjectA\Yves\Library\Silex\Controller\ControllerProvider;
use Pyz\Yves\Catalog\Component\Model\FacetConfig;
use Pyz\Yves\Catalog\Component\Model\FacetSearch;
use Pyz\Yves\Application\Module\Bootstrap;
use Pyz\Yves\Catalog\Component\Model\UrlMapper;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouterInterface;

/**
 * @package Pyz\Yves\Catalog\Component\Model\Router
 */
class CatalogRouter implements RouterInterface, FactoryInterface
{

    use FactoryTrait;

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

//        if ($name == 'catalog') {
//            while (ob_get_level()) {
//                ob_end_clean();
//            }
//
//            //url schema
//            $request = Bootstrap::getRequest();
//
//            $parameters = [];
//            parse_str($this->context->getQueryString(), $parameters);
//
//            echo PHP_EOL.'<hr /><pre>'; var_dump($this->context->getQueryString()); echo __CLASS__.' '.__FILE__ . ':'.__LINE__.''; echo '</pre><hr />'.PHP_EOL;
//            echo PHP_EOL.'<hr /><pre>'; var_dump($parameters); echo __CLASS__.' '.__FILE__ . ':'.__LINE__.''; echo '</pre><hr />'.PHP_EOL;
//            echo PHP_EOL.'<hr /><pre>'; var_dump($request->query); echo __CLASS__.' '.__FILE__ . ':'.__LINE__.''; echo '</pre><hr />'.PHP_EOL;
//            echo PHP_EOL.'<hr /><pre>'; var_dump($name); echo __CLASS__.' '.__FILE__ . ':'.__LINE__.''; echo '</pre><hr />'.PHP_EOL;
//            echo PHP_EOL.'<hr /><pre>'; var_dump($parameters); echo __CLASS__.' '.__FILE__ . ':'.__LINE__.''; echo '</pre><hr />'.PHP_EOL;
//            echo PHP_EOL.'<hr /><pre>'; var_dump($referenceType); echo __CLASS__.' '.__FILE__ . ':'.__LINE__.''; echo '</pre><hr />'.PHP_EOL; exit();
//        }

        throw new RouteNotFoundException;
    }

    /**
     * {@inheritdoc}
     */
    public function match($pathinfo)
    {
        if ($pathinfo != '/' && substr($pathinfo, -5) != '.html') {

            $service = ControllerProvider::createServiceForController(
                $this->app,
                'catalog/index',
                'CatalogController',
                'index',
                '\\Pyz\\Yves\\Catalog\\Module'
            );

            $facetConfig = $this->factory->createCatalogModelFacetConfig();

            UrlMapper::injectParametersFromUrlIntoRequest(
                $pathinfo,
                Bootstrap::getRequest(),
                $facetConfig
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
