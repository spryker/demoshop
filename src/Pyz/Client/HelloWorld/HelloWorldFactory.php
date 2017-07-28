<?php

namespace Pyz\Client\HelloWorld;

use Spryker\Client\Kernel\AbstractFactory;

class HelloWorldFactory extends AbstractFactory
{
    public function createZedStub()
    {
        return new HelloWorldZedStub($this->getZedRequestClient());
    }

    protected function getZedRequestClient()
    {
        return $this->getProvidedDependency(HelloWorldDependencyProvider::ZED_REQUEST_CLIENT);
    }
}
