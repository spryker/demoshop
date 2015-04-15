<?php

namespace Pyz\Yves\Sales\Plugin;

use SprykerCore\Yves\Kernel\AbstractPlugin;

class OrderTypeFormPlugin extends AbstractPlugin
{
    /**
     * @return mixed
     */
    public function createOrderTypeForm()
    {
        return $this->getDependencyContainer()->createOrderTypeForm();
    }
}
