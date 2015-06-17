<?php

namespace Pyz\Yves\Checkout\Communication;

use SprykerEngine\Yves\Kernel\Communication\AbstractDependencyContainer;
use Pyz\Yves\Checkout\Communication\Form\Checkout;

class CheckoutDependencyContainer extends AbstractDependencyContainer
{
    /**
     * @return Checkout
     */
    public function createCheckoutForm()
    {
        return $this->getFactory()->createFormCheckout();
    }

}
