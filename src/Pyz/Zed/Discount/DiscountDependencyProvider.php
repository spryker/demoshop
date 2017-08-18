<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Discount;

use Spryker\Zed\CustomerGroupDiscountConnector\Communication\Plugin\DecisionRule\CustomerGroupDecisionRulePlugin;
use Spryker\Zed\Discount\DiscountDependencyProvider as SprykerDiscountDependencyProvider;
use Spryker\Zed\DiscountPromotion\Communication\Plugin\Discount\DiscountFilterPromotionDiscountsPlugin;
use Spryker\Zed\DiscountPromotion\Communication\Plugin\Discount\DiscountPromotionCalculationFormExpanderPlugin;
use Spryker\Zed\DiscountPromotion\Communication\Plugin\Discount\DiscountPromotionCollectorStrategyPlugin;
use Spryker\Zed\DiscountPromotion\Communication\Plugin\Discount\DiscountPromotionConfigurationExpanderPlugin;
use Spryker\Zed\DiscountPromotion\Communication\Plugin\Discount\DiscountPromotionPostSavePlugin;
use Spryker\Zed\DiscountPromotion\Communication\Plugin\Discount\DiscountPromotionPostUpdatePlugin;
use Spryker\Zed\ProductDiscountConnector\Communication\Plugin\Collector\ProductAttributeCollectorPlugin;
use Spryker\Zed\ProductDiscountConnector\Communication\Plugin\DecisionRule\ProductAttributeDecisionRulePlugin;
use Spryker\Zed\ProductLabelDiscountConnector\Communication\Plugin\Collector\ProductLabelCollectorPlugin;
use Spryker\Zed\ProductLabelDiscountConnector\Communication\Plugin\DecisionRule\ProductLabelDecisionRulePlugin;
use Spryker\Zed\ShipmentDiscountConnector\Communication\Plugin\DecisionRule\ShipmentCarrierDecisionRulePlugin;
use Spryker\Zed\ShipmentDiscountConnector\Communication\Plugin\DecisionRule\ShipmentMethodDecisionRulePlugin;
use Spryker\Zed\ShipmentDiscountConnector\Communication\Plugin\DecisionRule\ShipmentPriceDecisionRulePlugin;
use Spryker\Zed\ShipmentDiscountConnector\Communication\Plugin\DiscountCollector\ItemByShipmentCarrierPlugin;
use Spryker\Zed\ShipmentDiscountConnector\Communication\Plugin\DiscountCollector\ItemByShipmentMethodPlugin;
use Spryker\Zed\ShipmentDiscountConnector\Communication\Plugin\DiscountCollector\ItemByShipmentPricePlugin;

class DiscountDependencyProvider extends SprykerDiscountDependencyProvider
{

    /**
     * @return \Spryker\Zed\Discount\Dependency\Plugin\DecisionRulePluginInterface[]
     */
    protected function getDecisionRulePlugins()
    {
        return array_merge(parent::getDecisionRulePlugins(), [
            new ProductAttributeDecisionRulePlugin(),
            new CustomerGroupDecisionRulePlugin(),
            new ProductLabelDecisionRulePlugin(),
            new ShipmentCarrierDecisionRulePlugin(),
            new ShipmentMethodDecisionRulePlugin(),
            new ShipmentPriceDecisionRulePlugin(),
        ]);
    }

    /**
     * @return \Spryker\Zed\Discount\Dependency\Plugin\CollectorPluginInterface[]
     */
    protected function getCollectorPlugins()
    {
        return array_merge(parent::getCollectorPlugins(), [
            new ProductAttributeCollectorPlugin(),
            new ProductLabelCollectorPlugin(),
            new ItemByShipmentCarrierPlugin(),
            new ItemByShipmentMethodPlugin(),
            new ItemByShipmentPricePlugin(),
        ]);
    }

    /**
     * @return array
     */
    protected function getDiscountableItemFilterPlugins()
    {
        return [
            new DiscountFilterPromotionDiscountsPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\Discount\Dependency\Plugin\CollectorStrategyPluginInterface[]
     */
    protected function getCollectorStrategyPlugins()
    {
        return [
            new DiscountPromotionCollectorStrategyPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\Discount\Dependency\Plugin\DiscountPostSavePluginInterface[]
     */
    protected function getDiscountPostSavePlugins()
    {
        return [
            new DiscountPromotionPostSavePlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\Discount\Dependency\Plugin\DiscountPostUpdatePluginInterface[]
     */
    protected function getDiscountPostUpdatePlugins()
    {
        return [
            new DiscountPromotionPostUpdatePlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\Discount\Dependency\Plugin\DiscountConfigurationExpanderPluginInterface[]
     */
    protected function getDiscountConfigurationExpanderPlugins()
    {
        return [
            new DiscountPromotionConfigurationExpanderPlugin(),
        ];
    }

    /**
     * This plugin allows to expand DiscountConfigurationTransfer when using
     *
     * @return \Spryker\Zed\Discount\Dependency\Plugin\DiscountCalculationFormExpanderPluginInterface[]
     */
    protected function getDiscountFormExpanderPlugins()
    {
        return [
            new DiscountPromotionCalculationFormExpanderPlugin(),
        ];
    }

}
