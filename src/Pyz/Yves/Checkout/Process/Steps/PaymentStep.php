<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Process\Steps;

use Spryker\Shared\Kernel\Transfer\AbstractTransfer;
use Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface;
use Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginCollection;
use Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginWithMessengerInterface;
use Symfony\Component\HttpFoundation\Request;

class PaymentStep extends AbstractBaseStep
{

    /**
     * @var \Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginCollection
     */
    protected $paymentPlugins;

    /**
     * @var \Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface
     */
    protected $flashMessenger;

    /**
     * @param \Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginCollection $paymentPlugins
     * @param string $stepRoute
     * @param string $escapeRoute
     * @param \Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface $flashMessenger
     */
    public function __construct(
        StepHandlerPluginCollection $paymentPlugins,
        $stepRoute,
        $escapeRoute,
        FlashMessengerInterface $flashMessenger
    ) {
        parent::__construct($stepRoute, $escapeRoute);

        $this->paymentPlugins = $paymentPlugins;
        $this->flashMessenger = $flashMessenger;
    }

    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer $quoteTransfer
     *
     * @return bool
     */
    public function requireInput(AbstractTransfer $quoteTransfer)
    {
        return true;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer|\Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Spryker\Shared\Kernel\Transfer\AbstractTransfer
     */
    public function execute(Request $request, AbstractTransfer $quoteTransfer)
    {
        $paymentSelection = $quoteTransfer->getPayment()->getPaymentSelection();

        if ($this->paymentPlugins->has($paymentSelection)) {
            $paymentHandler = $this->paymentPlugins->get($paymentSelection);
            if ($paymentHandler instanceof StepHandlerPluginWithMessengerInterface) {
                $paymentHandler->setFlashMessenger($this->flashMessenger);
            }
            $paymentHandler->addToDataClass($request, $quoteTransfer);
        }

        return $quoteTransfer;
    }

    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer|\Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(AbstractTransfer $quoteTransfer)
    {
        if ($quoteTransfer->getPayment() === null ||
            $quoteTransfer->getPayment()->getPaymentProvider() === null) {
            return false;
        }

        return true;
    }

}
