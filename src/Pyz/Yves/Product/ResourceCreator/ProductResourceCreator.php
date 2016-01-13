<?php

namespace Pyz\Yves\Product\ResourceCreator;

use Pyz\Yves\Collector\Creator\AbstractResourceCreator;
use Pyz\Yves\Collector\Creator\ResourceCreatorInterface;
use Silex\Application;
use Spryker\Shared\Kernel\LocatorLocatorInterface;
use Spryker\Shared\Application\Communication\ControllerServiceBuilder;
use Spryker\Yves\Kernel\BundleControllerAction;
use Spryker\Yves\Kernel\ClassResolver\Controller\ControllerResolver;
use Spryker\Yves\Kernel\Controller\BundleControllerActionRouteNameResolver;
use Pyz\Yves\Product\Builder\FrontendProductBuilderInterface;

class ProductResourceCreator extends AbstractResourceCreator
{

    /**
     * @var FrontendProductBuilderInterface
     */
    protected $productBuilder;

    /**
     * @var LocatorLocatorInterface
     */
    protected $locator;

    /**
     * @param FrontendProductBuilderInterface $productBuilder
     * @param LocatorLocatorInterface $locator
     */
    public function __construct(
        FrontendProductBuilderInterface $productBuilder,
        LocatorLocatorInterface $locator
    ) {
        $this->productBuilder = $productBuilder;
        $this->locator = $locator;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return 'product_abstract';
    }

    /**
     * @param Application $application
     * @param array $data
     *
     * @return array
     */
    public function createResource(Application $application, array $data)
    {
        $bundleControllerAction = new BundleControllerAction('Product', 'Product', 'detail');
        $routeResolver = new BundleControllerActionRouteNameResolver($bundleControllerAction);

        $service = $this->createServiceForController($application, $bundleControllerAction, $routeResolver);
        $product = $this->productBuilder->buildProduct($data);

        return [
            '_controller' => $service,
            '_route' => $routeResolver->resolve(),
            'product' => $product,
        ];
    }

}
