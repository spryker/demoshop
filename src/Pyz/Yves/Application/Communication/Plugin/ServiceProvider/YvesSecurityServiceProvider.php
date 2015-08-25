<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Application\Communication\Plugin\ServiceProvider;

use Silex\Application;
use Silex\Provider\SecurityServiceProvider;
use SprykerEngine\Client\Kernel\Container;
use Symfony\Component\Security\Core\Encoder\BCryptPasswordEncoder;

class YvesSecurityServiceProvider extends SecurityServiceProvider
{

    const BCRYPT_FACTOR = 12;

    /**
     * @param Container $app
     */
    public function register(Application $app)
    {
        parent::register($app);

        $app['security.encoder.digest'] = function ($app) {
            return new BCryptPasswordEncoder(self::BCRYPT_FACTOR);
        };
    }
}
