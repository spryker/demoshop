<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\StateMachineExample\Persistence;

use Orm\Zed\StateMachineExample\Persistence\PyzStateMachineExampleItemQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

class StateMachineExamplePersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return PyzStateMachineExampleItemQuery
     */
    public function createStateMachineExampleQuery()
    {
        return PyzStateMachineExampleItemQuery::create();
    }
}
