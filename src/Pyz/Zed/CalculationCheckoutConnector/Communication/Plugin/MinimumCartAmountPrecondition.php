<?php

namespace Pyz\Zed\CalculationCheckoutConnector\Communication\Plugin;

use Generated\Shared\Transfer\CheckoutRequestTransfer;
use Generated\Shared\Transfer\CheckoutResponseTransfer;
use SprykerFeature\Zed\Checkout\Dependency\Plugin\CheckoutPreconditionInterface;
use Generated\Shared\Transfer\CheckoutErrorTransfer;
use Pyz\Zed\Glossary\Business\GlossaryFacade;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use Pyz\Zed\CalculationCheckoutConnector\Business\CalculationCheckoutConnectorDependencyContainer;

/**
 * @method CalculationCheckoutConnectorDependencyContainer getDependencyContainer()
 */
class MinimumCartAmountPrecondition extends AbstractPlugin implements CheckoutPreconditionInterface
{
    const ERROR_CART_TOTAL_IS_TOO_LOW = 'error.cart-total-is-too-low';

    /**
     * @param CheckoutRequestTransfer $checkoutRequest
     * @param CheckoutResponseTransfer $checkoutResponse
     */
    public function checkCondition(CheckoutRequestTransfer $checkoutRequest, CheckoutResponseTransfer $checkoutResponse)
    {
        var_dump($this->getDependencyContainer()); die();
        $minimumCheckoutCartValue = $this->getDependencyContainer()->getConfig()->getMinimumCheckoutCartValue();
        $subtotal = $checkoutRequest->getCart()->getTotals()->getSubtotal();

        /** @var GlossaryFacade $glossary */
        $glossary = $this->getDependencyContainer()->getGlossaryFacade();

        if ($subtotal < $minimumCheckoutCartValue)
        {
            $error = new CheckoutErrorTransfer();
            $error->setErrorCode(1);
            $error->setMessage($glossary->translate(self::ERROR_CART_TOTAL_IS_TOO_LOW));
            $checkoutResponse->addError($error);
        }
    }
}
