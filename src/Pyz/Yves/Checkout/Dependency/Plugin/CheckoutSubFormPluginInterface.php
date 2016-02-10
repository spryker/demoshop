<?php

namespace Pyz\Yves\Checkout\Dependency\Plugin;

use Generated\Shared\Transfer\QuoteTransfer;

interface CheckoutSubFormPluginInterface
{

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Pyz\Yves\Checkout\Dependency\SubFormInterface
     */
    public function createSubFrom(QuoteTransfer $quoteTransfer);

}
