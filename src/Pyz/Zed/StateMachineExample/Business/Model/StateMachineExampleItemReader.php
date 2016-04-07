<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\StateMachineExample\Business\Model;

use Generated\Shared\Transfer\StateMachineItemTransfer;
use Orm\Zed\StateMachineExample\Persistence\SpyStateMachineExampleItemQuery;

class StateMachineExampleItemReader
{
    /**
     * @param array|int[] $stateIds
     *
     * @return array
     */
    public function getStateMachineItemTransferByItemStateIds(array $stateIds = [])
    {
        $stateMachineExampleItems = SpyStateMachineExampleItemQuery::create()
            ->filterByFkStateMachineItemState($stateIds)
            ->find();

        $stateMachineItems = [];
        foreach ($stateMachineExampleItems as $stateMachineExampleItemEntity) {
            $stateMachineItemIdentifier = new StateMachineItemTransfer();
            $stateMachineItemIdentifier->setIdentifier($stateMachineExampleItemEntity->getIdStateMachineExampleItem());
            $stateMachineItemIdentifier->setIdStateMachineProcess($stateMachineExampleItemEntity->getFkStateMachineProcess());
            $stateMachineItemIdentifier->setIdItemState($stateMachineExampleItemEntity->getFkStateMachineItemState());

            $stateMachineItems[] = $stateMachineItemIdentifier;
        }

        return $stateMachineItems;
    }
}
