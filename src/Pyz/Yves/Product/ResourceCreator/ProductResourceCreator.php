<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product\ResourceCreator;

use Pyz\Yves\Collector\Creator\AbstractResourceCreator;
use Pyz\Yves\Product\Builder\StorageProductBuilderInterface;
use Silex\Application;
use Spryker\Shared\Kernel\LocatorLocatorInterface;
use Spryker\Shared\Product\ProductConstants;
use Spryker\Yves\Kernel\BundleControllerAction;
use Spryker\Yves\Kernel\Controller\BundleControllerActionRouteNameResolver;

class ProductResourceCreator extends AbstractResourceCreator
{

    /**
     * @var \Pyz\Yves\Product\Builder\StorageProductBuilderInterface
     */
    protected $storageProductBuilder;

    /**
     * @var \Spryker\Shared\Kernel\LocatorLocatorInterface
     */
    protected $locator;

    /**
     * @param \Pyz\Yves\Product\Builder\StorageProductBuilderInterface $storageProductBuilder
     * @param \Spryker\Shared\Kernel\LocatorLocatorInterface $locator
     */
    public function __construct(
        StorageProductBuilderInterface $storageProductBuilder,
        LocatorLocatorInterface $locator
    ) {
        $this->storageProductBuilder = $storageProductBuilder;
        $this->locator = $locator;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return ProductConstants::RESOURCE_TYPE_PRODUCT_ABSTRACT;
    }

    /**
     * @param \Silex\Application $application
     * @param array $data
     *
     * @return array
     */
    public function createResource(Application $application, array $data)
    {
        $bundleControllerAction = new BundleControllerAction('Product', 'Product', 'detail');
        $routeResolver = new BundleControllerActionRouteNameResolver($bundleControllerAction);

        $service = $this->createServiceForController($application, $bundleControllerAction, $routeResolver);

        $attribute = $this->getRequest($application)->query->get('attribute', []);
        $storageProductTransfer = $this->storageProductBuilder->buildProduct($data, $attribute);

        return [
            '_controller' => $service,
            '_route' => $routeResolver->resolve(),
            'storageProductTransfer' => $storageProductTransfer,
        ];
    }

    /**
     * @param \Silex\Application $application
     *
     * @return \Symfony\Component\HttpFoundation\Request
     */
    protected function getRequest(Application $application)
    {
        return $application['request'];
    }

}
