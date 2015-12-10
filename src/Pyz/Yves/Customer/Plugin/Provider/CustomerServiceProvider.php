<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Customer\Plugin\Provider;

use Pyz\Yves\Customer\Plugin\RegisterForm;
use Pyz\Yves\Application\Plugin\Provider\AbstractServiceProvider;
use Silex\Application;

class CustomerServiceProvider extends AbstractServiceProvider
{

    /**
     * @param Application $app
     *
     * @return void
     */
    public function register(Application $app)
    {
        $this->addGlobalTemplateVariable($app, [
            'registerForm' => $app['form.factory']->create(
                (new RegisterForm())->createFormRegister()
            )->createView(),
        ]);
    }

    /**
     * @param Application $app
     *
     * @return void
     */
    public function boot(Application $app)
    {
    }

}
