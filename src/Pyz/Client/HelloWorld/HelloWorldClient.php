<?php

namespace Pyz\Client\HelloWorld;

use Spryker\Client\Kernel\AbstractClient;

class HelloWorldClient extends AbstractClient
{
    public function getGreeting()
    {
        return $this->getFactory()->createZedStub()->getGreeting();
    }
}
