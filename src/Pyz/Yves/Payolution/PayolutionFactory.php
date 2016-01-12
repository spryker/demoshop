<?php

namespace Pyz\Yves\Payolution;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Payolution\Handler\PayolutionHandler;
use Pyz\Yves\Payolution\Form\InstallmentForm;
use Pyz\Yves\Payolution\Form\InvoiceForm;
use Spryker\Client\Payolution\PayolutionClientInterface;
use Spryker\Yves\Kernel\AbstractFactory;

class PayolutionFactory extends AbstractFactory
{

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return InvoiceForm
     */
    public function createInvoiceForm(QuoteTransfer $quoteTransfer)
    {
        return new InvoiceForm($quoteTransfer);
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return InstallmentForm
     */
    public function createInstallmentForm(QuoteTransfer $quoteTransfer)
    {
        return new InstallmentForm(
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
