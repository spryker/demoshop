<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Log;

use Spryker\Yves\Kernel\Container;
use Spryker\Yves\Log\LogDependencyProvider as SprykerLogDependencyProvider;
use Spryker\Yves\Log\Plugin\Handler\ExceptionStreamHandlerPlugin;
use Spryker\Yves\Log\Plugin\Handler\StreamHandlerPlugin;
use Spryker\Yves\Log\Plugin\Processor\EnvironmentProcessorPlugin;
use Spryker\Yves\Log\Plugin\Processor\GuzzleBodyProcessorPlugin;
use Spryker\Yves\Log\Plugin\Processor\PsrLogMessageProcessorPlugin;
use Spryker\Yves\Log\Plugin\Processor\RequestProcessorPlugin;
use Spryker\Yves\Log\Plugin\Processor\ResponseProcessorPlugin;
use Spryker\Yves\Log\Plugin\Processor\ServerProcessorPlugin;

class LogDependencyProvider extends SprykerLogDependencyProvider
{
    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addLogHandlers(Container $container)
    {
        $container[static::LOG_HANDLERS] = function () {
            return [
                new StreamHandlerPlugin(),
                new ExceptionStreamHandlerPlugin(),
            ];
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addProcessors(Container $container)
    {
        $container[static::LOG_PROCESSORS] = function () {
            return [
                new PsrLogMessageProcessorPlugin(),
                new EnvironmentProcessorPlugin(),
                new ServerProcessorPlugin(),
                new RequestProcessorPlugin(),
                new ResponseProcessorPlugin(),
                new GuzzleBodyProcessorPlugin(),
            ];
        };

        return $container;
    }
}
