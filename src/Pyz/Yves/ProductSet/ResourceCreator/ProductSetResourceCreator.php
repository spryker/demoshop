<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductSet\ResourceCreator;

use Generated\Shared\Transfer\ProductSetStorageTransfer;
use Pyz\Yves\Collector\Creator\AbstractResourceCreator;
use Silex\Application;
use Spryker\Yves\Kernel\BundleControllerAction;
use Spryker\Yves\Kernel\Controller\BundleControllerActionRouteNameResolver;

class ProductSetResourceCreator extends AbstractResourceCreator
{

    /**
     * @return string
     */
    public function getType()
    {
        return 'product_set';
    }

    /**
     * @param \Silex\Application $application
     * @param array $data
     *
     * @return array
     */
    public function createResource(Application $application, array $data)
    {
        $bundleControllerAction = new BundleControllerAction('ProductSet', 'Detail', 'index');
        $routeResolver = new BundleControllerActionRouteNameResolver($bundleControllerAction);
        $service = $this->createServiceForController($application, $bundleControllerAction, $routeResolver);

        $productSetStorageTransfer = new ProductSetStorageTransfer();
        $productSetStorageTransfer->fromArray($data, true);

        return [
            '_controller' => $service,
            '_route' => $routeResolver->resolve(),
            'productSetStorageTransfer' => $productSetStorageTransfer,
        ];
    }

}
