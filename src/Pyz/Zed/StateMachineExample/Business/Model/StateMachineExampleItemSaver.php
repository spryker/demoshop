<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\StateMachineExample\Business\Model;

use Generated\Shared\Transfer\StateMachineItemTransfer;
use Orm\Zed\StateMachineExample\Persistence\SpyStateMachineExampleItemQuery;

class StateMachineExampleItemSaver
{
    /**
     * @param StateMachineItemTransfer $stateMachineItemTransfer
     * @return bool
     */
    public function itemStateUpdate(StateMachineItemTransfer $stateMachineItemTransfer)
    {
        $stateMachineExampleItemEntity = SpyStateMachineExampleItemQuery::create()
            ->findOneByIdStateMachineExampleItem($stateMachineItemTransfer->getIdentifier());

        $stateMachineExampleItemEntity->setFkStateMachineItemState($stateMachineItemTransfer->getIdItemState());
        $stateMachineExampleItemEntity->setFkStateMachineProcess($stateMachineItemTransfer->getIdStateMachineProcess());
        $affectedRowCount = $stateMachineExampleItemEntity->save();

        return $affectedRowCount > 0;
    }
}
