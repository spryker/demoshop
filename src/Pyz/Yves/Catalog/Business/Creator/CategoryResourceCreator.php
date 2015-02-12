<?php

namespace Pyz\Yves\Catalog\Business\Creator;

use ProjectA\Shared\Application\Communication\ControllerServiceBuilder;
use ProjectA\Yves\FrontendExporter\Business\Creator\ResourceCreatorInterface;
use ProjectA\Yves\Kernel\Communication\BundleControllerAction;
use ProjectA\Yves\Kernel\Communication\Controller\BundleControllerActionRouteNameResolver;
use ProjectA\Yves\Kernel\Communication\ControllerLocator;
use ProjectA\Yves\Kernel\Locator;
use Pyz\Yves\Catalog\Business\Model\FacetConfig;
use Silex\Application;

/**
 * Class CategoryResourceCreator
 * @package Pyz\Yves\Catalog\Business\Creator
 */
class CategoryResourceCreator implements ResourceCreatorInterface
{
    /**
     * @var FacetConfig
     */
    protected $facetConfig;

    /**
     * @param FacetConfig $facetConfig
     */
    public function __construct(FacetConfig $facetConfig)
    {
        $this->facetConfig = $facetConfig;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return 'category';
    }

    /**
     * @param Application $app
     * @param $data
     * @return array
     */
    public function createResource(Application $app, $data)
    {
        $bundleControllerAction = new BundleControllerAction('Catalog', 'Catalog', 'index');
        $controllerResolver = new ControllerLocator($bundleControllerAction);
        $routeResolver = new BundleControllerActionRouteNameResolver($bundleControllerAction);

        $service = (new ControllerServiceBuilder())->createServiceForController(
            $app,
            new Locator(),
            $bundleControllerAction,
            $controllerResolver,
            $routeResolver
        );

        return [
            '_controller' => $service,
            '_route' => $routeResolver->resolve(),
            'category' => $data,
            'facetConfig' => $this->facetConfig,
        ];
    }
}
