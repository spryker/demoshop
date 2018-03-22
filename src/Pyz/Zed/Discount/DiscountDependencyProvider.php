<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Discount;

use Spryker\Zed\CustomerGroupDiscountConnector\Communication\Plugin\DecisionRule\CustomerGroupDecisionRulePlugin;
use Spryker\Zed\Discount\DiscountDependencyProvider as SprykerDiscountDependencyProvider;
use Spryker\Zed\DiscountPromotion\Communication\Plugin\Discount\DiscountPromotionCalculationFormDataExpanderPlugin;
use Spryker\Zed\DiscountPromotion\Communication\Plugin\Discount\DiscountPromotionCalculationFormExpanderPlugin;
use Spryker\Zed\DiscountPromotion\Communication\Plugin\Discount\DiscountPromotionCollectorStrategyPlugin;
use Spryker\Zed\DiscountPromotion\Communication\Plugin\Discount\DiscountPromotionConfigurationExpanderPlugin;
use Spryker\Zed\DiscountPromotion\Communication\Plugin\Discount\DiscountPromotionFilterApplicableItemsPlugin;
use Spryker\Zed\DiscountPromotion\Communication\Plugin\Discount\DiscountPromotionFilterCollectedItemsPlugin;
use Spryker\Zed\DiscountPromotion\Communication\Plugin\Discount\DiscountPromotionPostCreatePlugin;
use Spryker\Zed\DiscountPromotion\Communication\Plugin\Discount\DiscountPromotionPostUpdatePlugin;
use Spryker\Zed\DiscountPromotion\Communication\Plugin\Discount\DiscountPromotionViewBlockProviderPlugin;
use Spryker\Zed\GiftCard\Communication\Plugin\GiftCardDiscountableItemFilterPlugin;
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
use Spryker\Zed\Store\Communication\Plugin\Form\StoreRelationToggleFormTypePlugin;

class DiscountDependencyProvider extends SprykerDiscountDependencyProvider
{
    /**
     * @return \Spryker\Zed\Discount\Dependency\Plugin\DecisionRulePluginInterface[]
     */
    protected function getDecisionRulePlugins()
    {
        return array_merge(parent::getDecisionRulePlugins(), [
            new ShipmentCarrierDecisionRulePlugin(),
            new ShipmentMethodDecisionRulePlugin(),
            new ShipmentPriceDecisionRulePlugin(),
            new CustomerGroupDecisionRulePlugin(),
            new ProductLabelDecisionRulePlugin(),
            new ProductAttributeDecisionRulePlugin(),
        ]);
    }

    /**
     * @return \Spryker\Zed\Discount\Dependency\Plugin\CollectorPluginInterface[]
     */
    protected function getCollectorPlugins()
    {
        return array_merge(parent::getCollectorPlugins(), [
            new ProductLabelCollectorPlugin(),
            new ItemByShipmentCarrierPlugin(),
            new ItemByShipmentMethodPlugin(),
            new ItemByShipmentPricePlugin(),
            new ProductAttributeCollectorPlugin(),
        ]);
    }

    /**
     * @return array
     */
    protected function getDiscountableItemFilterPlugins()
    {
        return [
            new DiscountPromotionFilterCollectedItemsPlugin(),
            new GiftCardDiscountableItemFilterPlugin(),
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
     * @return \Spryker\Zed\Discount\Dependency\Plugin\DiscountPostCreatePluginInterface[]
     */
    protected function getDiscountPostCreatePlugins()
    {
        return [
            new DiscountPromotionPostCreatePlugin(),
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
     * @return \Spryker\Zed\Discount\Dependency\Plugin\Form\DiscountFormExpanderPluginInterface[]
     */
    protected function getDiscountFormExpanderPlugins()
    {
        return [
            new DiscountPromotionCalculationFormExpanderPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\Discount\Dependency\Plugin\Form\DiscountFormDataProviderExpanderPluginInterface[]
     */
    protected function getDiscountFormDataProviderExpanderPlugins()
    {
        return [
            new DiscountPromotionCalculationFormDataExpanderPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\Discount\Dependency\Plugin\DiscountViewBlockProviderPluginInterface[]
     */
    protected function getDiscountViewTemplateProviderPlugins()
    {
        return [
            new DiscountPromotionViewBlockProviderPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\Discount\Dependency\Plugin\DiscountViewBlockProviderPluginInterface[]
     */
    protected function getDiscountApplicableFilterPlugins()
    {
        return [
           new DiscountPromotionFilterApplicableItemsPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\Kernel\Communication\Form\FormTypeInterface
     */
    protected function getStoreRelationFormTypePlugin()
    {
        return new StoreRelationToggleFormTypePlugin();
    }
}
