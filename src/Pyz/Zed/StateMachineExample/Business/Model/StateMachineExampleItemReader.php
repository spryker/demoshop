<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\StateMachineExample\Business\Model;

use Generated\Shared\Transfer\StateMachineItemTransfer;
use Pyz\Zed\StateMachineExample\Persistence\StateMachineExampleQueryContainerInterface;

class StateMachineExampleItemReader
{
    /**
     * @var \Pyz\Zed\StateMachineExample\Persistence\StateMachineExampleQueryContainerInterface
     */
    protected $stateMachineExampleQueryContainer;

    /**
     * @param \Pyz\Zed\StateMachineExample\Persistence\StateMachineExampleQueryContainerInterface $stateMachineExampleQueryContainer
     */
    public function __construct(StateMachineExampleQueryContainerInterface $stateMachineExampleQueryContainer)
    {
        $this->stateMachineExampleQueryContainer = $stateMachineExampleQueryContainer;
    }

    /**
     * @param int[] $stateIds
     *
     * @return \Generated\Shared\Transfer\StateMachineItemTransfer[]
     */
    public function getStateMachineItemTransferByItemStateIds(array $stateIds = [])
    {
        $stateMachineExampleItems = $this->stateMachineExampleQueryContainer
            ->queryStateMachineItemsByStateIds($stateIds)
            ->find();

        return $this->hydrateTransferFromPersistence($stateMachineExampleItems);
    }

    /**
     * @return \Generated\Shared\Transfer\StateMachineItemTransfer[]
     */
    public function getStateMachineItems()
    {
        $stateMachineExampleItems = $this->stateMachineExampleQueryContainer
            ->queryAllStateMachineItems();

        return $this->hydrateTransferFromPersistence($stateMachineExampleItems);
    }

    /**
     * @param \Propel\Runtime\Collection\ObjectCollection[]|\Orm\Zed\StateMachineExample\Persistence\PyzStateMachineExampleItem[] $stateMachineExampleItems
     *
     * @return \Generated\Shared\Transfer\StateMachineItemTransfer[]
     */
    protected function hydrateTransferFromPersistence($stateMachineExampleItems)
    {
        $stateMachineItems = [];
        foreach ($stateMachineExampleItems as $stateMachineExampleItemEntity) {
            if (!$stateMachineExampleItemEntity->getFkStateMachineItemState()) {
                continue;
            }

            $stateMachineItemIdentifier = new StateMachineItemTransfer();
            $stateMachineItemIdentifier->setIdentifier($stateMachineExampleItemEntity->getIdStateMachineExampleItem());
            $stateMachineItemIdentifier->setIdItemState($stateMachineExampleItemEntity->getFkStateMachineItemState());

            $stateMachineItems[] = $stateMachineItemIdentifier;
        }

        return $stateMachineItems;
    }
}
