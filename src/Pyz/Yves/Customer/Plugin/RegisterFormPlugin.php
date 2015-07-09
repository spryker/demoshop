<?php

namespace Pyz\Yves\Customer\Plugin;

use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;

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
