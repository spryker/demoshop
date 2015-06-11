<?php

namespace Pyz\Yves\Checkout\Communication;

use SprykerEngine\Yves\Kernel\Communication\AbstractDependencyContainer;
use Pyz\Yves\Checkout\Communication\Form\Order;


class CheckoutDependencyContainer extends AbstractDependencyContainer
{
    /**
     * @return Order
     */
    public function createFormOrder()
    {
        return $this->getFactory()->createFormOrder();
    }

}
