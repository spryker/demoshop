<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductSet\ResourceCreator;

use Generated\Shared\Transfer\ProductSetStorageTransfer;
use Pyz\Yves\Collector\Creator\AbstractResourceCreator;
use Pyz\Yves\Product\Mapper\StorageImageMapperInterface;
use Pyz\Yves\Product\Mapper\StorageProductAvailabilityMapperInterface;
use Pyz\Yves\Product\Mapper\StorageProductMapperInterface;
use Pyz\Yves\ProductSet\Controller\DetailController;
use Pyz\Yves\ProductSet\Mapper\ProductSetStorageMapperInterface;
use Silex\Application;
use Spryker\Client\Product\ProductClientInterface;
use Spryker\Yves\Kernel\BundleControllerAction;
use Spryker\Yves\Kernel\Controller\BundleControllerActionRouteNameResolver;

class ProductSetResourceCreator extends AbstractResourceCreator
{

    /**
     * @var \Pyz\Yves\ProductSet\Mapper\ProductSetStorageMapperInterface
     */
    protected $productSetStorageMapper;

    /**
     * @var \Spryker\Client\Product\ProductClientInterface
     */
    protected $productClient;

    /**
     * @var \Pyz\Yves\Product\Mapper\StorageProductMapperInterface
     */
    protected $storageProductMapper;

    /**
     * @var \Pyz\Yves\Product\Mapper\StorageImageMapperInterface
     */
    protected $storageImageMapper;

    /**
     * @var \Pyz\Yves\Product\Mapper\StorageProductAvailabilityMapperInterface
     */
    protected $storageProductAvailabilityMapper;

    /**
     * @param \Spryker\Client\Product\ProductClientInterface $productClient
     * @param \Pyz\Yves\ProductSet\Mapper\ProductSetStorageMapperInterface $productSetStorageMapper
     * @param \Pyz\Yves\Product\Mapper\StorageProductMapperInterface $storageProductMapper
     * @param \Pyz\Yves\Product\Mapper\StorageImageMapperInterface $storageImageMapper
     * @param \Pyz\Yves\Product\Mapper\StorageProductAvailabilityMapperInterface $storageProductAvailabilityMapper
     * FIXME: remove cross bundle dependencies
     */
    public function __construct(
        ProductClientInterface $productClient,
        ProductSetStorageMapperInterface $productSetStorageMapper,
        StorageProductMapperInterface $storageProductMapper,
        StorageImageMapperInterface $storageImageMapper,
        StorageProductAvailabilityMapperInterface $storageProductAvailabilityMapper
    ) {
        $this->productClient = $productClient;
        $this->productSetStorageMapper = $productSetStorageMapper;
        $this->storageProductMapper = $storageProductMapper;
        $this->storageImageMapper = $storageImageMapper;
        $this->storageProductAvailabilityMapper = $storageProductAvailabilityMapper;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return 'product_set';
    }

    /**
     * @param \Silex\Application $application
     * @param array $productSetData
     *
     * @return array
     */
    public function createResource(Application $application, array $productSetData)
    {
        $bundleControllerAction = new BundleControllerAction('ProductSet', 'Detail', 'index');
        $routeResolver = new BundleControllerActionRouteNameResolver($bundleControllerAction);
        $service = $this->createServiceForController($application, $bundleControllerAction, $routeResolver);

        $productSetStorageTransfer = $this->productSetStorageMapper->mapDataToTransfer($productSetData);
        $storageProductTransfers = $this->mapStorageProducts($application, $productSetStorageTransfer);

        return [
            '_controller' => $service,
            '_route' => $routeResolver->resolve(),
            'productSetStorageTransfer' => $productSetStorageTransfer,
            'storageProductTransfers' => $storageProductTransfers,
        ];
    }

    /**
     * @param \Silex\Application $application
     * @param \Generated\Shared\Transfer\ProductSetStorageTransfer $productSetStorageTransfer
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer[]
     */
    protected function mapStorageProducts(Application $application, ProductSetStorageTransfer $productSetStorageTransfer)
    {
        // TODO: this logic should come from product client?
        $storageProductTransfers = [];
        foreach ($productSetStorageTransfer->getIdProductAbstracts() as $idProductAbstract) {
            $productAbstractData = $this->productClient->getProductAbstractFromStorageByIdForCurrentLocale($idProductAbstract);

            $storageProductTransfer = $this->storageProductMapper->mapStorageProduct($productAbstractData, $this->getSelectedAttributes($application, $idProductAbstract));
            $storageProductTransfer = $this->storageImageMapper->mapProductImages($storageProductTransfer);
            $storageProductTransfer = $this->storageProductAvailabilityMapper->mapAvailability($storageProductTransfer);

            $storageProductTransfers[] = $storageProductTransfer;
        }

        return $storageProductTransfers;
    }

    /**
     * @param \Silex\Application $application
     * @param int $idProductAbstract
     *
     * @return array
     */
    protected function getSelectedAttributes(Application $application, $idProductAbstract)
    {
        $attributes = $this->getRequest($application)->query->get(DetailController::PARAM_ATTRIBUTE, []);

        return isset($attributes[$idProductAbstract]) ? array_filter($attributes[$idProductAbstract]) : [];
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
