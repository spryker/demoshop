<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\StateMachineExample\Communication\Plugin\Condition;

use Generated\Shared\Transfer\StateMachineItemTransfer;
use Spryker\Zed\StateMachine\Dependency\Plugin\ConditionPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

class TestConditionPlugin extends AbstractPlugin implements ConditionPluginInterface
{
    /**
     * @param StateMachineItemTransfer $stateMachineItemTransfer
     *
     * @return bool
     */
    public function check(StateMachineItemTransfer $stateMachineItemTransfer)
    {
        return (bool) ($stateMachineItemTransfer->getIdentifier() % 2);
    }
}
