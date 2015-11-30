<?php

namespace Pyz\Yves\Checkout\Communication;

use Generated\Shared\Transfer\ShipmentTransfer;
use Generated\Yves\Ide\FactoryAutoCompletion\CheckoutCommunication;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;
use SprykerFeature\Client\Cart\Service\CartClientInterface;
use SprykerFeature\Client\Checkout\Service\CheckoutClient;
use Pyz\Yves\Checkout\Communication\Form\CheckoutType;
use SprykerFeature\Client\Glossary\Service\GlossaryClientInterface;
use SprykerFeature\Client\Shipment\Service\ShipmentClientInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method CheckoutCommunication getFactory()
 */
class CheckoutDependencyContainer extends AbstractCommunicationDependencyContainer
{

    /**
     * @return CheckoutClient
     */
    public function createCheckoutClient()
    {
        return $this->getLocator()->checkout()->client();
    }

    /**
     * @return CartClientInterface
     */
    public function createCartClient()
    {
        return $this->getLocator()->cart()->client();
    }

    /**
     * @return ShipmentClientInterface
     */
    public function createShipmentClient()
    {
        return $this->getLocator()->shipment()->client();
    }

    /**
     * @return GlossaryClientInterface
     */
    public function createGlossaryClient()
    {
        return $this->getLocator()->glossary()->client();
    }

    /**
     * @param Request $request
     * @param ShipmentTransfer $shipmentTransfer
     *
     * @return CheckoutType
     */
    public function createCheckoutForm(Request $request, ShipmentTransfer $shipmentTransfer)
    {
        return $this->getFactory()
            ->createFormCheckoutType(
                $request,
                $shipmentTransfer,
                $this->createGlossaryClient()
            );
    }

}
