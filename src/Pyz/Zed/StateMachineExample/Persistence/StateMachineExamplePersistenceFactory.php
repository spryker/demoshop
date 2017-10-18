<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\StateMachineExample\Persistence;

use Orm\Zed\StateMachineExample\Persistence\PyzStateMachineExampleItemQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method \Pyz\Zed\StateMachineExample\Persistence\StateMachineExampleQueryContainer getQueryContainer()
 */
class StateMachineExamplePersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\StateMachineExample\Persistence\PyzStateMachineExampleItemQuery
     */
    public function createStateMachineExampleQuery()
    {
        return PyzStateMachineExampleItemQuery::create();
    }
}
