<?php

namespace Pyz\Yves\Payolution;

use Pyz\Yves\Payolution\Form\InstallmentForm;
use Pyz\Yves\Payolution\Form\InvoiceForm;
use Spryker\Yves\Kernel\AbstractFactory;

class PayolutionFactory extends AbstractFactory
{

    /**
     * @return InvoiceForm
     */
    public function createInvoiceForm()
    {
        return new InvoiceForm();
    }

    /**
     * @return InstallmentForm
     */
    public function createInstallmentForm()
    {
        return new InstallmentForm();
    }

}
