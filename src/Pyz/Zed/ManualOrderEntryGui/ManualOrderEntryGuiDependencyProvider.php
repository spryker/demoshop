<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ManualOrderEntryGui;

use Spryker\Zed\DummyPayment\Communication\Plugin\Checkout\DummyPaymentInvoiceSubFormPlugin;
use Spryker\Zed\ManualOrderEntryGui\ManualOrderEntryGuiDependencyProvider as SprykerManualOrderEntryGuiDependencyProvider;

class ManualOrderEntryGuiDependencyProvider extends SprykerManualOrderEntryGuiDependencyProvider
{
    /**
     * @return \Spryker\Zed\ManualOrderEntryGui\Communication\Plugin\Payment\SubFormPluginInterface[]
     */
    protected function getPaymentSubFormPlugins()
    {
        return [
            new DummyPaymentInvoiceSubFormPlugin(),
        ];
    }
}
