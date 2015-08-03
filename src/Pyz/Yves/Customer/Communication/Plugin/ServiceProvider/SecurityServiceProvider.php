<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Customer\Communication\Plugin\ServiceProvider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use SprykerEngine\Shared\Config;
use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Shared\Customer\CustomerConfig;
use Pyz\Yves\Customer\Communication\Plugin\UserProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class SecurityServiceProvider extends AbstractPlugin implements
    ServiceProviderInterface,
    AuthenticationSuccessHandlerInterface,
    AuthenticationFailureHandlerInterface
{

    /**
     * @var UserProvider
     */
    private $userProvider;

    /**
     * @param UserProvider $userProvider
     *
     * @return SecurityServiceProvider
     */
    public function setUserProvider(UserProvider $userProvider)
    {
        $this->userProvider = $userProvider;

        return $this;
    }

    /**
     * @param Application $app
     */
    public function register(Application $app)
    {
        $app['security.authentication.success_handler._proto'] = $app->protect(function ($name, $options) use ($app) {
            return $app->share(function () use ($name, $options, $app) {
                return $this;
            });
        });

        $app['security.authentication.failure_handler._proto'] = $app->protect(function ($name, $options) use ($app) {
            return $app->share(function () use ($name, $options, $app) {
                return $this;
            });
        });

        $app['security.firewalls'] = [
            'secured' => [
                'anonymous' => true,
                'pattern' => '^/',
                'form' => [
                    'login_path' => '/login',
                    'login_check' => '/login_check',
                ],
                'logout' => [
                    'logout_path' => '/customer/logout',
                ],
                'users' => $app->share(function ($app) {
                    return $this->userProvider;
                }),
            ],
        ];

        $app['security.access_rules'] = [
            [
                '^/login',
                'IS_AUTHENTICATED_ANONYMOUSLY',
            ],
            [
                Config::get(CustomerConfig::CUSTOMER_SECURED_PATTERN),
                'ROLE_USER',
            ],
            [
                Config::get(CustomerConfig::CUSTOMER_ANONYMOUS_PATTERN),
                'IS_AUTHENTICATED_ANONYMOUSLY',
            ],
        ];
    }

    /**
     * @param Application $app
     */
    public function boot(Application $app)
    {
    }

    /**
     * @param Request $request
     * @param TokenInterface $token
     *
     * @return Response
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        $array = ['success' => true];
        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @param Request $request
     * @param AuthenticationException $exception
     *
     * @return Response
     */
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $array = ['success' => false, 'message' => $exception->getMessage()]; // data to return via JSON
        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

}
