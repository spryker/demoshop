<?php

namespace Pyz\Yves\Payolution\Plugin;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormPluginInterface;
use Pyz\Yves\Payolution\Form\InvoiceSubForm;
use Pyz\Yves\Payolution\PayolutionFactory;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \Pyz\Yves\Payolution\PayolutionFactory getFactory()
 */
class PayolutionInvoiceSubFormPlugin extends AbstractPlugin implements CheckoutSubFormPluginInterface
{

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Pyz\Yves\Payolution\Form\InvoiceSubForm
     */
    public function createSubFrom(QuoteTransfer $quoteTransfer)
    {
        return $this->getFactory()->createInvoiceForm($quoteTransfer);
    }

}
