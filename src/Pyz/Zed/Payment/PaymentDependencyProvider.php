<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Payment;

use Spryker\Shared\DummyPayment\DummyPaymentConstants;
use Spryker\Zed\DummyPayment\Communication\Plugin\Checkout\DummyPaymentPreCheckPlugin;
use Spryker\Zed\DummyPayment\Communication\Plugin\Checkout\DummyPaymentSaveOrderPlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Payment\PaymentDependencyProvider as SprykerPaymentDependencyProvider;

class PaymentDependencyProvider extends SprykerPaymentDependencyProvider
{

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     * @return array
     */
    protected function getCheckoutPlugins(Container $container)
    {
        return [
            self::CHECKOUT_PRE_CHECK_PLUGINS => [
                DummyPaymentConstants::PROVIDER_NAME => new DummyPaymentPreCheckPlugin(),
            ],
            self::CHECKOUT_ORDER_SAVER_PLUGINS => [
                DummyPaymentConstants::PROVIDER_NAME => new DummyPaymentSaveOrderPlugin(),
            ],
            self::CHECKOUT_POST_SAVE_PLUGINS => [],
        ];
    }

}
