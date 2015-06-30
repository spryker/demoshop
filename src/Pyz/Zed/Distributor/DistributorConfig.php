<?php

namespace Pyz\Zed\Distributor;

use SprykerFeature\Zed\Distributor\Dependency\Plugin\ItemProcessorPluginInterface;
use SprykerFeature\Zed\Distributor\Dependency\Plugin\QueryExpanderPluginInterface;
use SprykerFeature\Zed\Distributor\DistributorConfig as CoreDistributorConfig;

class DistributorConfig extends CoreDistributorConfig
{

    /**
     * @return ItemProcessorPluginInterface[]
     */
    public function getItemProcessors()
    {
        return [];
    }

    /**
     * @return QueryExpanderPluginInterface[]
     */
    public function getQueryExpander()
    {
        return [
            $this->getLocator()->glossaryDistributor()->pluginGlossaryQueryExpanderPlugin(),
        ];
    }
}
