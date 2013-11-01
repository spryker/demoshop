<?php
namespace Pyz\Yves\Checkout\Module\Controller;

use Pyz\Yves\Sales\Module\Form\OrderType;
use ProjectA\Yves\Checkout\Module\Controller\CheckoutController as CoreCheckoutController;

class CheckoutController extends CoreCheckoutController
{
    /**
     * @return OrderType
     */
    protected function createOrderType()
    {
        return new OrderType();
    }

    public function loginAction()
    {
        return [];
    }
}
