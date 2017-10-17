<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractServiceProvider;
use Pyz\Yves\Customer\Form\LoginForm;
use Silex\Application;
use Spryker\Shared\Config\Config;
use Spryker\Shared\Customer\CustomerConstants;
use Symfony\Component\Security\Http\Firewall\UsernamePasswordFormAuthenticationListener;

/**
 * @method \Spryker\Client\Customer\CustomerClientInterface getClient()
 * @method \Pyz\Yves\Customer\CustomerFactory getFactory()
 */
class CustomerSecurityServiceProvider extends AbstractServiceProvider
{
    const FIREWALL_SECURED = 'secured';
    const ROLE_USER = 'ROLE_USER';
    const IS_AUTHENTICATED_ANONYMOUSLY = 'IS_AUTHENTICATED_ANONYMOUSLY';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function register(Application $app)
    {
        $this->setSecurityFirewalls($app);
        $this->setSecurityAccessRules($app);
        $this->setAuthenticationSuccessHandler($app);
        $this->setAuthenticationFailureHandler($app);
    }

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function boot(Application $app)
    {
    }

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function setSecurityFirewalls(Application &$app)
    {
        $selectedLanguage = $this->findSelectedLanguage($app);

        $app['security.firewalls'] = [
            self::FIREWALL_SECURED => [
                'anonymous' => true,
                'pattern' => '^/',
                'form' => [
                    'login_path' => '/login',
                    'check_path' => '/login_check',
                    'username_parameter' => LoginForm::FORM_NAME . '[' . LoginForm::FIELD_EMAIL . ']',
                    'password_parameter' => LoginForm::FORM_NAME . '[' . LoginForm::FIELD_PASSWORD . ']',
                    'listener_class' => UsernamePasswordFormAuthenticationListener::class,
                ],
                'logout' => [
                    'logout_path' => $this->buildLogoutPath($selectedLanguage),
                    'target_url' => $this->buildLogoutTargetUrl($selectedLanguage),
                ],
                'users' => $app->share(function () {
                    return $this->getFactory()->createCustomerUserProvider();
                }),
            ],
        ];
    }

    /**
     * @param \Silex\Application $app
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
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function setAuthenticationSuccessHandler(Application &$app)
    {
        $app['security.authentication.success_handler._proto'] = $app->protect(function () use ($app) {
            return $app->share(function () {
                return $this->getFactory()->createCustomerAuthenticationSuccessHandler();
            });
        });
    }

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function setAuthenticationFailureHandler(Application &$app)
    {
        $app['security.authentication.failure_handler._proto'] = $app->protect(function () use ($app) {
            return $app->share(function () {
                return $this->getFactory()->createCustomerAuthenticationFailureHandler();
            });
        });
    }

    /**
     * @param string $prefixLocale
     *
     * @return string
     */
    protected function buildLogoutPath($prefixLocale)
    {
        $logoutPath = '/logout';
        if ($prefixLocale) {
            $logoutPath = '/' . $prefixLocale . $logoutPath;
        }
        return $logoutPath;
    }

    /**
     * @SuppressWarnings(PHPMD.Superglobals)
     *
     * @param \Silex\Application $app
     *
     * @return string|null
     */
    protected function findSelectedLanguage(Application &$app)
    {
        $currentLocale = $app['locale'];
        $requestUri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';

        $prefixLocale = mb_substr($currentLocale, 0, 2);
        $localePath = mb_substr($requestUri, 1, 3);

        if ($prefixLocale . '/' !== $localePath) {
            return null;
        }
        return $prefixLocale;
    }

    /**
     * @param string $selectedLanguage
     *
     * @return string
     */
    protected function buildLogoutTargetUrl($selectedLanguage)
    {
        $logoutTarget = '/';
        if ($selectedLanguage) {
            $logoutTarget .= $selectedLanguage;
        }
        return $logoutTarget;
    }
}
