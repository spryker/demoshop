<?php

namespace Pyz\Yves\Payolution\Plugin;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Checkout\Dependency\Plugin\PaymentSubFormInterface;
use Pyz\Yves\Payolution\Form\InstallmentForm;
use Pyz\Yves\Payolution\PayolutionFactory;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method PayolutionFactory getFactory()
 */
class PayolutionInstallmentFormPlugin extends AbstractPlugin implements PaymentSubFormInterface
{

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return InstallmentForm
     */
    public function createSubFrom(QuoteTransfer $quoteTransfer)
    {
        return $this->getFactory()->createInstallmentForm($quoteTransfer);
    }

}
