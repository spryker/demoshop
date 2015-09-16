<?php

/*
 * (c) Copyright Spryker Systems GmbH 2015
 */

namespace Pyz\Zed\Oms;

use SprykerEngine\Zed\Kernel\Container;
use SprykerFeature\Zed\Oms\Communication\Plugin\Oms\Command\CommandInterface;
use SprykerFeature\Zed\Oms\Communication\Plugin\Oms\Condition\ConditionInterface;
use SprykerFeature\Zed\Oms\OmsDependencyProvider as SprykerOmsDependencyProvider;

class OmsDependencyProvider extends SprykerOmsDependencyProvider
{

    /**
     * @param Container $container
     *
     * @return ConditionInterface[]
     */
    protected function getConditionPlugins(Container $container)
    {
        return [
            'PayolutionOmsConnector/PreAuthorizationIsApproved' => $container
                ->getLocator()
                ->payolutionOmsConnector()
                ->pluginConditionPreAuthorizationIsApprovedPlugin(),
            'PayolutionOmsConnector/CaptureIsApproved' => $container
                ->getLocator()
                ->payolutionOmsConnector()
                ->pluginConditionCaptureIsApprovedPlugin(),
        ];
    }

    /**
     * @param Container $container
     *
     * @return CommandInterface[]
     */
    protected function getCommandPlugins(Container $container)
    {
        return [
            'Nopayment/SetAsPaid' => $container->getLocator()->nopayment()->pluginCommandNopaymentCommandPlugin(),
            'Oms/SendPaymentRequest' => $container->getLocator()->oms()->pluginOmsCommandSendPaymentRequest(),
            'Oms/CreateInvoice' => $container->getLocator()->oms()->pluginOmsCommandCreateInvoice(),
            'Oms/SendInvoice' => $container->getLocator()->oms()->pluginOmsCommandSendInvoice(),
            'PayolutionOmsConnector/PreAuthorize' => $container
                ->getLocator()
                ->payolutionOmsConnector()
                ->pluginCommandPreAuthorizePlugin(),
            'PayolutionOmsConnector/Capture' => $container
                ->getLocator()
                ->payolutionOmsConnector()
                ->pluginCommandCapturePlugin(),
        ];
    }

}
