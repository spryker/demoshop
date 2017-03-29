<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Api;

use Spryker\Zed\Api\ApiDependencyProvider as SprykerApiDependencyProvider;
use Spryker\Zed\CustomerApi\Communication\Plugin\Api\CustomerApiPlugin;
use Spryker\Zed\ProductApi\Communication\Plugin\Api\ProductApiPlugin;

class ApiDependencyProvider extends SprykerApiDependencyProvider
{

    /**
     * @return \Spryker\Zed\Api\Dependency\Plugin\ApiPluginInterface[]
     */
    protected function getApiPluginCollection()
    {
        return [
            new CustomerApiPlugin(),
            new ProductApiPlugin(),
        ];
    }

}
