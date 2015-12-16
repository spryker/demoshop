<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Controller;

use Codeception\Step;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Checkout\Form\Multipage\PaymentType;
use Pyz\Yves\Checkout\Form\Multipage\ShippingType;
use Pyz\Yves\Checkout\Wizard\StepProcess;
use Pyz\Yves\Checkout\Wizard\Steps\AddressStep;
use Pyz\Yves\Checkout\Wizard\Steps\PaymenStep;
use Pyz\Yves\Checkout\Wizard\Steps\ShipmentStep;
use Pyz\Yves\Checkout\Wizard\Steps\StepInterface;
use Pyz\Yves\Checkout\Wizard\Steps\SummaryStep;
use Spryker\Yves\Application\Controller\AbstractController;
use Pyz\Yves\Checkout\Wizard\CheckoutWizard;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Pyz\Yves\Checkout\CheckoutDependencyContainer;
use Symfony\Component\Form\AbstractType;
use Pyz\Yves\Checkout\Form\Multipage\AddressType;

/**
 * @method CheckoutDependencyContainer getDependencyContainer()
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
        $quoteTransfer = $this->getDependencyContainer()->getCartClient()->getQuote();
        $stepProcess = new StepProcess(
            $quoteTransfer,
            $this->getApplication(),
            [
                'checkout-address' => new AddressStep(),
                'checkout-shipping' => new ShipmentStep(),
                'checkout-payment' => new PaymenStep(),
                'checkout-summary' => new SummaryStep(),
            ]
        );

        return $stepProcess;

    }
}
