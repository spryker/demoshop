<?php

namespace Pyz\Yves\Payolution\Plugin;

use Pyz\Yves\Checkout\Dependency\Plugin\PaymentSubFormInterface;
use Pyz\Yves\Payolution\Form\InvoiceForm;
use Pyz\Yves\Payolution\PayolutionFactory;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method PayolutionFactory getFactory()
 */
class PayolutionInvoicePlugin extends AbstractPlugin implements PaymentSubFormInterface
{

    /**
     * @return InvoiceForm
     */
    public function createSubFrom()
    {
        return $this->getFactory()->createInvoiceForm();
    }

}
