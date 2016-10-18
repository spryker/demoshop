<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product\ResourceCreator;

use Pyz\Yves\Collector\Creator\AbstractResourceCreator;
use Silex\Application;
use Spryker\Shared\Kernel\LocatorLocatorInterface;
use Spryker\Shared\Product\ProductConstants;
use Spryker\Yves\Kernel\BundleControllerAction;
use Spryker\Yves\Kernel\Controller\BundleControllerActionRouteNameResolver;
use Spryker\Yves\Product\Builder\StorageProductBuilderInterface;
use Spryker\Yves\ProductImage\Builder\StorageImageBuilderInterface;

class ProductResourceCreator extends AbstractResourceCreator
{

    /**
     * @var \Spryker\Yves\Product\Builder\StorageProductBuilderInterface
     */
    protected $storageProductBuilder;

    /**
     * @var \Spryker\Shared\Kernel\LocatorLocatorInterface
     */
    protected $locator;

    /**
     * @var \Pyz\Yves\Product\ResourceCreator\StorageImageBuilderInterface|\Spryker\Yves\ProductImage\Builder\StorageImageBuilderInterface
     */
    protected $storageImageBuilder;

    /**
     * @param \Spryker\Yves\Product\Builder\StorageProductBuilderInterface $storageProductBuilder
     * @param \Spryker\Yves\ProductImage\Builder\StorageImageBuilderInterface $storageImageBuilder
     * @param \Spryker\Shared\Kernel\LocatorLocatorInterface $locator
     */
    public function __construct(
        StorageProductBuilderInterface $storageProductBuilder,
        StorageImageBuilderInterface $storageImageBuilder,
        LocatorLocatorInterface $locator
    ) {
        $this->storageProductBuilder = $storageProductBuilder;
        $this->locator = $locator;
        $this->storageImageBuilder = $storageImageBuilder;
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
        $storageProductTransfer = $this->storageImageBuilder->setSelectedProductDisplayImages($storageProductTransfer);

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
