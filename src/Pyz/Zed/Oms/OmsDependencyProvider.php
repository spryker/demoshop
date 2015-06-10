<?php

/*
 * (c) Copyright Spryker Systems GmbH 2015
 */

namespace Pyz\Zed\Oms;

use SprykerFeature\Zed\Oms\OmsDependencyProvider as SprykerOmsDependencyProvider;
use SprykerEngine\Zed\Kernel\Container;
use SprykerFeature\Zed\Oms\Communication\Plugin\Oms\Command\CommandInterface;
use SprykerFeature\Zed\Oms\Communication\Plugin\Oms\Condition\ConditionInterface;

/**
 * Class OmsDependencyProvider
 * @package SprykerFeature\Zed\Oms
 */
class OmsDependencyProvider extends SprykerOmsDependencyProvider
{

    /**
     * Overwrite in project
     * @param Container $container
     * @return ConditionInterface[]
     */
    protected function getConditionPlugins(Container $container)
    {
        return [];
    }

    /**
     * Overwrite in project
     * @param Container $container
     * @return CommandInterface[]
     */
    protected function getCommandPlugins(Container $container)
    {
        return [
            'Nopayment/SetAsPaid' => $container->getLocator()->nopayment()->pluginCommandNopaymentCommandPlugin(),
        ];
    }
}
