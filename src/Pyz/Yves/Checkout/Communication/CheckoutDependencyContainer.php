<?php

namespace Pyz\Yves\Checkout\Communication;

use Generated\Shared\Adyen\AdyenPaymentMethodsInterface;
use Generated\Yves\Ide\FactoryAutoCompletion\CheckoutCommunication;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;
use SprykerFeature\Client\Cart\Service\CartClientInterface;
use SprykerFeature\Client\Checkout\Service\CheckoutClient;
use Pyz\Yves\Checkout\Communication\Form\Checkout;
use SprykerFeature\Client\Shipment\Service\ShipmentClientInterface;
use PavFeature\Client\Adyen\Service\AdyenClientInterface;

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
     * @return AdyenClientInterface
     */
    public function createAdyenClient()
    {
        return $this->getLocator()->adyen()->client();
    }

    /**
     * @param AdyenPaymentMethodsInterface $paymentMethodsTransfer
     * @return Checkout
     */
    public function createCheckoutForm(
        AdyenPaymentMethodsInterface $paymentMethodsTransfer
    ){
        return $this->getFactory()
            ->createFormCheckout($paymentMethodsTransfer)
        ;
    }

}
