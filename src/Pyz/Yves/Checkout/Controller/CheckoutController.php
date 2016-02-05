<?php

namespace Pyz\Yves\Checkout\Controller;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Checkout\CheckoutFactory;
use Pyz\Yves\Checkout\Process\StepProcess;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Yves\Application\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method CheckoutFactory getFactory()
 */
class CheckoutController extends AbstractController
{
    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function indexAction(Request $request)
    {
        return $this->createStepProcess()->process($request);
    }
    
    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function customerAction(Request $request)
    {
        return $this->createStepProcess()->process(
            $request,
            $this->getFactory()
                ->createFormFactory()
                ->createCustomerFormCollection($this->getQuoteTransfer())
        );
    }

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function addressAction(Request $request)
    {
        return $this->createStepProcess()->process(
            $request,
            $this->getFactory()
                ->createFormFactory()
                ->createAddressFormCollection($this->getQuoteTransfer())
        );
    }

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function shipmentAction(Request $request)
    {
        return $this->createStepProcess()->process(
            $request,
            $this->getFactory()
                ->createFormFactory()
                ->createShipmentFormCollection($this->getQuoteTransfer())
        );
    }

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function paymentAction(Request $request)
    {
        return $this->createStepProcess()->process(
            $request,
            $this->getFactory()
                ->createFormFactory()
                ->createPaymentFormCollection($this->getQuoteTransfer())
        );
    }

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function summaryAction(Request $request)
    {
        return $this->createStepProcess()->process(
            $request,
            $this->getFactory()
                ->createFormFactory()
                ->createSummaryFormCollection($this->getQuoteTransfer())
        );
    }

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function placeOrderAction(Request $request)
    {
        return $this->createStepProcess()->process($request);
    }

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function successAction(Request $request)
    {
        return $this->createStepProcess()->process($request);
    }

    /**
     * @param Request $request
     */
    public function errorAction(Request $request)
    {
    }

    /**
     * @return StepProcess
     */
    protected function createStepProcess()
    {
        return $this->getFactory()->createCheckoutProcess();
    }

    /**
     * @return QuoteTransfer
     */
    protected function getQuoteTransfer()
    {
        return $this->getCartClient()->getQuote();
    }

    /**
     * @return CartClientInterface
     */
    protected function getCartClient()
    {
        return $this->getFactory()->getCartClient();
    }

}
