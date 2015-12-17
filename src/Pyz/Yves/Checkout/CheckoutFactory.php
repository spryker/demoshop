<?php

namespace Pyz\Yves\Checkout;

use Generated\Shared\Transfer\PayolutionCalculationResponseTransfer;
use Generated\Shared\Transfer\ShipmentTransfer;
use Spryker\Yves\Kernel\AbstractFactory;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Client\Checkout\CheckoutClient;
use Pyz\Yves\Checkout\Form\CheckoutType;
use Spryker\Client\Glossary\GlossaryClientInterface;
use Spryker\Client\Payolution\PayolutionClientInterface;
use Spryker\Client\Shipment\ShipmentClientInterface;
use Symfony\Component\HttpFoundation\Request;
use Spryker\Shared\Config;
use Spryker\Shared\Payolution\PayolutionConstants;

class CheckoutFactory extends AbstractFactory
{

    /**
     * @return CheckoutClient
     */
    public function getCheckoutClient()
    {
        return $this->getLocator()->checkout()->client();
    }

    /**
     * @return CartClientInterface
     */
    public function getCartClient()
    {
        return $this->getLocator()->cart()->client();
    }

    /**
     * @return ShipmentClientInterface
     */
    public function getShipmentClient()
    {
        return $this->getLocator()->shipment()->client();
    }

    /**
     * @return GlossaryClientInterface
     */
    public function getGlossaryClient()
    {
        return $this->getLocator()->glossary()->client();
    }

    /**
     * @return PayolutionClientInterface
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
     * @param Request $request
     * @param ShipmentTransfer $shipmentTransfer
     * @param PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer
     *
     * @return CheckoutType
     */
    public function createCheckoutForm(
        Request $request,
        ShipmentTransfer $shipmentTransfer,
        PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer
    ) {
        return new CheckoutType(
                $request,
                $shipmentTransfer,
                $this->getGlossaryClient(),
                $payolutionCalculationResponseTransfer
            );
    }

}
