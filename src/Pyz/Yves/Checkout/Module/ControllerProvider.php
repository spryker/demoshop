<?php
namespace Pyz\Yves\Checkout\Module;

use ProjectA\Yves\Library\Silex\Controller\ControllerProvider as YvesProvider;

class ControllerProvider extends YvesProvider
{
    const ROUTE_CHECKOUT = 'checkout';

    protected function defineControllers()
    {
        $this->createGetController('/checkout', 'Pyz\\Yves\\Checkout\\Module\\Controller\\CheckoutController', 'index', self::ROUTE_CHECKOUT);
    }
}
