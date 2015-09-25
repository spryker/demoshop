<?php

/*
 * (c) Copyright Spryker Systems GmbH 2015
 */

namespace Pyz\Zed\Oms;

use SprykerEngine\Zed\Kernel\Container;
use SprykerFeature\Zed\Oms\Communication\Plugin\Oms\Command\CommandInterface;
use SprykerFeature\Zed\Oms\OmsDependencyProvider as SprykerOmsDependencyProvider;

class OmsDependencyProvider extends SprykerOmsDependencyProvider
{

    /**
     * Overwrite in project
     *
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
            'PayolutionOmsConnector/ReAuthorizationIsApproved' => $container
                ->getLocator()
                ->payolutionOmsConnector()
                ->pluginConditionReAuthorizationIsApprovedPlugin(),
            'PayolutionOmsConnector/ReversalIsApproved' => $container
                ->getLocator()
                ->payolutionOmsConnector()
                ->pluginConditionReversalIsApprovedPlugin(),
            'PayolutionOmsConnector/CaptureIsApproved' => $container
                ->getLocator()
                ->payolutionOmsConnector()
                ->pluginConditionCaptureIsApprovedPlugin(),
            'PayolutionOmsConnector/RefundIsApproved' => $container
                ->getLocator()
                ->payolutionOmsConnector()
                ->pluginConditionRefundIsApprovedPlugin(),
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
            'PayolutionOmsConnector/ReAuthorize' => $container
                ->getLocator()
                ->payolutionOmsConnector()
                ->pluginCommandReAuthorizePlugin(),
            'PayolutionOmsConnector/Revert' => $container
                ->getLocator()
                ->payolutionOmsConnector()
                ->pluginCommandRevertPlugin(),
            'PayolutionOmsConnector/Capture' => $container
                ->getLocator()
                ->payolutionOmsConnector()
                ->pluginCommandCapturePlugin(),
            'PayolutionOmsConnector/Refund' => $container
                ->getLocator()
                ->payolutionOmsConnector()
                ->pluginCommandRefundPlugin(),
        ];
    }

}
