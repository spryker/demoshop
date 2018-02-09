<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\GiftCard;

use Spryker\Shared\DummyPayment\DummyPaymentConfig;
use Spryker\Zed\GiftCard\GiftCardConfig as SprykerGiftCardConfig;

class GiftCardConfig extends SprykerGiftCardConfig
{
    /**
     * @return array
     */
    public function getGiftCardMethodBlacklist()
    {
        return [
            DummyPaymentConfig::PAYMENT_METHOD_INVOICE,
        ];
    }
}
