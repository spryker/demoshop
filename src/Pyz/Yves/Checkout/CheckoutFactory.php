<?php

namespace Pyz\Yves\Checkout;

use Generated\Shared\Transfer\CheckoutRequestTransfer;
use Generated\Shared\Transfer\PayolutionCalculationResponseTransfer;
use Generated\Shared\Transfer\ShipmentTransfer;
use Spryker\Yves\Kernel\AbstractFactory;
use Pyz\Yves\Checkout\Form\CheckoutType;
use Symfony\Component\HttpFoundation\Request;
use Spryker\Shared\Config;
use Spryker\Shared\Payolution\PayolutionConstants;

class CheckoutFactory extends AbstractFactory
{

    /**
     * @return \Spryker\Client\Checkout\CheckoutClient
     */
    public function getCheckoutClient()
    {
        return $this->getLocator()->checkout()->client();
    }

    /**
     * @return \Spryker\Client\Cart\CartClientInterface
     */
    public function getCartClient()
    {
        return $this->getLocator()->cart()->client();
    }

    /**
     * @return \Spryker\Client\Shipment\ShipmentClientInterface
     */
    public function getShipmentClient()
    {
        return $this->getLocator()->shipment()->client();
    }

    /**
     * @return \Spryker\Client\Glossary\GlossaryClientInterface
     */
    public function getGlossaryClient()
    {
        return $this->getLocator()->glossary()->client();
    }

    /**
     * @return \Spryker\Client\Payolution\PayolutionClientInterface
     */
    public function getPayolutionClient()
    {
        return $this->getLocator()->payolution()->client();
    }

    /**
     * @return string[]
     */
    public function getPayolutionCalculationCredentials()
    {
        return [
            PayolutionConstants::CALCULATION_USER_LOGIN => Config::get(PayolutionConstants::CALCULATION_USER_LOGIN),
            PayolutionConstants::CALCULATION_USER_PASSWORD => Config::get(PayolutionConstants::CALCULATION_USER_PASSWORD),
        ];
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Generated\Shared\Transfer\ShipmentTransfer $shipmentTransfer
     * @param \Generated\Shared\Transfer\PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer
     * @param CheckoutRequestTransfer $checkoutRequestTransfer
     *
     * @return CheckoutType
     */
    public function createCheckoutForm(
        Request $request,
        ShipmentTransfer $shipmentTransfer,
        PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer,
        CheckoutRequestTransfer $checkoutRequestTransfer
    ) {
        $formType = new CheckoutType(
                $request,
                $shipmentTransfer,
                $this->getGlossaryClient(),
                $payolutionCalculationResponseTransfer
            );
        return $this->getFormFactory()->create($formType, $checkoutRequestTransfer);
    }

}
