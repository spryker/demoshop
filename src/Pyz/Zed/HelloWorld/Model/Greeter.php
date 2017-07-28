<?php

namespace Pyz\Zed\HelloWorld\Model;

use Spryker\Shared\Config;
use Pyz\Zed\HelloWorld\HelloWorldConfig;

class Greeter
{
    /**
     * @var Config
     */
    private $config;

    public function __construct(HelloWorldConfig $config)
    {
        $this->config = $config;
    }

    public function __toString()
    {
        return $this->config->getGreeting();
    }
}
