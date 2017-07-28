<?php

namespace Pyz\Zed\HelloWorld\Business;

use Pyz\Zed\HelloWorld\Model\Greeter;
use Spryker\Zed\Kernel\Business\AbstractFacade;
use Generated\Shared\Transfer\GreetingTransfer;

class HelloWorldFacade extends AbstractFacade
{
    public function greet(): GreetingTransfer
    {
        $transfer = new GreetingTransfer();
        $transfer->setGreeting(
            (string) $this->getFactory()->createGreeter()
        );

        return $transfer;
    }
}
