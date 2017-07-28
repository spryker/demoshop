<?php

namespace Pyz\Zed\HelloWorld;

use Spryker\Zed\Kernel\AbstractBundleConfig;

class HelloWorldConfig extends AbstractBundleConfig
{
    public function getGreeting(): string
    {
        return 'Hello World';
    }
}
