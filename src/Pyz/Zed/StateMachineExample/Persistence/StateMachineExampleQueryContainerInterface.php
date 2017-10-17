<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\StateMachineExample\Persistence;

interface StateMachineExampleQueryContainerInterface
{
    /**
     * @param int[] $stateIds
     *
     * @return \Orm\Zed\StateMachineExample\Persistence\PyzStateMachineExampleItemQuery
     */
    public function queryStateMachineItemsByStateIds(array $stateIds = []);

    /**
     * @return \Orm\Zed\StateMachineExample\Persistence\PyzStateMachineExampleItem[]|\Propel\Runtime\Collection\ObjectCollection
     */
    public function queryAllStateMachineItems();

    /**
     * @param int $idStateMachineItem
     *
     * @return \Orm\Zed\StateMachineExample\Persistence\PyzStateMachineExampleItem[]|\Orm\Zed\StateMachineExample\Persistence\PyzStateMachineExampleItemQuery|\Propel\Runtime\Collection\ObjectCollection
     */
    public function queryStateMachineExampleItemByIdStateMachineItem($idStateMachineItem);
}
