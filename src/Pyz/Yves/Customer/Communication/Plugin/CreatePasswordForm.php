<?php

namespace Pyz\Yves\Customer\Communication\Plugin;

use Pyz\Yves\Customer\Communication\Form\CreatePassword;
use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;

class CreatePasswordForm extends AbstractPlugin
{

    /**
     * @return CreatePassword
     */
    public function createPasswordForm()
    {
        return $this->getDependencyContainer()->createFormCreatePassword();
    }

}
