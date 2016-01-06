<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Customer\Plugin\Provider;

use Pyz\Yves\Customer\CustomerFactory;
use Silex\Application;
use Silex\ServiceProviderInterface;
use Spryker\Client\Customer\CustomerClientInterface;
use Spryker\Shared\Config;
use Spryker\Shared\Customer\CustomerConstants;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method CustomerClientInterface getClient()
 * @method CustomerFactory getFactory()
 */
class CustomerSecurityServiceProvider extends AbstractPlugin implements ServiceProviderInterface
{
    const FIREWALL_SECURED = 'secured';

    const ROLE_USER = 'ROLE_USER';

    const IS_AUTHENTICATED_ANONYMOUSLY = 'IS_AUTHENTICATED_ANONYMOUSLY';

    /**
     * @param Application $app
     *
     * @return void
     */
    public function register(Application $app)
    {
        $this->setSecurityFirewalls($app);

        $this->setSecurityAccessRules($app);

        $this->setAuthenticationSuccessHandler($app);
    }

    /**
     * @param Application $app
     *
     * @return void
     */
    public function boot(Application $app)
    {
    }

    /**
     * @param Application $app
     *
     * @return void
     */
    protected function setSecurityFirewalls(Application &$app)
    {
        $app['security.firewalls'] = [
            self::FIREWALL_SECURED => [
                'anonymous' => true,
                'pattern' => '^/',
                'form' => [
                    'login_path' => '/login',
                    'check_path' => '/login_check',
                    'username_parameter' => 'loginForm[email]',
                    'password_parameter' => 'loginForm[password]',
                ],
                'logout' => [
                    'logout_path' => '/logout',
                ],
                'users' => $app->share(function () {
                    return $this->getFactory()->createCustomerUserProvider();
                }),
            ],
        ];
    }

    /**
     * @param Application $app
     *
     * @return void
     */
    protected function setSecurityAccessRules(Application &$app)
    {
        $app['security.access_rules'] = [
            [
                Config::get(CustomerConstants::CUSTOMER_SECURED_PATTERN),
                self::ROLE_USER,
            ],
            [
                Config::get(CustomerConstants::CUSTOMER_ANONYMOUS_PATTERN),
                self::IS_AUTHENTICATED_ANONYMOUSLY,
            ],
        ];
    }

    /**
     * @param Application $app
     *
     * @return void
     */
    protected function setAuthenticationSuccessHandler(Application &$app)
    {
        $app['security.authentication.success_handler._proto'] = $app->protect(function ($name, $options) use ($app) {
            return $app->share(function () use ($name, $options, $app) {
                return $this->getFactory()->createCustomerAuthenticationSuccessHandler();
            });
        });
    }

}
