<?php
namespace Pyz\Yves\Checkout\Module\Controller;

use Generated\Yves\Factory;
use Pyz\Yves\Sales\Module\Form\OrderType;
use ProjectA\Yves\Checkout\Module\Controller\CheckoutController as CoreCheckoutController;
use Symfony\Component\HttpFoundation\Request;

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

    public function indexAction(Request $request)
    {
        $returnVars = parent::indexAction($request);
        $payoneClientApi = Factory::getInstance()->createPayoneModelClientApiClientApi();
        $requestContainer = $payoneClientApi->creditCardCheck();
        $returnVars['payoneCreditcardCheckData'] = $requestContainer->toArray();
        return $returnVars;
    }

}
