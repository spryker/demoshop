<?php

namespace Pyz\Yves\Sales\Plugin;

use Pyz\Yves\Sales\SalesDependencyContainer;
use SprykerEngine\Yves\Kernel\AbstractPlugin;

/**
 * @method SalesDependencyContainer getDependencyContainer()
 */
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
