<?php


namespace Pyz\Client\Checkout;

use SprykerEngine\Client\Kernel\Container;
use SprykerFeature\Client\Checkout\CheckoutDependencyProvider as SprykerFeatureCheckoutDependencyProvider;

class CheckoutDependencyProvider extends SprykerFeatureCheckoutDependencyProvider
{
    const SERVICE_SESSION = 'session service';

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideServiceLayerDependencies(Container $container)
    {
        $container = parent::provideServiceLayerDependencies($container);

        $container[self::SERVICE_SESSION] = function (Container $container) {
            return $container->getLocator()->session()->client();
        };

        return $container;
    }

}
