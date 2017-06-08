<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductSet\ResourceCreator;

use Generated\Shared\Transfer\ProductSetStorageTransfer;
use Pyz\Yves\Collector\Creator\AbstractResourceCreator;
use Pyz\Yves\Product\Dependency\Plugin\StorageProductMapperPluginInterface;
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
     * @var \Pyz\Yves\Product\Dependency\Plugin\StorageProductMapperPluginInterface
     */
    protected $storageProductMapperPlugin;

    /**
     * @param \Spryker\Client\Product\ProductClientInterface $productClient
     * @param \Pyz\Yves\ProductSet\Mapper\ProductSetStorageMapperInterface $productSetStorageMapper
     * @param \Pyz\Yves\Product\Dependency\Plugin\StorageProductMapperPluginInterface $storageProductMapperPlugin
     */
    public function __construct(
        ProductClientInterface $productClient,
        ProductSetStorageMapperInterface $productSetStorageMapper,
        StorageProductMapperPluginInterface $storageProductMapperPlugin
    ) {
        $this->productSetStorageMapper = $productSetStorageMapper;
        $this->productClient = $productClient;
        $this->storageProductMapperPlugin = $storageProductMapperPlugin;
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
        $storageProductTransfers = [];
        foreach ($productSetStorageTransfer->getIdProductAbstracts() as $idProductAbstract) {
            $productAbstractData = $this->productClient->getProductAbstractFromStorageByIdForCurrentLocale($idProductAbstract);

            $storageProductTransfers[] = $this->storageProductMapperPlugin->mapStorageProduct(
                $productAbstractData,
                $this->getSelectedAttributes($application, $idProductAbstract)
            );
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
