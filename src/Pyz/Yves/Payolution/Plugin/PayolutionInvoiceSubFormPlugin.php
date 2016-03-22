<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */
namespace Pyz\Yves\Payolution\Plugin;

use Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \Pyz\Yves\Payolution\PayolutionFactory getFactory()
 */
class PayolutionInvoiceSubFormPlugin extends AbstractPlugin implements CheckoutSubFormPluginInterface
{

    /**
     * @return \Pyz\Yves\Payolution\Form\InvoiceSubForm
     */
    public function createSubForm()
    {
        return $this->getFactory()->createInvoiceForm();
    }

    /**
     * @return \Pyz\Yves\Checkout\Dependency\DataProvider\DataProviderInterface
     */
    public function createSubFormDataProvider()
    {
        return $this->getFactory()->createInvoiceFormDataProvider();
    }

}
