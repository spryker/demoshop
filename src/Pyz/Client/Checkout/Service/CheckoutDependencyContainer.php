<?php

namespace Pyz\Client\Checkout\Service;

use Pyz\Client\Checkout\Service\Session\OrderSuccessSessionInterface;
use Pyz\Client\Checkout\CheckoutDependencyProvider;
use SprykerFeature\Client\Checkout\Service\CheckoutDependencyContainer as SprykerFeatureCheckoutDependencyContainer;

class CheckoutDependencyContainer extends SprykerFeatureCheckoutDependencyContainer
{

    /**
     * @return OrderSuccessSessionInterface
     */
    public function createSessionOrderSuccessSession()
    {
        return $this->getFactory()->createSessionOrderSuccessSession(
            $this->getProvidedDependency(CheckoutDependencyProvider::SERVICE_SESSION)
        );
    }


}
