<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Application\Plugin\Provider;

use Silex\Application;
use Symfony\Component\Security\Core\Encoder\BCryptPasswordEncoder;

class YvesSecurityServiceProvider extends AbstractServiceProvider
{
    const BCRYPT_FACTOR = 12;

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function register(Application $app)
    {
        $app['security.encoder.digest'] = function ($app) {
            return new BCryptPasswordEncoder(self::BCRYPT_FACTOR);
        };
    }

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function boot(Application $app)
    {
    }
}
