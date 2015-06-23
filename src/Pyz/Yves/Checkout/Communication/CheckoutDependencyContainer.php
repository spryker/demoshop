<?php

namespace Pyz\Yves\Checkout\Communication;

use SprykerEngine\Yves\Kernel\Communication\AbstractDependencyContainer;
use SprykerFeature\Client\Cart\Service\CartClientInterface;

class CheckoutDependencyContainer extends AbstractDependencyContainer
{

    /**
     * @return CartClientInterface
     */
    public function createCheckoutClient()
    {
        return $this->getLocator()->checkout->client();
    }

    /**
     * @return CartClientInterface
     */
    public function createCartClient()
    {
        return $this->getLocator()->cart->client();
    }

}
