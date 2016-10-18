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
use Spryker\Yves\Product\Mapper\StorageProductMapperInterface;
use Spryker\Yves\ProductCategory\Mapper\StorageProductCategoryMapperInterface;
use Spryker\Yves\ProductImage\Mapper\StorageImageMapperInterface;

class ProductResourceCreator extends AbstractResourceCreator
{

    /**
     * @var \Spryker\Yves\Product\Mapper\StorageProductMapperInterface
     */
    protected $storageProductMapper;

    /**
     * @var \Spryker\Shared\Kernel\LocatorLocatorInterface
     */
    protected $locator;

    /**
     * @var \Spryker\Yves\ProductImage\Mapper\StorageImageMapperInterface
     */
    protected $storageImageMapper;

    /**
     * @var \Spryker\Yves\ProductCategory\Mapper\StorageProductCategoryMapperInterface
     */
    protected $storageProductCategoryMapper;

    /**
     * @param \Spryker\Yves\Product\Mapper\StorageProductMapperInterface $storageProductMapper
     * @param \Spryker\Yves\ProductImage\Mapper\StorageImageMapperInterface $storageImageMapper
     * @param \Spryker\Yves\ProductCategory\Mapper\StorageProductCategoryMapperInterface $storageProductCategoryMapper
     * @param \Spryker\Shared\Kernel\LocatorLocatorInterface $locator
     */
    public function __construct(
        StorageProductMapperInterface $storageProductMapper,
        StorageImageMapperInterface $storageImageMapper,
        StorageProductCategoryMapperInterface $storageProductCategoryMapper,
        LocatorLocatorInterface $locator
    ) {
        $this->storageProductMapper = $storageProductMapper;
        $this->locator = $locator;
        $this->storageImageMapper = $storageImageMapper;
        $this->storageProductCategoryMapper = $storageProductCategoryMapper;
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

        $storageProductTransfer = $this->storageProductMapper->mapStorageProduct($data, $this->getSelectedAttributes($application));
        $storageProductTransfer = $this->storageImageMapper->mapProductImages($storageProductTransfer);
        $storageProductTransfer = $this->storageProductCategoryMapper->mapProductCategories($storageProductTransfer, $data);

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

    /**
     * @param \Silex\Application $application
     *
     * @return array
     */
    protected function getSelectedAttributes(Application $application)
    {
        return $this->getRequest($application)->query->get('attribute', []);
    }

}
