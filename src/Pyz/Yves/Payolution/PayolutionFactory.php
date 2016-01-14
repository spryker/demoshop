<?php

namespace Pyz\Yves\Payolution;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Payolution\Handler\PayolutionHandler;
use Pyz\Yves\Payolution\Form\InstallmentSubForm;
use Pyz\Yves\Payolution\Form\InvoiceSubForm;
use Spryker\Client\Payolution\PayolutionClientInterface;
use Spryker\Yves\Kernel\AbstractFactory;

class PayolutionFactory extends AbstractFactory
{

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return InvoiceSubForm
     */
    public function createInvoiceForm(QuoteTransfer $quoteTransfer)
    {
        return new InvoiceSubForm($quoteTransfer);
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return InstallmentSubForm
     */
    public function createInstallmentForm(QuoteTransfer $quoteTransfer)
    {
        return new InstallmentSubForm(
            $quoteTransfer,
            $this->getPayolutionClient()
        );
    }

    /**
     * @return PayolutionHandler
     */
    public function createPayolutionHandler()
    {
        return new PayolutionHandler($this->getPayolutionClient());
    }

    /**
     * @return PayolutionClientInterface
     */
    public function getPayolutionClient()
    {
        return $this->getLocator()->payolution()->client();
    }

}
