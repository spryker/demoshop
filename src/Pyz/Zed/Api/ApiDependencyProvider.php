<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Api;

use Spryker\Zed\Api\ApiDependencyProvider as SprykerApiDependencyProvider;
use Spryker\Zed\Api\Communication\Plugin\Processor\Pre\Action\AddActionPreProcessorPlugin;
use Spryker\Zed\Api\Communication\Plugin\Processor\Pre\Action\FindActionPreProcessorPlugin;
use Spryker\Zed\Api\Communication\Plugin\Processor\Pre\Action\GetActionPreProcessorPlugin;
use Spryker\Zed\Api\Communication\Plugin\Processor\Pre\Action\UpdateActionPreProcessorPlugin;
use Spryker\Zed\Api\Communication\Plugin\Processor\Pre\Fields\FieldsByQueryPreProcessorPlugin;
use Spryker\Zed\Api\Communication\Plugin\Processor\Pre\FilterPreProcessorPlugin;
use Spryker\Zed\Api\Communication\Plugin\Processor\Pre\Filter\Header\PaginationByHeaderFilterPreProcessorPlugin;
use Spryker\Zed\Api\Communication\Plugin\Processor\Pre\Filter\Query\CriteriaByQueryFilterPreProcessorPlugin;
use Spryker\Zed\Api\Communication\Plugin\Processor\Pre\Filter\Query\PaginationByQueryFilterPreProcessorPlugin;
use Spryker\Zed\Api\Communication\Plugin\Processor\Pre\Filter\Query\SortByQueryFilterPreProcessorPlugin;
use Spryker\Zed\Api\Communication\Plugin\Processor\Pre\Format\FormatTypeByHeaderPreProcessorPlugin;
use Spryker\Zed\Api\Communication\Plugin\Processor\Pre\Format\FormatTypeByPathPreProcessorPlugin;
use Spryker\Zed\Api\Communication\Plugin\Processor\Pre\PaginationPreProcessorPlugin;
use Spryker\Zed\Api\Communication\Plugin\Processor\Pre\PathPreProcessorPlugin;
use Spryker\Zed\Api\Communication\Plugin\Processor\Pre\Resource\ResourceActionPreProcessorPlugin;
use Spryker\Zed\Api\Communication\Plugin\Processor\Pre\Resource\ResourceParametersPreProcessorPlugin;
use Spryker\Zed\Api\Communication\Plugin\Processor\Pre\Resource\ResourcePreProcessorPlugin;
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
            new PathPreProcessorPlugin(),
            new FormatTypeByHeaderPreProcessorPlugin(),
            new FormatTypeByPathPreProcessorPlugin(),
            new ResourcePreProcessorPlugin(),
            new ResourceActionPreProcessorPlugin(),
            new ResourceParametersPreProcessorPlugin(),
            new FilterPreProcessorPlugin(),
            new PaginationPreProcessorPlugin(),
            new FieldsByQueryPreProcessorPlugin(),
            new SortByQueryFilterPreProcessorPlugin(),
            new CriteriaByQueryFilterPreProcessorPlugin(),
            new PaginationByQueryFilterPreProcessorPlugin(),
            new PaginationByHeaderFilterPreProcessorPlugin(),
            new AddActionPreProcessorPlugin(),
            new UpdateActionPreProcessorPlugin(),
            new GetActionPreProcessorPlugin(),
            new FindActionPreProcessorPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\Api\Business\Model\Processor\Post\PostProcessorInterface[]
     */
    protected function getPostProcessorPluginCollection()
    {
        return [];
    }

}
