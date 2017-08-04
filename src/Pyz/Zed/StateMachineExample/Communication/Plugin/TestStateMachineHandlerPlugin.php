<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\StateMachineExample\Communication\Plugin;

use Generated\Shared\Transfer\StateMachineItemTransfer;
use InvalidArgumentException;
use Pyz\Zed\StateMachineExample\Communication\Plugin\Command\TestCommandPlugin;
use Pyz\Zed\StateMachineExample\Communication\Plugin\Condition\TestConditionPlugin;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\StateMachine\Dependency\Plugin\StateMachineHandlerInterface;

/**
 * @method \Pyz\Zed\StateMachineExample\Business\StateMachineExampleFacade getFacade()
 * @method \Pyz\Zed\StateMachineExample\Communication\StateMachineExampleCommunicationFactory getFactory()
 */
class TestStateMachineHandlerPlugin extends AbstractPlugin implements StateMachineHandlerInterface
{

    /**
     * List of command plugins for this state machine for all processes.
     *
     * @return array|\Spryker\Zed\StateMachine\Dependency\Plugin\CommandPluginInterface[]
     */
    public function getCommandPlugins()
    {
        return [
            'Test/Command' => new TestCommandPlugin(),
        ];
    }

    /**
     * List of condition plugins for this state machine for all processes.
     *
     * @return array|\Spryker\Zed\StateMachine\Dependency\Plugin\ConditionPluginInterface[]
     */
    public function getConditionPlugins()
    {
        return [
            'Test/Condition' => new TestConditionPlugin(),
        ];
    }

    /**
     * Name of state machine used by this handler.
     *
     * @return string
     */
    public function getStateMachineName()
    {
        return 'Test';
    }

    /**
     * List of active processes used for this state machine
     *
     * @return string[]
     */
    public function getActiveProcesses()
    {
        return [
            'Invoice01',
        ];
    }

    /**
     * Provide initial state name for item when state machine initialized. Useing proces name.
     *
     * @param string $processName
     *
     * @throws \InvalidArgumentException
     *
     * @return string
     */
    public function getInitialStateForProcess($processName)
    {
        switch ($processName) {
            case 'Invoice01':
                return 'new';
        }

        throw new InvalidArgumentException(
            sprintf(
                'Initial state not found for process "%s".',
                $processName
            )
        );
    }

    /**
     * This method is called when state of item was changed, client can create custom logic for example update it's related table with new state id/name.
     * StateMachineItemTransfer:identifier is id of entity from implementor.
     *
     * @param \Generated\Shared\Transfer\StateMachineItemTransfer $stateMachineItemTransfer
     *
     * @return bool
     */
    public function itemStateUpdated(StateMachineItemTransfer $stateMachineItemTransfer)
    {
         return $this->getFacade()->itemStateUpdate($stateMachineItemTransfer);
    }

    /**
     * This method should return all list of StateMachineItemTransfer, with (identifier, IdStateMachineProcess, IdItemState)
     *
     * @param array $stateIds
     *
     * @return \Generated\Shared\Transfer\StateMachineItemTransfer[]
     */
    public function getStateMachineItemsByStateIds(array $stateIds = [])
    {
         return $this->getFacade()->getStateMachineExampleItemsByStateIds($stateIds);
    }

}
