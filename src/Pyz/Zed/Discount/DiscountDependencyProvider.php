<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Discount;

use Spryker\Zed\Discount\DiscountDependencyProvider as SprykerDiscountDependencyProvider;
use Spryker\Zed\ProductDiscountConnector\Communication\Plugin\Collector\ProductAttributeCollectorPlugin;
use Spryker\Zed\ProductDiscountConnector\Communication\Plugin\DecisionRule\ProductAttributeDecisionRulePlugin;

class DiscountDependencyProvider extends SprykerDiscountDependencyProvider
{

    /**
     * @return \Spryker\Zed\Discount\Dependency\Plugin\DecisionRulePluginInterface[]
     */
    protected function getDecisionRulePlugins()
    {
        $decisionRulePlugins = parent::getDecisionRulePlugins();

        $decisionRulePlugins[] = new ProductAttributeDecisionRulePlugin();

        return $decisionRulePlugins;
    }

    /**
     * @return \Spryker\Zed\Discount\Dependency\Plugin\CollectorPluginInterface[]
     */
    protected function getCollectorPlugins()
    {
        $collectorPlugins = parent::getCollectorPlugins();
        $collectorPlugins[] = new ProductAttributeCollectorPlugin();

        return $collectorPlugins;
    }

}
