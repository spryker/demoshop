<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Api;

use Spryker\Zed\Api\ApiDependencyProvider as SprykerApiDependencyProvider;
use Spryker\Zed\CustomerApi\Communication\Plugin\Api\CustomerApiPlugin;
use Spryker\Zed\CustomerApi\Communication\Plugin\Api\CustomerApiValidatorPlugin;
use Spryker\Zed\ProductApi\Communication\Plugin\Api\ProductApiPlugin;
use Spryker\Zed\ProductApi\Communication\Plugin\Api\ProductApiValidatorPlugin;

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

    /**
     * @return \Spryker\Zed\Api\Dependency\Plugin\ApiPluginInterface[]
     */
    protected function getApiValidatorPluginCollection()
    {
        return [
            new CustomerApiValidatorPlugin(),
            new ProductApiValidatorPlugin(),
        ];
    }

}
