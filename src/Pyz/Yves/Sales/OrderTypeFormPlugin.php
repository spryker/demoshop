<?php

namespace Pyz\Yves\Sales;

use SprykerCore\Yves\Kernel\AbstractPlugin;

/**
 * Class OrderFormPlugin
 * @package Pyz\Yves\Sales
 */
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
