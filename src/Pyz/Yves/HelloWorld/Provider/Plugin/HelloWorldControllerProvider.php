<?php

namespace Pyz\Yves\HelloWorld\Provider\Plugin;

use Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;


class HelloWorldControllerProvider extends AbstractYvesControllerProvider
{
    /**
     * {@inheritDoc}
     */
    public function defineControllers(Application $app)
    {
        $this->createController('/hello-world', 'hello_world', 'HelloWorld', 'Index', 'index');
    }
}

