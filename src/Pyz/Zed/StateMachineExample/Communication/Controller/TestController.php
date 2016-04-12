<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\StateMachineExample\Communication\Controller;

use Generated\Shared\Transfer\StateMachineItemTransfer;
use Orm\Zed\StateMachineExample\Persistence\Base\SpyStateMachineExampleItemQuery;
use Orm\Zed\StateMachineExample\Persistence\SpyStateMachineExampleItem;
use Propel\Runtime\Collection\ObjectCollection;
use Spryker\Zed\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\StateMachineExample\Communication\StateMachineExampleCommunicationFactory getFactory()
 * @method \Pyz\Zed\StateMachineExample\Business\StateMachineExampleFacade getFacade()
 */
class TestController extends AbstractController
{
    const STATE_MACHINE_NAME = 'Test';

    /**
     * @return array
     */
    public function listAction()
    {
        $stateMachineExampleItems = $this->getStateMachineExampleItems();
        $stateMachineItems = $this->getStateMachineItems($stateMachineExampleItems);

        $stateMachineItems = $this->getStateMachineFacade()
            ->getProcessedStateMachineItems(self::STATE_MACHINE_NAME, $stateMachineItems);

        $manualEvents = $this->getStateMachineFacade()
            ->getManualEventsForStateMachineItems(self::STATE_MACHINE_NAME, $stateMachineItems);

        return [
            'stateMachineExampleItems' => $stateMachineExampleItems,
            'manualEvents' => $manualEvents,
            'stateMachineItems' => $this->createStateMachineLookupIndexTable($stateMachineItems)
        ];
    }

    /**
     * @param array|StateMachineItemTransfer[] $stateMachineItems
     *
     * @return array|StateMachineItemTransfer[]
     */
    public function createStateMachineLookupIndexTable(array $stateMachineItems)
    {
        $lookupIndex = [];
        foreach ($stateMachineItems as $stateMachineItemTransfer) {
            $lookupIndex[$stateMachineItemTransfer->getIdentifier()] = $stateMachineItemTransfer;
        }

        return $lookupIndex;
    }

    /**
     * @throws \Propel\Runtime\Exception\PropelException
     * @return RedirectResponse
     */
    public function addItemAction()
    {
        $stateMachineExampleItemEntity = new SpyStateMachineExampleItem();
        $stateMachineExampleItemEntity->setName('Test item' . rand(123, 321));
        $stateMachineExampleItemEntity->save();

        return new RedirectResponse('/state-machine-example/test/list');
    }

    /**
     * @throws \Propel\Runtime\Exception\PropelException
     * @return RedirectResponse
     */
    public function deleteItemAction(Request $request)
    {
        $stateMachineExampleItemEntity = SpyStateMachineExampleItemQuery::create()
            ->findOneByIdStateMachineExampleItem($request->query->get('id'));

        $stateMachineExampleItemEntity->delete();

        return new RedirectResponse('/state-machine-example/test/list');
    }

    /**
     * @return \Spryker\Zed\StateMachine\Business\StateMachineFacade
     */
    protected function getStateMachineFacade()
    {
        return $this->getFactory()->getStateMachineFacade();
    }

    /**
     * @param ObjectCollection|SpyStateMachineExampleItem $stateMachineExampleItems
     * @return array
     */
    protected function getStateMachineItems(ObjectCollection $stateMachineExampleItems)
    {
        $stateMachineItems = [];
        foreach ($stateMachineExampleItems as $itemEntity) {
            if ($itemEntity->getFkStateMachineItemState() === null) {
                continue;
            }

            $stateMachineItemTransfer = new StateMachineItemTransfer();
            $stateMachineItemTransfer->setIdItemState($itemEntity->getFkStateMachineItemState());
            $stateMachineItemTransfer->setIdentifier($itemEntity->getIdStateMachineExampleItem());
            $stateMachineItemTransfer->setIdStateMachineProcess($itemEntity->getFkStateMachineProcess());
            $stateMachineItems[] = $stateMachineItemTransfer;
        }

        return $stateMachineItems;
    }

    /**
     * @return \Orm\Zed\StateMachineExample\Persistence\SpyStateMachineExampleItem[]|\Propel\Runtime\Collection\ObjectCollection
     */
    protected function getStateMachineExampleItems()
    {
        return SpyStateMachineExampleItemQuery::create()
            ->orderByIdStateMachineExampleItem()
            ->find();
    }

}
