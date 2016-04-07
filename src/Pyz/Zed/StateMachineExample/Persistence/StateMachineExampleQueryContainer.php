<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\StateMachineExample\Persistence;

use Spryker\Zed\Kernel\Persistence\AbstractQueryContainer;

/**
 * @method \Spryker\Zed\StateMachine\Persistence\StateMachinePersistenceFactory getFactory()
 */
class StateMachineQueryContainer extends AbstractQueryContainer implements StateMachineQueryContainerInterface
{

}
