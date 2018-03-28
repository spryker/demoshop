<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ManualOrderEntryGui;

use Spryker\Zed\DummyPayment\Communication\Plugin\ManualOrderEntry\DummyPaymentInvoicePaymentSubFormPlugin;
use Spryker\Zed\ManualOrderEntryGui\Communication\Plugin\AddressManualOrderEntryFormPlugin;
use Spryker\Zed\ManualOrderEntryGui\Communication\Plugin\CustomersListManualOrderEntryFormPlugin;
use Spryker\Zed\ManualOrderEntryGui\Communication\Plugin\ItemManualOrderEntryFormPlugin;
use Spryker\Zed\ManualOrderEntryGui\Communication\Plugin\PaymentManualOrderEntryFormPlugin;
use Spryker\Zed\ManualOrderEntryGui\Communication\Plugin\ProductManualOrderEntryFormPlugin;
use Spryker\Zed\ManualOrderEntryGui\Communication\Plugin\ShipmentManualOrderEntryFormPlugin;
use Spryker\Zed\ManualOrderEntryGui\Communication\Plugin\StoreManualOrderEntryFormPlugin;
use Spryker\Zed\ManualOrderEntryGui\Communication\Plugin\SummaryManualOrderEntryFormPlugin;
use Spryker\Zed\ManualOrderEntryGui\Communication\Plugin\VoucherManualOrderEntryFormPlugin;
use Spryker\Zed\ManualOrderEntryGui\ManualOrderEntryGuiDependencyProvider as SprykerManualOrderEntryGuiDependencyProvider;
use Spryker\Zed\SalesReclamation\Communication\Plugin\ReclamationOrderEntryFormPlugin;

class ManualOrderEntryGuiDependencyProvider extends SprykerManualOrderEntryGuiDependencyProvider
{
    /**
     * @return \Spryker\Zed\ManualOrderEntryGuiExtension\Dependency\Plugin\PaymentSubFormPluginInterface[]
     */
    protected function getPaymentSubFormPlugins()
    {
        return [
            new DummyPaymentInvoicePaymentSubFormPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\ManualOrderEntryGui\Communication\Plugin\ManualOrderEntryFormPluginInterface[]
     */
    protected function getManualOrderEntryFormPlugins()
    {
        return [
            new ReclamationOrderEntryFormPlugin(),
            new CustomersListManualOrderEntryFormPlugin(),
            new StoreManualOrderEntryFormPlugin(),
            new ProductManualOrderEntryFormPlugin(),
            new ItemManualOrderEntryFormPlugin(),
            new VoucherManualOrderEntryFormPlugin(),
            new AddressManualOrderEntryFormPlugin(),
            new ShipmentManualOrderEntryFormPlugin(),
            new PaymentManualOrderEntryFormPlugin(),
            new SummaryManualOrderEntryFormPlugin(),
        ];
    }
}
