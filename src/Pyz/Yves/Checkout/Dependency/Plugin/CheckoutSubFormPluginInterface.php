<?php

namespace Pyz\Yves\Checkout\Dependency\Plugin;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Shared\Gui\Form\AbstractForm;

interface CheckoutSubFormPluginInterface
{

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Spryker\Shared\Gui\Form\AbstractForm
     */
    public function createSubFrom(QuoteTransfer $quoteTransfer);

}
