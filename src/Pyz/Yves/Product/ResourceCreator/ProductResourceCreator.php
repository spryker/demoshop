<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product\ResourceCreator;

use Pyz\Yves\Collector\Creator\AbstractResourceCreator;
use Pyz\Yves\Product\Mapper\StorageImageMapperInterface;
use Pyz\Yves\Product\Mapper\StorageProductCategoryMapperInterface;
use Pyz\Yves\Product\Mapper\StorageProductMapperInterface;
use Silex\Application;
use Spryker\Shared\Product\ProductConfig;
use Spryker\Yves\Kernel\BundleControllerAction;
use Spryker\Yves\Kernel\Controller\BundleControllerActionRouteNameResolver;

class ProductResourceCreator extends AbstractResourceCreator
{

    /**
     * @var \Pyz\Yves\Product\Mapper\StorageProductMapperInterface
     */
    protected $storageProductMapper;

    /**
     * @var \Pyz\Yves\Product\Mapper\StorageImageMapperInterface
     */
    protected $storageImageMapper;

    /**
     * @var \Pyz\Yves\Product\Mapper\StorageProductCategoryMapperInterface
     */
    protected $storageProductCategoryMapper;

    /**
     * @param \Pyz\Yves\Product\Mapper\StorageProductMapperInterface $storageProductMapper
     * @param \Pyz\Yves\Product\Mapper\StorageImageMapperInterface $storageImageMapper
     * @param \Pyz\Yves\Product\Mapper\StorageProductCategoryMapperInterface $storageProductCategoryMapper
     */
    public function __construct(
        StorageProductMapperInterface $storageProductMapper,
        StorageImageMapperInterface $storageImageMapper,
        StorageProductCategoryMapperInterface $storageProductCategoryMapper
    ) {
        $this->storageProductMapper = $storageProductMapper;
        $this->storageImageMapper = $storageImageMapper;
        $this->storageProductCategoryMapper = $storageProductCategoryMapper;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return ProductConfig::RESOURCE_TYPE_PRODUCT_ABSTRACT;
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
