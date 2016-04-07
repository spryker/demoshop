<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\StateMachineExample;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class StateMachineExampleDependencyProvider extends AbstractBundleDependencyProvider
{
    const FACADE_STATE_MACHINE = 'FACADE_STATE_MACHINE';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container[self::FACADE_STATE_MACHINE] = function (Container $container) {
            return $container->getLocator()->stateMachine()->facade();
        };
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideCommunicationLayerDependencies(Container $container)
    {
        $container[self::FACADE_STATE_MACHINE] = function (Container $container) {
            return $container->getLocator()->stateMachine()->facade();
        };
    }
}
