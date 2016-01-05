<?php

namespace Pyz\Yves\Payolution\Plugin;

use Pyz\Yves\Checkout\Dependency\Plugin\PaymentSubFormInterface;
use Pyz\Yves\Payolution\Form\InstallmentForm;
use Pyz\Yves\Payolution\PayolutionFactory;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method PayolutionFactory getFactory()
 */
class PayolutionInstallmentPlugin extends AbstractPlugin implements PaymentSubFormInterface
{

    /**
     * @return InstallmentForm
     */
    public function createSubFrom()
    {
        return $this->getFactory()->createInstallmentForm();
    }

}
