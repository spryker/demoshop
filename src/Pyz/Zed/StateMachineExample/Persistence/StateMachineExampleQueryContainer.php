<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\StateMachineExample\Persistence;

use Propel\Runtime\ActiveQuery\Criteria;
use Spryker\Zed\Kernel\Persistence\AbstractQueryContainer;

/**
 * @method \Pyz\Zed\StateMachineExample\Persistence\StateMachineExamplePersistenceFactory getFactory()
 */
class StateMachineExampleQueryContainer extends AbstractQueryContainer implements StateMachineExampleQueryContainerInterface
{
    /**
     * @param int[] $stateIds
     *
     * @return \Orm\Zed\StateMachineExample\Persistence\PyzStateMachineExampleItemQuery
     */
    public function queryStateMachineItemsByStateIds(array $stateIds = [])
    {
          return $this->getFactory()
              ->createStateMachineExampleQuery()
              ->filterByFkStateMachineItemState($stateIds, Criteria::IN);
    }

    /**
     * @return \Orm\Zed\StateMachineExample\Persistence\PyzStateMachineExampleItem[]|\Propel\Runtime\Collection\ObjectCollection
     */
    public function queryAllStateMachineItems()
    {
         return $this->getFactory()
             ->createStateMachineExampleQuery()
             ->find();
    }

    /**
     * @param int $idStateMachineItem
     *
     * @return \Orm\Zed\StateMachineExample\Persistence\PyzStateMachineExampleItem[]|\Orm\Zed\StateMachineExample\Persistence\PyzStateMachineExampleItemQuery|\Propel\Runtime\Collection\ObjectCollection
     */
    public function queryStateMachineExampleItemByIdStateMachineItem($idStateMachineItem)
    {
        return $this->getFactory()
            ->createStateMachineExampleQuery()
            ->filterByIdStateMachineExampleItem($idStateMachineItem);
    }
}
