<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\StateMachineExample\Business;

use Generated\Shared\Transfer\StateMachineItemTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\StateMachineExample\Business\StateMachineExampleBusinessFactory getFactory()
 */
class StateMachineExampleFacade extends AbstractFacade
{
    /**
     * @param StateMachineItemTransfer $stateMachineItemTransfer
     * @return bool
     */
    public function itemStateUpdate(StateMachineItemTransfer $stateMachineItemTransfer)
    {
        return $this->getFactory()->createStateMachineSaver()->itemStateUpdate($stateMachineItemTransfer);
    }

    /**
     * @param array $stateIds
     * @return StateMachineItemTransfer[]
     */
    public function getStateMachineExampleItemsByStateIds(array $stateIds = [])
    {
        return $this->getFactory()->createStateMachineExampleItemReader()->getStateMachineItemTransferByItemStateIds($stateIds);
    }
}
