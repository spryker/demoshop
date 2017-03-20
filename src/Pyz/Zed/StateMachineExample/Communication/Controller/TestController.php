<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\StateMachineExample\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\StateMachineExample\Communication\StateMachineExampleCommunicationFactory getFactory()
 * @method \Pyz\Zed\StateMachineExample\Business\StateMachineExampleFacade getFacade()
 * @method \Pyz\Zed\StateMachineExample\Persistence\StateMachineExampleQueryContainerInterface getQueryContainer()
 *
 */
class TestController extends AbstractController
{

    const STATE_MACHINE_NAME = 'Test';

    /**
     * @return array
     */
    public function listAction()
    {
        $stateMachineItems = $this->getFacade()
            ->getStateMachineItems();

        $stateMachineItems = $this->getStateMachineFacade()
            ->getProcessedStateMachineItems($stateMachineItems);

        $manualEvents = $this->getStateMachineFacade()
            ->getManualEventsForStateMachineItems($stateMachineItems);

        $stateMachineExampleItems = $this->getQueryContainer()
            ->queryAllStateMachineItems();

        return [
            'stateMachineExampleItems' => $stateMachineExampleItems,
            'manualEvents' => $manualEvents,
            'stateMachineItems' => $this->createStateMachineLookupTable($stateMachineItems),
        ];
    }

    /**
     * @param array|\Generated\Shared\Transfer\StateMachineItemTransfer[] $stateMachineItems
     *
     * @return array|\Generated\Shared\Transfer\StateMachineItemTransfer[]
     */
    protected function createStateMachineLookupTable(array $stateMachineItems)
    {
        $lookupIndex = [];
        foreach ($stateMachineItems as $stateMachineItemTransfer) {
            $lookupIndex[$stateMachineItemTransfer->getIdentifier()] = $stateMachineItemTransfer;
        }

        return $lookupIndex;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function addItemAction()
    {
        $this->getFacade()->createExampleItem();

        return new RedirectResponse('/state-machine-example/test/list');
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteItemAction(Request $request)
    {
        $idStateMachineItem = $this->castId($request->query->get('id'));

        $this->getQueryContainer()
            ->queryStateMachineExampleItemByIdStateMachineItem($idStateMachineItem)
            ->delete();

        return new RedirectResponse('/state-machine-example/test/list');
    }

    /**
     * @return \Spryker\Zed\StateMachine\Business\StateMachineFacade
     */
    protected function getStateMachineFacade()
    {
        return $this->getFactory()->getStateMachineFacade();
    }

}
