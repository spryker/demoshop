<?php

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Application\Business\Model\FlashMessengerInterface;
use Pyz\Yves\Checkout\Dependency\Plugin\CheckoutStepHandlerPluginInterface;
use Symfony\Component\HttpFoundation\Request;

class PaymentStep extends BaseStep implements StepInterface
{

    /**
     * @var CheckoutStepHandlerPluginInterface[]
     */
    protected $paymentPlugins;

    /**
     * @param FlashMessengerInterface $flashMessenger
     * @param string $stepRoute
     * @param string $escapeRoute
     * @param CheckoutStepHandlerPluginInterface[] $paymentPlugins
     */
    public function __construct(
        FlashMessengerInterface $flashMessenger,
        $stepRoute,
        $escapeRoute,
        $paymentPlugins
    ) {
        parent::__construct($flashMessenger, $stepRoute, $escapeRoute);

        $this->paymentPlugins = $paymentPlugins;
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function preCondition(QuoteTransfer $quoteTransfer)
    {
        return !$this->isCartEmpty($quoteTransfer);
    }

    /**
     * @return bool
     */
    public function requireInput()
    {
        return true;
    }

    /**
     * @param Request $request
     * @param QuoteTransfer $quoteTransfer
     *
     * @return QuoteTransfer
     */
    public function execute(Request $request, QuoteTransfer $quoteTransfer)
    {
        $paymentSelection = $quoteTransfer->getPayment()->getPaymentSelection();

        if (isset($this->paymentPlugins[$paymentSelection])) {
            $paymentHandler = $this->paymentPlugins[$paymentSelection];
            $paymentHandler->addToQuote($request, $quoteTransfer);
        }

        return $quoteTransfer;
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(QuoteTransfer $quoteTransfer)
    {
        return true;
    }

}
