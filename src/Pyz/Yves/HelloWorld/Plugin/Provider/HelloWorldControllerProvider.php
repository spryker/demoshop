<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\HelloWorld\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;

/**
 * Class HelloWorldControllerProvider
 * @package Pyz\Yves\HelloWorld\Plugin\Provider
 */
class HelloWorldControllerProvider extends AbstractYvesControllerProvider
{
    const ROUTE_HELLO_WORLD = 'hello-world';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $this->createController('/hello-world', self::ROUTE_HELLO_WORLD, 'HelloWorld', 'Index', 'index');
    }
}
