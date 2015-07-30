<?php

namespace Pyz\Yves\Checkout\Communication;

use Generated\Yves\Ide\FactoryAutoCompletion\CheckoutCommunication;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;
use SprykerFeature\Client\Cart\Service\CartClientInterface;
use SprykerFeature\Client\Checkout\Service\CheckoutClient;
use Pyz\Yves\Checkout\Communication\Form\Checkout;
use SprykerFeature\Client\Shipment\Service\ShipmentClientInterface;

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
        return $this->getLocator()
            ->checkout()
            ->client()
            ;
    }

    /**
     * @return CartClientInterface
     */
    public function createCartClient()
    {
        return $this->getLocator()
            ->cart()
            ->client()
            ;
    }

    /**
     * @return Checkout
     */
    public function createCheckoutForm()
    {
        $shipmentTransfer = $this->createShipmentClient()
            ->getAvailableMethods($this->createCartClient()
                ->getCart())
        ;

        return $this->getFactory()
            ->createFormCheckout($shipmentTransfer)
            ;
    }

    /**
     * @return ShipmentClientInterface
     */
    public function createShipmentClient()
    {
        return $this->getLocator()
            ->shipment()
            ->client()
            ;
    }
}
