<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\StateMachineExample\Communication;

use Pyz\Zed\StateMachineExample\StateMachineExampleDependencyProvider;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;

/**
 * @method \Pyz\Zed\StateMachineExample\Persistence\StateMachineExampleQueryContainer getQueryContainer()
 */
class StateMachineExampleCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return \Spryker\Zed\StateMachine\Business\StateMachineFacade
     */
    public function getStateMachineFacade()
    {
        return $this->getProvidedDependency(StateMachineExampleDependencyProvider::FACADE_STATE_MACHINE);
    }
}
