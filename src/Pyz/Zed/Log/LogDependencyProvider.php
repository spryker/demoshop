<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Log;

use Pyz\Zed\Log\Communication\Plugin\FilebeatLogListenerPlugin;
use Spryker\Zed\Log\LogDependencyProvider as SprykerLogDependencyProvider;

class LogDependencyProvider extends SprykerLogDependencyProvider
{
    /**
     * @return array
     */
    protected function getLogListeners()
    {
        return [
            new FilebeatLogListenerPlugin(),
        ];
    }
}
