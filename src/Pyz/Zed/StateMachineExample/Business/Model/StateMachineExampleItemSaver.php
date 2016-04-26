<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
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

        $stateMachineExampleItemEntity->setIdStateMachineItemState($stateMachineItemTransfer->getIdItemState());
        $stateMachineExampleItemEntity->setIdStateMachineProcess($stateMachineItemTransfer->getIdStateMachineProcess());
        $affectedRowCount = $stateMachineExampleItemEntity->save();

        return $affectedRowCount > 0;
    }

    /**
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return bool
     */
    public function createExampleItem()
    {
        $stateMachineExampleItemEntity = new PyzStateMachineExampleItem();
        $stateMachineExampleItemEntity->setName('Test item ' . rand(123, 321));
        $stateMachineExampleItemEntity->save();

        $affectedRowCount = $stateMachineExampleItemEntity->save();

        return $affectedRowCount > 0;
    }

}
