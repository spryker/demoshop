<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
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
