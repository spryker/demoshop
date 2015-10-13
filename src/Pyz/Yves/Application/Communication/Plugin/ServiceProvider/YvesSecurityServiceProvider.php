<?php

namespace Pyz\Yves\Application\Communication\Plugin\ServiceProvider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;
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
