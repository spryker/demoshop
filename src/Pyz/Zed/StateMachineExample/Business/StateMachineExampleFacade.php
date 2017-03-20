<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\StateMachineExample\Business;

use Generated\Shared\Transfer\StateMachineItemTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\StateMachineExample\Business\StateMachineExampleBusinessFactory getFactory()
 */
class StateMachineExampleFacade extends AbstractFacade implements StateMachineExampleFacadeInterface
{

    /**
     * @param \Generated\Shared\Transfer\StateMachineItemTransfer $stateMachineItemTransfer
     *
     * @return bool
     */
    public function itemStateUpdate(StateMachineItemTransfer $stateMachineItemTransfer)
    {
        return $this->getFactory()->createStateMachineSaver()->itemStateUpdate($stateMachineItemTransfer);
    }

    /**
     * @param int[] $stateIds
     *
     * @return \Generated\Shared\Transfer\StateMachineItemTransfer[]
     */
    public function getStateMachineExampleItemsByStateIds(array $stateIds = [])
    {
        return $this->getFactory()->createStateMachineExampleItemReader()->getStateMachineItemTransferByItemStateIds($stateIds);
    }

    /**
     * @return \Generated\Shared\Transfer\StateMachineItemTransfer[]
     */
    public function getStateMachineItems()
    {
        return $this->getFactory()->createStateMachineExampleItemReader()->getStateMachineItems();
    }

    /**
     * @return bool
     */
    public function createExampleItem()
    {
        return $this->getFactory()->createStateMachineSaver()->createExampleItem();
    }

}
