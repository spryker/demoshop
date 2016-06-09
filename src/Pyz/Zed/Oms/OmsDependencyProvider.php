<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Oms;

use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Oms\OmsDependencyProvider as SprykerOmsDependencyProvider;

class OmsDependencyProvider extends SprykerOmsDependencyProvider
{

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Oms\Communication\Plugin\Oms\Condition\ConditionInterface[]
     */
    protected function getConditionPlugins(Container $container)
    {
        return [];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Oms\Communication\Plugin\Oms\Command\CommandInterface[]
     */
    protected function getCommandPlugins(Container $container)
    {
        return [];
    }

}
