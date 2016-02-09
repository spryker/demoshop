<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Application\Plugin\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Spryker\Yves\Kernel\AbstractPlugin;
use Pyz\Yves\Application\Business\Model\FlashMessenger;

class FlashMessengerServiceProvider extends AbstractPlugin implements ServiceProviderInterface
{

    /**
     * Registers services on the given app.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     */
    public function register(Application $app)
    {
        $app['flash_messenger'] = function ($app) {
            return $this->createFlashMessenger($app);
        };
    }

    /**
     * Bootstraps the application.
     *
     * This method is called after all services are registered
     * and should be used for "dynamic" configuration (whenever
     * a service must be requested).
     */
    public function boot(Application $app)
    {
    }

    /**
     * @param \Silex\Application $app
     *
     * @return \Pyz\Yves\Application\Business\Model\FlashMessenger
     */
    protected function createFlashMessenger(Application $app)
    {
        return new FlashMessenger($app['session']->getFlashBag());
    }
}
