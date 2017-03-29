<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Api;

use Spryker\Zed\Api\ApiDependencyProvider as SprykerApiDependencyProvider;
use Spryker\Zed\Api\Communication\Plugin\Processor\Pre\FilterPreProcessorPlugin;
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

    /**
     * @return \Spryker\Zed\Api\Business\Model\Processor\Pre\PreProcessorInterface[]
     */
    protected function getPreProcessorPluginCollection()
    {
        return [
            new PathPreProcessor(),
            new FormatTypeByHeaderPreProcessor(),
            new FormatTypeByExtensionPreProcessor(),
            new ResourcePreProcessor(),
            new ResourceActionPreProcessor(),
            new ResourceParamsPreProcessor(),
            new FilterPreProcessorPlugin(),
            new PaginationPreProcessor(),
            new FieldsByQueryPreProcessor(),
            new SortByQueryFilterPreProcessor(),
            new CriteriaByQueryFilterPreProcessor(),
            new PaginationByQueryFilterPreProcessor(),
            new PaginationByHeaderFilterPreProcessor(),
            new AddActionPreProcessor(),
            new UpdateActionPreProcessor(),
            new GetActionPreProcessor(),
            new FindActionPreProcessor(),
        ];
    }

}
