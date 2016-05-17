<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Shared\Transfer\AbstractTransfer;
use Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginCollection;
use Symfony\Component\HttpFoundation\Request;

class PaymentStep extends BaseStep
{

    /**
     * @var \Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginCollection
     */
    protected $paymentPlugins;

    /**
     * @param \Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginCollection $paymentPlugins
     * @param \Spryker\Client\Cart\CartClientInterface $cartClient
     * @param string $stepRoute
     * @param string $escapeRoute
     */
    public function __construct(
        StepHandlerPluginCollection $paymentPlugins,
        CartClientInterface $cartClient,
        $stepRoute,
        $escapeRoute
    ) {
        parent::__construct($cartClient, $stepRoute, $escapeRoute);

        $this->paymentPlugins = $paymentPlugins;
    }

    /**
     * @return bool
     */
    public function requireInput()
    {
        return true;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param QuoteTransfer|AbstractTransfer $updatedQuoteTransfer
     *
     * @return void
     */
    public function execute(Request $request, AbstractTransfer $updatedQuoteTransfer = null)
    {
        $quoteTransfer = $this->getDataClass();
        $quoteTransfer->fromArray($updatedQuoteTransfer->modifiedToArray());

        $paymentSelection = $quoteTransfer->getPayment()->getPaymentSelection();

        if ($this->paymentPlugins->has($paymentSelection)) {
            $paymentHandler = $this->paymentPlugins->get($paymentSelection);
            $paymentHandler->addToDataClass($request, $quoteTransfer);
        }

        $this->setDataClass($quoteTransfer);
    }

    /**
     * @return bool
     */
    public function postCondition()
    {
        $quoteTransfer = $this->getDataClass();

        if ($quoteTransfer->getPayment() === null ||
            $quoteTransfer->getPayment()->getPaymentProvider() == null) {
            return false;
        }

        return true;
    }

}
