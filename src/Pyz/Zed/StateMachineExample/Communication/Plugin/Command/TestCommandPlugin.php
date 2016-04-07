<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\StateMachineExample\Communication\Plugin\Command;

use Generated\Shared\Transfer\StateMachineItemTransfer;
use Spryker\Zed\StateMachine\Dependency\Plugin\CommandPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

class TestCommandPlugin extends AbstractPlugin implements CommandPluginInterface
{

    /**
     * @param StateMachineItemTransfer $stateMachineItemTransfer
     *
     * @return bool
     */
    public function run(StateMachineItemTransfer $stateMachineItemTransfer)
    {
        return true;
    }
}
