<?php

namespace Pyz\Yves\Application\Communication\Bootstrap\Extension;

use Pyz\Yves\Customer\Communication\Plugin\UserProvider;
use Silex\Application;
use Silex\ServiceProviderInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

class PasswordMigrationProvider implements ServiceProviderInterface
{
    /**
     * @var UserProvider
     */
    protected $userProvider;

    /**
     * @var Application
     */
    protected $app;

    /**
     * @param UserProvider $userProvider
     */
    public function __construct(UserProvider $userProvider)
    {
        $this->userProvider = $userProvider;
    }

    /**
     * @param Application $app
     */
    public function boot(Application $app)
    {
        $app['dispatcher']->addListener(KernelEvents::REQUEST, [$this, 'onKernelRequest'], 255);
    }

    /**
     * @param Application $app
     */
    public function register(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();

        $username = $request->get('_username');
        $password = $request->get('_password');

        /** @var PasswordEncoderInterface $encoder */
        $encoder = $this->app['security.encoder.digest'];

        if ($username != null && $password != null ){
            $user = $this->userProvider->loadUserByUsername($username);

            if($this->userProvider->migrateMagentoPassword($username, $password)) {
                $this->userProvider->resetPassword($password);

            }

//            if ($encoder->isPasswordValid($user->getPassword(), $password, '')) {
//                $newEncodedPassword = $encoder->encodePassword($password, '');
//            }
        }

    }

}
