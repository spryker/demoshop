<?php

namespace Pyz\Yves\Catalog\Business\Creator;

use Pyz\Client\Catalog\Service\Model\FacetConfig;
use Pyz\Yves\Collector\Communication\Creator\ResourceCreatorInterface;
use Silex\Application;
use SprykerEngine\Yves\Kernel\Communication\BundleControllerAction;
use SprykerEngine\Yves\Kernel\Communication\Controller\BundleControllerActionRouteNameResolver;
use SprykerEngine\Yves\Kernel\Communication\ControllerLocator;
use SprykerEngine\Yves\Kernel\Locator;
use SprykerFeature\Shared\Application\Communication\ControllerServiceBuilder;
use SprykerFeature\Shared\Category\CategoryConfig;

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
        return CategoryConfig::RESOURCE_TYPE_CATEGORY_NODE;
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
        $controllerResolver = new ControllerLocator($bundleControllerAction);
        $routeResolver = new BundleControllerActionRouteNameResolver($bundleControllerAction);

        $service = (new ControllerServiceBuilder())->createServiceForController(
            $app,
            Locator::getInstance(),
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
