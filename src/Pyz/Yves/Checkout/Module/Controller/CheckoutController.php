<?php
namespace Pyz\Yves\Checkout\Module\Controller;

use Generated\Yves\Factory;
use Pyz\Yves\Library\Tracking\PageTypeInterface;
use Pyz\Yves\Sales\Module\Form\OrderType;
use ProjectA\Yves\Checkout\Module\Controller\CheckoutController as CoreCheckoutController;
use ProjectA\Yves\Library\Tracking\Tracking;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Generated\Shared\Payment\Transfer\PaymentMethodCollection;

class CheckoutController extends CoreCheckoutController
{
    /**
     * @param Request $request
     * @return array|RedirectResponse
     */
    public function indexAction(Request $request)
    {
        Tracking::getInstance()
            ->setPageType(PageTypeInterface::PAGE_TYPE_CHECKOUT)
            ->buildTracking();

        $response = parent::indexAction($request);
        if ($response instanceof Response) {
            return $response;
        }

        if (is_array($response)) {
            $payoneClientApi = Factory::getInstance()->createPayoneModelClientApiClientApi();
            $requestContainer = $payoneClientApi->creditCardCheck();
            $response['payoneCreditcardCheckData'] = $requestContainer->toArray();
        }

        return $response;
    }

    /**
     * @param PaymentMethodCollection $paymentMethods
     * @return OrderType
     */
    protected function createOrderType(PaymentMethodCollection $paymentMethods)
    {
        $customerModel = Factory::getInstance()->createCustomerModelCustomer($this->getApplication());
        return new OrderType($paymentMethods, $customerModel);
    }

    /**
     * @param Request $request
     * @return array|RedirectResponse
     */
    public function successAction(Request $request)
    {
        Tracking::getInstance()
            ->setPageType(PageTypeInterface::PAGE_TYPE_SUCCESS)
            ->buildTracking();

        return parent::successAction($request);
    }
}
