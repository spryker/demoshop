<?php

namespace Pyz\Yves\Checkout\Communication;

use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;
use SprykerFeature\Client\Cart\Service\CartClientInterface;
use SprykerFeature\Client\Checkout\Service\CheckoutClient;
use Pyz\Yves\Checkout\Communication\Form\Checkout;
use SprykerEngine\Yves\Kernel\Factory;
use Pyz\Yves\Checkout\Communication\Form\QuickRegistration;

/**
 * @method Factory getFactory()
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
     * @return Checkout
     */
    public function createCheckoutForm()
    {
        return $this->getFactory()->createFormCheckout();
    }

    /**
     * @return QuickRegistration
     */
    public function createQuickRegistrationForm()
    {
        return $this->getFactory()->createFormQuickregistration();
    }

}
