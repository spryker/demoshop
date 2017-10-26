<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Log;

use Pyz\Zed\Log\Communication\Plugin\FilebeatLogListenerPlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Log\LogDependencyProvider as SprykerLogDependencyProvider;

class LogDependencyProvider extends SprykerLogDependencyProvider
{
    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addLogListener(Container $container)
    {
        $container[static::LOG_LISTENER] = function () {
            return [
                new FilebeatLogListenerPlugin(),
            ];
        };

        return $container;
    }
}
