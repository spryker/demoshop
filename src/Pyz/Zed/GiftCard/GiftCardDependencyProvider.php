<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\GiftCard;

use Spryker\Zed\GiftCard\Communication\Plugin\GiftCardIsActiveDecisionRulePlugin;
use Spryker\Zed\GiftCard\GiftCardDependencyProvider as SprykerGiftCardDependencyProvider;
use Spryker\Zed\GiftCardBalance\Communication\Plugin\BalanceCheckerApplicabilityPlugin;

class GiftCardDependencyProvider extends SprykerGiftCardDependencyProvider
{

    /**
     * @return \Spryker\Zed\GiftCard\Dependency\Plugin\GiftCardDecisionRulePluginInterface[]
     */
    protected function getDecisionRulePlugins()
    {
        return [
            new GiftCardIsActiveDecisionRulePlugin(),
            new BalanceCheckerApplicabilityPlugin(),
        ];
    }

}
