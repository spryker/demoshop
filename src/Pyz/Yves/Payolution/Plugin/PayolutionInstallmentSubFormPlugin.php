<?php

namespace Pyz\Yves\Payolution\Plugin;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormPluginInterface;
use Pyz\Yves\Payolution\Form\InstallmentSubForm;
use Pyz\Yves\Payolution\PayolutionFactory;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \Pyz\Yves\Payolution\PayolutionFactory getFactory()
 */
class PayolutionInstallmentSubFormPlugin extends AbstractPlugin implements CheckoutSubFormPluginInterface
{

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Pyz\Yves\Payolution\Form\InstallmentSubForm
     */
    public function createSubFrom(QuoteTransfer $quoteTransfer)
    {
        return $this->getFactory()->createInstallmentForm($quoteTransfer);
    }

}
