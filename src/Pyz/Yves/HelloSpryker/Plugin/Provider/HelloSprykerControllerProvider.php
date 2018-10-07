<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\HelloSpryker\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;

class HelloSprykerControllerProvider extends AbstractYvesControllerProvider
{
    const HELLO_SPRYKER = 'hello-spryker';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $this->createController('/hello-spryker', static::HELLO_SPRYKER, 'HelloSpryker', 'HelloSpryker', 'index');
    }
}
