<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Controller;

use Codeception\Step;
use Pyz\Yves\Checkout\Form\Multipage\PaymentType;
use Pyz\Yves\Checkout\Form\Multipage\ShippingType;
use Pyz\Yves\Checkout\Wizard\StepConfiguration;
use Pyz\Yves\Checkout\Wizard\StepProcess;
use Pyz\Yves\Checkout\Wizard\Steps\AddressStep;
use Pyz\Yves\Checkout\Wizard\Steps\PaymentStep;
use Pyz\Yves\Checkout\Wizard\Steps\ShipmentStep;
use Pyz\Yves\Checkout\Wizard\Steps\SummaryStep;
use Spryker\Yves\Application\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Pyz\Yves\Checkout\CheckoutFactory;
use Pyz\Yves\Checkout\Form\Multipage\AddressType;

/**
 * @method CheckoutFactory getFactory()
 */
class MultipageCheckoutController extends AbstractController
{

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function addressAction(Request $request)
    {
        return $this->createStepProcess()->process($request, new AddressType());
    }

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function shippingAction(Request $request)
    {
        return $this->createStepProcess()->process($request, new ShippingType());
    }

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function paymentAction(Request $request)
    {
        return $this->createStepProcess()->process($request, new PaymentType());
    }

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function summaryAction(Request $request)
    {
        return $this->createStepProcess()->process($request);
    }

    /**
     * @return StepProcess
     */
    protected function createStepProcess()
    {
        $quoteTransfer = $this->getFactory()->getCartClient()->getQuote();
        $stepProcess = new StepProcess(
            $quoteTransfer,
            $this->getApplication(),
            [
                'checkout-address' => new StepConfiguration(new AddressStep(), 'cart'),
                'checkout-shipping' => new StepConfiguration(new ShipmentStep(), 'cart'),
                'checkout-payment' => new StepConfiguration(new PaymentStep(), 'cart'),
                'checkout-summary' => new StepConfiguration(new SummaryStep(), 'cart'),
            ],
            $this->getFactory()->getCartClient()
        );

        return $stepProcess;
    }

}
