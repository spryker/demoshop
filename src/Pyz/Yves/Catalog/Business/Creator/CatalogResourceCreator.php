<?php

namespace Pyz\Yves\Catalog\Business\Creator;

use Pyz\Client\Catalog\Model\FacetConfig;
use Pyz\Yves\Collector\Creator\ResourceCreatorInterface;
use Silex\Application;
use Spryker\Yves\Kernel\BundleControllerAction;
use Spryker\Yves\Kernel\ClassResolver\Controller\ControllerResolver;
use Spryker\Yves\Kernel\Controller\BundleControllerActionRouteNameResolver;
use Spryker\Shared\Application\Communication\ControllerServiceBuilder;
use Spryker\Shared\Category\CategoryConstants;

class CatalogResourceCreator implements ResourceCreatorInterface
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
        return CategoryConstants::RESOURCE_TYPE_CATEGORY_NODE;
    }

    /**
     * @param Application $app
     * @param array $data
     *
     * @return array
     */
    public function createResource(Application $app, array $data)
    {
        $bundleControllerAction = new BundleControllerAction('Catalog', 'Catalog', 'index');
        $controllerLocator = new ControllerResolver($bundleControllerAction);
        $routeResolver = new BundleControllerActionRouteNameResolver($bundleControllerAction);

        $service = (new ControllerServiceBuilder())->createServiceForController(
            $app,
            $bundleControllerAction,
            $controllerLocator,
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
