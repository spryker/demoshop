<?php

namespace Pyz\Yves\Checkout\Dependency\Plugin;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Shared\Gui\Form\AbstractForm;

interface CheckoutSubFormPluginInterface
{

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return AbstractForm
     */
    public function createSubFrom(QuoteTransfer $quoteTransfer);

}
