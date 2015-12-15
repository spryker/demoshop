<?php

namespace Pyz\Yves\Customer\Plugin;

use Spryker\Yves\Kernel\AbstractPlugin;

class RegisterForm extends AbstractPlugin
{

    /**
     * @return mixed
     */
    public function createFormRegister()
    {
        return $this->getDependencyContainer()->createFormRegister();
    }

}
