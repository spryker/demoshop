<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Discount;

use Spryker\Zed\CustomerGroupDiscountConnector\Communication\Plugin\DecisionRule\CustomerGroupDecisionRulePlugin;
use Spryker\Zed\Discount\DiscountDependencyProvider as SprykerDiscountDependencyProvider;
use Spryker\Zed\ProductDiscountConnector\Communication\Plugin\Collector\ProductAttributeCollectorPlugin;
use Spryker\Zed\ProductDiscountConnector\Communication\Plugin\DecisionRule\ProductAttributeDecisionRulePlugin;
use Spryker\Zed\ProductLabelDiscountConnector\Communication\Plugin\Collector\ProductLabelCollectorPlugin;
use Spryker\Zed\ProductLabelDiscountConnector\Communication\Plugin\DecisionRule\ProductLabelDecisionRulePlugin;

class DiscountDependencyProvider extends SprykerDiscountDependencyProvider
{

    /**
     * @return \Spryker\Zed\Discount\Dependency\Plugin\DecisionRulePluginInterface[]
     */
    protected function getDecisionRulePlugins()
    {
        $decisionRulePlugins = parent::getDecisionRulePlugins();

        $decisionRulePlugins[] = new ProductAttributeDecisionRulePlugin();
        $decisionRulePlugins[] = new CustomerGroupDecisionRulePlugin();
        $decisionRulePlugins[] = new ProductLabelDecisionRulePlugin();

        return $decisionRulePlugins;
    }

    /**
     * @return \Spryker\Zed\Discount\Dependency\Plugin\CollectorPluginInterface[]
     */
    protected function getCollectorPlugins()
    {
        $collectorPlugins = parent::getCollectorPlugins();
        $collectorPlugins[] = new ProductAttributeCollectorPlugin();
        $collectorPlugins[] = new ProductLabelCollectorPlugin();

        return $collectorPlugins;
    }

}
