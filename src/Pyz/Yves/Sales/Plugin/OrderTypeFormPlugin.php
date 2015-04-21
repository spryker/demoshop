<?php

namespace Pyz\Yves\Sales\Plugin;

use SprykerEngine\Yves\Kernel\AbstractPlugin;

class OrderTypeFormPlugin extends AbstractPlugin
{
    /**
     * @return mixed
     */
    public function createOrderTypeForm()
    {
        return $this->dependencyContainer->createOrderTypeForm();
    }
}
