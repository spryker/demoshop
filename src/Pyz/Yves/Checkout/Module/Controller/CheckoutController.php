<?php
namespace Pyz\Yves\Checkout\Module\Controller;

use Generated\Yves\Factory;
use Pyz\Yves\Sales\Module\Form\OrderType;
use ProjectA\Yves\Checkout\Module\Controller\CheckoutController as CoreCheckoutController;

class CheckoutController extends CoreCheckoutController
{
    /**
     * @param array $paymentMethods
     * @return OrderType
     */
    protected function createOrderType(array $paymentMethods = [])
    {
        $customerModel = Factory::getInstance()->createCustomerModelCustomer($this->getApplication());
        return new OrderType($paymentMethods, $customerModel);
    }
}
