<?php

namespace Pyz\Yves\Application\Plugin\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use SprykerEngine\Yves\Kernel\AbstractPlugin;
use Symfony\Component\Security\Core\Encoder\BCryptPasswordEncoder;

class YvesSecurityServiceProvider extends AbstractPlugin implements ServiceProviderInterface
{

    const BCRYPT_FACTOR = 12;

    /**
     * @param Application $app
     */
    public function register(Application $app)
    {
        $app['security.encoder.digest'] = function ($app) {
            return new BCryptPasswordEncoder(self::BCRYPT_FACTOR);
        };
    }

    /**
     * @param Application $app
     */
    public function boot(Application $app)
    {
    }

}
