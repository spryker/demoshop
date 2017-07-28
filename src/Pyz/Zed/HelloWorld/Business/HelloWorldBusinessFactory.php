<?php

namespace Pyz\Zed\HelloWorld\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Pyz\Zed\HelloWorld\Model\Greeter;

class HelloWorldBusinessFactory extends AbstractBusinessFactory
{
    public function createGreeter(): Greeter
    {
        return new Greeter($this->getConfig());
    }
}
