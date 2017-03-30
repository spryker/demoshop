<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Api\Business;

use Spryker\Zed\Api\Business\ApiBusinessFactory as SprykerApiBusinessFactory;

/**
 * @method \Spryker\Zed\Api\ApiConfig getConfig()
 * @method \Spryker\Zed\Api\Persistence\ApiQueryContainer getQueryContainer()
 */
class ApiBusinessFactory extends SprykerApiBusinessFactory
{

    /**
     * @return \Spryker\Zed\Api\Dependency\Plugin\ApiPreProcessorPluginInterface[]
     */
    protected function getPreProcessorPluginStack()
    {
        return [
            $this->createPathPreProcessor(),
            $this->createFormatTypeByHeaderPreProcessor(),
            $this->createFormatTypeByPathPreProcessor(),
            $this->createResourcePreProcessor(),
            $this->createResourceActionPreProcessor(),
            $this->createResourceParametersPreProcessor(),
            $this->createFilterPreProcessor(),
            $this->createPaginationPreProcessor(),
            $this->createFieldsByQueryPreProcessor(),
            $this->createSortByQueryFilterPreProcessor(),
            $this->createCriteriaByQueryFilterPreProcessor(),
            $this->createPaginationByQueryFilterPreProcessor(),
            $this->createPaginationByHeaderFilterPreProcessor(),
            $this->createAddActionPreProcessor(),
            $this->createUpdateActionPreProcessor(),
            $this->createFindActionPreProcessor(),
            $this->createFindActionPreProcessor(),
        ];
    }

    /**
     * @return \Spryker\Zed\Api\Dependency\Plugin\ApiPostProcessorPluginInterface[]
     */
    protected function getPostProcessorPluginStack()
    {
        return [
            $this->createAddActionPostProcessor(),
            $this->createDeleteActionPostProcessor(),
        ];
    }

}
