<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\StateMachineExample\Business\Model;

use Generated\Shared\Transfer\StateMachineItemTransfer;
use Orm\Zed\StateMachineExample\Persistence\PyzStateMachineExampleItem;
use Pyz\Zed\StateMachineExample\Persistence\StateMachineExampleQueryContainerInterface;

class StateMachineExampleItemSaver
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
     * @param \Generated\Shared\Transfer\StateMachineItemTransfer $stateMachineItemTransfer
     *
     * @return bool
     */
    public function itemStateUpdate(StateMachineItemTransfer $stateMachineItemTransfer)
    {
        $stateMachineExampleItemEntity = $this->stateMachineExampleQueryContainer
            ->queryStateMachineExampleItemByIdStateMachineItem($stateMachineItemTransfer->getIdentifier())
            ->findOne();

        $stateMachineExampleItemEntity->setFkStateMachineItemState($stateMachineItemTransfer->getIdItemState());
        $affectedRowCount = $stateMachineExampleItemEntity->save();

        return $affectedRowCount > 0;
    }

    /**
     * @return bool
     */
    public function createExampleItem()
    {
        $stateMachineExampleItemEntity = new PyzStateMachineExampleItem();
        $stateMachineExampleItemEntity->setName('Test item ' . rand(123, 321));

        $affectedRowCount = $stateMachineExampleItemEntity->save();

        return $affectedRowCount > 0;
    }
}
