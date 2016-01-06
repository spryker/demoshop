<?php

namespace Pyz\Yves\Payolution\Plugin;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Checkout\Dependency\Plugin\PaymentSubFormInterface;
use Pyz\Yves\Payolution\Form\InvoiceForm;
use Pyz\Yves\Payolution\PayolutionFactory;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method PayolutionFactory getFactory()
 */
class PayolutionInvoiceFormPlugin extends AbstractPlugin implements PaymentSubFormInterface
{

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return InvoiceForm
     */
    public function createSubFrom(QuoteTransfer $quoteTransfer)
    {
        return $this->getFactory()->createInvoiceForm($quoteTransfer);
    }

}
