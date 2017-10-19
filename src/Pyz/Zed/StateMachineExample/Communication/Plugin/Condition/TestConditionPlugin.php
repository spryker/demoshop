<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\StateMachineExample\Communication\Plugin\Condition;

use Generated\Shared\Transfer\StateMachineItemTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\StateMachine\Dependency\Plugin\ConditionPluginInterface;

/**
 * @method \Pyz\Zed\StateMachineExample\Business\StateMachineExampleFacade getFacade()
 * @method \Pyz\Zed\StateMachineExample\Communication\StateMachineExampleCommunicationFactory getFactory()
 */
class TestConditionPlugin extends AbstractPlugin implements ConditionPluginInterface
{
    /**
     * @param \Generated\Shared\Transfer\StateMachineItemTransfer $stateMachineItemTransfer
     *
     * @return bool
     */
    public function check(StateMachineItemTransfer $stateMachineItemTransfer)
    {
        return (bool)($stateMachineItemTransfer->getIdentifier() % 2);
    }
}
