<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Yves\StepEngine\Dependency\Plugin\Handler\CheckoutStepHandlerPluginCollection;
use Spryker\Yves\StepEngine\Process\Steps\BaseStep;
use Symfony\Component\HttpFoundation\Request;

class PaymentStep extends BaseStep
{

    /**
     * @var \Spryker\Yves\StepEngine\Dependency\Plugin\Handler\CheckoutStepHandlerPluginCollection
     */
    protected $paymentPlugins;

    /**
     * @param string $stepRoute
     * @param string $escapeRoute
     * @param \Spryker\Yves\StepEngine\Dependency\Plugin\Handler\CheckoutStepHandlerPluginCollection $paymentPlugins
     */
    public function __construct(
        $stepRoute,
        $escapeRoute,
        CheckoutStepHandlerPluginCollection $paymentPlugins
    ) {
        parent::__construct($stepRoute, $escapeRoute);

        $this->paymentPlugins = $paymentPlugins;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function preCondition(QuoteTransfer $quoteTransfer)
    {
        return !$this->isCartEmpty($quoteTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function requireInput(QuoteTransfer $quoteTransfer)
    {
        return true;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function execute(Request $request, QuoteTransfer $quoteTransfer)
    {
        $paymentSelection = $quoteTransfer->getPayment()->getPaymentSelection();

        if ($this->paymentPlugins->has($paymentSelection)) {
            $paymentHandler = $this->paymentPlugins->get($paymentSelection);
            $paymentHandler->addToQuote($request, $quoteTransfer);
        }

        return $quoteTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(QuoteTransfer $quoteTransfer)
    {
        if ($quoteTransfer->getPayment() === null ||
            $quoteTransfer->getPayment()->getPaymentProvider() == null) {
            return false;
        }

        return true;
    }

}
