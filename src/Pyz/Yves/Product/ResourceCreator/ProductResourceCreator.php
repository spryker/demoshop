<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product\ResourceCreator;

use Pyz\Yves\Collector\Creator\AbstractResourceCreator;
use Pyz\Yves\Product\Dependency\Plugin\StorageProductMapperPluginInterface;
use Silex\Application;
use Spryker\Shared\Product\ProductConfig;
use Spryker\Yves\Kernel\BundleControllerAction;
use Spryker\Yves\Kernel\Controller\BundleControllerActionRouteNameResolver;

class ProductResourceCreator extends AbstractResourceCreator
{

    /**
     * @var \Pyz\Yves\Product\Dependency\Plugin\StorageProductMapperPluginInterface
     */
    protected $storageProductMapperPlugin;

    /**
     * @param \Pyz\Yves\Product\Dependency\Plugin\StorageProductMapperPluginInterface $storageProductMapperPlugin
     */
    public function __construct(StorageProductMapperPluginInterface $storageProductMapperPlugin)
    {
        $this->storageProductMapperPlugin = $storageProductMapperPlugin;
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

        $storageProductTransfer = $this->storageProductMapperPlugin->mapStorageProduct(
            $data,
            $this->getSelectedAttributes($application)
        );

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
        return array_filter($this->getRequest($application)->query->get('attribute', []));
    }

}
