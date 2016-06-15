<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
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
