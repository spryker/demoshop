<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Api;

use Spryker\Zed\Api\ApiDependencyProvider as SprykerApiDependencyProvider;
use Spryker\Zed\CustomerApi\Communication\Plugin\Api\CustomerApiResourcePlugin;
use Spryker\Zed\CustomerApi\Communication\Plugin\Api\CustomerApiValidatorPlugin;
use Spryker\Zed\ProductApi\Communication\Plugin\Api\ProductApiResourcePlugin;
use Spryker\Zed\ProductApi\Communication\Plugin\Api\ProductApiValidatorPlugin;

class ApiDependencyProvider extends SprykerApiDependencyProvider
{
    /**
     * @return \Spryker\Zed\Api\Dependency\Plugin\ApiResourcePluginInterface[]
     */
    protected function getApiResourcePluginCollection()
    {
        return [
            new CustomerApiResourcePlugin(),
            new ProductApiResourcePlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\Api\Dependency\Plugin\ApiValidatorPluginInterface[]
     */
    protected function getApiValidatorPluginCollection()
    {
        return [
            new CustomerApiValidatorPlugin(),
            new ProductApiValidatorPlugin(),
        ];
    }
}
