<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\GiftCard;

use Spryker\Zed\GiftCard\GiftCardDependencyProvider as SprykerGiftCardDependencyProvider;
use Spryker\Zed\GiftCardBalance\Communication\Plugin\BalanceCheckerApplicabilityPlugin;
use Spryker\Zed\GiftCardBalance\Communication\Plugin\BalanceTransactionLogPaymentSaverPlugin;
use Spryker\Zed\GiftCardBalance\Communication\Plugin\GiftCardBalanceValueProviderPlugin;

class GiftCardDependencyProvider extends SprykerGiftCardDependencyProvider
{
    /**
     * @return \Spryker\Zed\GiftCard\Dependency\Plugin\GiftCardValueProviderPluginInterface
     */
    protected function getValueProviderPlugin()
    {
        return new GiftCardBalanceValueProviderPlugin();
    }

    /**
     * @return \Spryker\Zed\GiftCard\Dependency\Plugin\GiftCardPaymentSaverPluginInterface[]
     */
    protected function getPaymentSaverPlugins()
    {
        return [
            new BalanceTransactionLogPaymentSaverPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\GiftCard\Dependency\Plugin\GiftCardDecisionRulePluginInterface[]
     */
    protected function getDecisionRulePlugins()
    {
        return array_merge(parent::getDecisionRulePlugins(), [
            new BalanceCheckerApplicabilityPlugin(),
        ]);
    }
}
