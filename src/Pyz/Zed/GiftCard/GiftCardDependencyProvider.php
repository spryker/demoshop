<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\GiftCard;

use Spryker\Zed\GiftCard\Communication\Plugin\GiftCardIsActiveDecisionRulePlugin;
use Spryker\Zed\GiftCard\GiftCardDependencyProvider as SprykerGiftCardDependencyProvider;
use Spryker\Zed\GiftCardBalance\Communication\Plugin\BalanceCheckerApplicabilityPlugin;
use Spryker\Zed\GiftCardBalance\Communication\Plugin\BalanceTransactionLogPaymentSaverPlugin;
use Spryker\Zed\GiftCardBalance\Communication\Plugin\GiftCardBalanceValueProviderPlugin;

class GiftCardDependencyProvider extends SprykerGiftCardDependencyProvider
{
    //TODO evaluate strategies: replace gift card vs balance approach
    //balance: requires module GiftCardBalance, otherwise leave as is
    //replacement: GiftCardBalance not needed, uncomment lines below, see RecreateGiftCards process

    /**
     * @return \Spryker\Zed\GiftCard\Dependency\Plugin\GiftCardDecisionRulePluginInterface[]
     */
    protected function getDecisionRulePlugins()
    {
        return [
            new GiftCardIsActiveDecisionRulePlugin(),
            new BalanceCheckerApplicabilityPlugin(),
        ];

        // for replacement:
        // return $this->getRecreateDecisionRulePlugins();
    }

    /**
     * @return \Spryker\Zed\GiftCard\Dependency\Plugin\GiftCardValueProviderPluginInterface
     */
    protected function getValueProviderPlugin()
    {
        return new GiftCardBalanceValueProviderPlugin();

        // for replacement:
        // return new GiftCardRecreateValueProviderPlugin();
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
}
