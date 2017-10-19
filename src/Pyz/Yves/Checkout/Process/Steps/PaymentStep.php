<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Process\Steps;

use ArrayObject;
use Generated\Shared\Transfer\PaymentMethodsTransfer;
use Generated\Shared\Transfer\PaymentTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Client\Payment\PaymentClientInterface;
use Spryker\Shared\Kernel\Transfer\AbstractTransfer;
use Spryker\Shared\Nopayment\NopaymentConfig;
use Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface;
use Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginCollection;
use Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginWithMessengerInterface;
use Spryker\Yves\StepEngine\Dependency\Step\StepWithBreadcrumbInterface;
use Symfony\Component\HttpFoundation\Request;

class PaymentStep extends AbstractBaseStep implements StepWithBreadcrumbInterface
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
     * @var \Spryker\Client\Payment\PaymentClientInterface
     */
    private $paymentClient;

    /**
     * @param \Spryker\Client\Payment\PaymentClientInterface $paymentClient
     * @param \Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginCollection $paymentPlugins
     * @param string $stepRoute
     * @param string $escapeRoute
     * @param \Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface $flashMessenger
     */
    public function __construct(
        PaymentClientInterface $paymentClient,
        StepHandlerPluginCollection $paymentPlugins,
        $stepRoute,
        $escapeRoute,
        FlashMessengerInterface $flashMessenger
    ) {
        parent::__construct($stepRoute, $escapeRoute);

        $this->paymentPlugins = $paymentPlugins;
        $this->flashMessenger = $flashMessenger;
        $this->paymentClient = $paymentClient;
    }

    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer|\Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function requireInput(AbstractTransfer $quoteTransfer)
    {
        $totals = $quoteTransfer->getTotals();

        if (!$totals) {
            return true;
        }

        return $totals->getPriceToPay() > 0;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer|\Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Spryker\Shared\Kernel\Transfer\AbstractTransfer
     */
    public function execute(Request $request, AbstractTransfer $quoteTransfer)
    {
        $paymentSelection = $this->getPaymentSelectionWithFallback($quoteTransfer);

        if ($paymentSelection === null) {
            return $quoteTransfer;
        }

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
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return null|string
     */
    protected function getPaymentSelectionWithFallback(QuoteTransfer $quoteTransfer)
    {
        $payment = $quoteTransfer->getPayment();

        if ($quoteTransfer->getTotals()->getPriceToPay() === 0) {
            return NopaymentConfig::PAYMENT_PROVIDER_NAME;
        }

        if ($payment) {
            return $payment->getPaymentSelection();
        }

        return null;
    }

    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer|\Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(AbstractTransfer $quoteTransfer)
    {
        $totals = $quoteTransfer->getTotals();

        if (!$totals) {
            return false;
        }

        $paymentCollection = $this->getPaymentCollection($quoteTransfer);

        if ($paymentCollection->count() === 0) {
            return false;
        }

        return $this->isValidPaymentSelection($paymentCollection, $quoteTransfer);
    }

    /**
     * @deprecated To be removed when the single payment property on the quote is removed
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\PaymentTransfer[]|\ArrayObject
     */
    protected function getPaymentCollection(QuoteTransfer $quoteTransfer)
    {
        $result = new ArrayObject();
        foreach ($quoteTransfer->getPayments() as $payment) {
            $result[] = $payment;
        }

        $singlePayment = $quoteTransfer->getPayment();

        if ($singlePayment) {
            $singlePayment->setAmount($quoteTransfer->getTotals()->getPriceToPay());
            $result[] = $singlePayment;
        }

        return $result;
    }

    /**
     * @param \Generated\Shared\Transfer\PaymentTransfer[]|\ArrayObject $paymentCollection
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer|\Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    protected function isValidPaymentSelection(ArrayObject $paymentCollection, AbstractTransfer $quoteTransfer)
    {
        $paymentMethods = $this->paymentClient->getAvailableMethods($quoteTransfer);

        foreach ($paymentCollection as $candidatePayment) {
            if (!$this->containsPayment($paymentMethods, $candidatePayment)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param \Generated\Shared\Transfer\PaymentMethodsTransfer $paymentMethodsTransfer
     * @param \Generated\Shared\Transfer\PaymentTransfer $paymentTransfer
     *
     * @return bool
     */
    protected function containsPayment(PaymentMethodsTransfer $paymentMethodsTransfer, PaymentTransfer $paymentTransfer)
    {
        foreach ($paymentMethodsTransfer->getAvailableMethods() as $paymentInformationTransfer) {
            if ($paymentInformationTransfer->getMethod() === $paymentTransfer->getPaymentSelection()) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return string
     */
    public function getBreadcrumbItemTitle()
    {
        return 'checkout.step.payment.title';
    }

    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer $dataTransfer
     *
     * @return bool
     */
    public function isBreadcrumbItemEnabled(AbstractTransfer $dataTransfer)
    {
        return $this->postCondition($dataTransfer);
    }

    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer $dataTransfer
     *
     * @return bool
     */
    public function isBreadcrumbItemHidden(AbstractTransfer $dataTransfer)
    {
        return !$this->requireInput($dataTransfer);
    }
}
