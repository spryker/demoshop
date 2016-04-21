<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\StateMachineExample\Business\Model;

use Generated\Shared\Transfer\StateMachineItemTransfer;
use Orm\Zed\StateMachineExample\Persistence\PyzStateMachineExampleItem;
use Propel\Runtime\Collection\ObjectCollection;
use Pyz\Zed\StateMachineExample\Persistence\StateMachineExampleQueryContainerInterface;

class StateMachineExampleItemReader
{
    /**
     * @var StateMachineExampleQueryContainerInterface
     */
    protected $stateMachineExampleQueryContainer;

    /**
     * @param StateMachineExampleQueryContainerInterface $stateMachineExampleQueryContainer
     */
    public function __construct(StateMachineExampleQueryContainerInterface $stateMachineExampleQueryContainer)
    {
        $this->stateMachineExampleQueryContainer = $stateMachineExampleQueryContainer;
    }

    /**
     * @param int[] $stateIds
     *
     * @return StateMachineItemTransfer[]
     */
    public function getStateMachineItemTransferByItemStateIds(array $stateIds = [])
    {
        $stateMachineExampleItems = $this->stateMachineExampleQueryContainer
            ->queryStateMachineItemsByStateIds($stateIds)
            ->find();

        return $this->hydrateTransferFromPersistence($stateMachineExampleItems);
    }

    /**
     * @return StateMachineItemTransfer[]
     */
    public function getStateMachineItems()
    {
        $stateMachineExampleItems = $this->stateMachineExampleQueryContainer
            ->queryAllStateMachineItems();

        return $this->hydrateTransferFromPersistence($stateMachineExampleItems);
    }

    /**
     * @param ObjectCollection[]|PyzStateMachineExampleItem[]  $stateMachineExampleItems
     *
     * @return StateMachineItemTransfer[]
     */
    protected function hydrateTransferFromPersistence($stateMachineExampleItems)
    {
        $stateMachineItems = [];
        foreach ($stateMachineExampleItems as $stateMachineExampleItemEntity) {
            if (!$stateMachineExampleItemEntity->getIdStateMachineItemState()) {
                continue;
            }

            $stateMachineItemIdentifier = new StateMachineItemTransfer();
            $stateMachineItemIdentifier->setIdentifier($stateMachineExampleItemEntity->getIdStateMachineExampleItem());
            $stateMachineItemIdentifier->setIdStateMachineProcess($stateMachineExampleItemEntity->getIdStateMachineProcess());
            $stateMachineItemIdentifier->setIdItemState($stateMachineExampleItemEntity->getIdStateMachineItemState());

            $stateMachineItems[] = $stateMachineItemIdentifier;
        }

        return $stateMachineItems;
    }
}
