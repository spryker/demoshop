<?php

namespace Pyz\Yves\Checkout;

use Generated\Shared\Transfer\PayolutionCalculationResponseTransfer;
use Generated\Shared\Transfer\ShipmentTransfer;
use SprykerEngine\Yves\Kernel\AbstractDependencyContainer;
use SprykerFeature\Client\Cart\Service\CartClientInterface;
use SprykerFeature\Client\Checkout\Service\CheckoutClient;
use Pyz\Yves\Checkout\Form\CheckoutType;
use SprykerFeature\Client\Glossary\Service\GlossaryClientInterface;
use SprykerFeature\Client\Payolution\Service\PayolutionClientInterface;
use SprykerFeature\Client\Shipment\Service\ShipmentClientInterface;
use Symfony\Component\HttpFoundation\Request;

class CheckoutDependencyContainer extends AbstractDependencyContainer
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
