<?php

namespace Pyz\Yves\Customer\Plugin;

use SprykerEngine\Yves\Kernel\AbstractPlugin;

class RegisterFormPlugin extends AbstractPlugin
{
    /**
     * @return mixed
     */
    public function createFormRegister()
    {
        return $this->getDependencyContainer()->createFormRegister();
    }
}
