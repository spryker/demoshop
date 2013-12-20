<?php
namespace Pyz\Yves\Checkout\Module\Controller;

use Generated\Yves\Factory;
use Pyz\Yves\Sales\Module\Form\OrderType;
use ProjectA\Yves\Checkout\Module\Controller\CheckoutController as CoreCheckoutController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Generated\Shared\Payment\Transfer\PaymentMethodCollection;

class CheckoutController extends CoreCheckoutController
{
    /**
     * @param array $paymentMethods
     * @return OrderType
     */
    protected function createOrderType(PaymentMethodCollection $paymentMethods)
    {
        $customerModel = Factory::getInstance()->createCustomerModelCustomer($this->getApplication());
        return new OrderType($paymentMethods, $customerModel);
    }

    public function indexAction(Request $request)
    {
        $response = parent::indexAction($request);
        if($response instanceof Response) {
            return $response;
        }
        if(is_array($response)) {
            $payoneClientApi = Factory::getInstance()->createPayoneModelClientApiClientApi();
            $requestContainer = $payoneClientApi->creditCardCheck();
            $response['payoneCreditcardCheckData'] = $requestContainer->toArray();
        }
        return $response;
    }

}
