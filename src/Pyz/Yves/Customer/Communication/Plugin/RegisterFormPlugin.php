<?php

namespace Pyz\Yves\Sales\Plugin;

use SprykerEngine\Yves\Kernel\AbstractPlugin;

class RegisterFormPlugin extends AbstractPlugin
{
    /**
     * @return mixed
     */
    public function createRegisterForm()
    {
        return $this->getDependencyContainer()->createRegisterForm();
    }
}
