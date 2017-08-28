<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\StateMachine;

use Pyz\Zed\StateMachineExample\Communication\Plugin\TestStateMachineHandlerPlugin;
use Spryker\Zed\StateMachine\StateMachineDependencyProvider as SprykerStateMachineDependencyProvider;

class StateMachineDependencyProvider extends SprykerStateMachineDependencyProvider
{

    /**
     * @return \Spryker\Zed\StateMachine\Dependency\Plugin\StateMachineHandlerInterface[]
     */
    protected function getStateMachineHandlers()
    {
        return [
            new TestStateMachineHandlerPlugin()
        ];
    }

}
