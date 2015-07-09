<?php

namespace Pyz\Yves\Sales\Plugin;

use Pyz\Yves\Sales\SalesDependencyContainer;
use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;

/**
 * @method SalesDependencyContainer getDependencyContainer()
 */
class OrderTypeForm extends AbstractPlugin
{

    /**
     * @return mixed
     */
    public function createOrderTypeForm()
    {
        return $this->getDependencyContainer()->createOrderTypeForm();
    }

}
