<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\StateMachineExample\Business;

use Generated\Shared\Transfer\StateMachineItemTransfer;

/**
 * @method \Pyz\Zed\StateMachineExample\Business\StateMachineExampleBusinessFactory getFactory()
 */
interface StateMachineExampleFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\StateMachineItemTransfer $stateMachineItemTransfer
     *
     * @return bool
     */
    public function itemStateUpdate(StateMachineItemTransfer $stateMachineItemTransfer);

    /**
     * @param int[] $stateIds
     *
     * @return \Generated\Shared\Transfer\StateMachineItemTransfer[]
     */
    public function getStateMachineExampleItemsByStateIds(array $stateIds = []);

    /**
     * @return \Generated\Shared\Transfer\StateMachineItemTransfer[]
     */
    public function getStateMachineItems();

    /**
     * @return bool
     */
    public function createExampleItem();
}
