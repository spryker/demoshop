<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\StateMachineExample\Business;

use Pyz\Zed\StateMachineExample\Business\Model\StateMachineExampleItemReader;
use Pyz\Zed\StateMachineExample\Business\Model\StateMachineExampleItemSaver;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Pyz\Zed\StateMachineExample\Persistence\StateMachineExampleQueryContainerInterface getQueryContainer()
 * @method
 */
class StateMachineExampleBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return StateMachineExampleItemSaver
     */
    public function createStateMachineSaver()
    {
        return new StateMachineExampleItemSaver($this->getQueryContainer());
    }

    /**
     * @return StateMachineExampleItemReader
     */
    public function createStateMachineExampleItemReader()
    {
        return new StateMachineExampleItemReader($this->getQueryContainer());
    }
}
