<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Controller;

use Codeception\Step;
use Pyz\Yves\Checkout\Form\Multipage\PaymentType;
use Pyz\Yves\Checkout\Process\StepProcess;
use Pyz\Yves\Checkout\Process\Steps\RegisterStep;
use Spryker\Yves\Application\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Pyz\Yves\Checkout\CheckoutFactory;

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
        return $this->createStepProcess()->process($request, $this->getFactory()->createAddressCollectionType());
    }

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function shipmentAction(Request $request)
    {
        return $this->createStepProcess()->process($request, $this->getFactory()->createShipmentType());
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
        return $this->getFactory()->createCheckoutProcess($this->getApplication());
    }

}
