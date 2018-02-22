<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\StateMachineExample\Business;

use Pyz\Zed\StateMachineExample\Business\Model\StateMachineExampleItemReader;
use Pyz\Zed\StateMachineExample\Business\Model\StateMachineExampleItemSaver;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Pyz\Zed\StateMachineExample\Persistence\StateMachineExampleQueryContainerInterface getQueryContainer()
 */
class StateMachineExampleBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Pyz\Zed\StateMachineExample\Business\Model\StateMachineExampleItemSaver
     */
    public function createStateMachineSaver()
    {
        return new StateMachineExampleItemSaver($this->getQueryContainer());
    }

    /**
     * @return \Pyz\Zed\StateMachineExample\Business\Model\StateMachineExampleItemReader
     */
    public function createStateMachineExampleItemReader()
    {
        return new StateMachineExampleItemReader($this->getQueryContainer());
    }
}
