<?php

namespace Pyz\Zed\HelloWorld\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;

class GatewayController extends AbstractGatewayController
{
    public function greetingAction()
    {
        return $this->getFacade()->greet();
    }
}
