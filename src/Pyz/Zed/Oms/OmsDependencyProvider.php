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
                ->payolution()
                ->pluginOmsConditionPreAuthorizationIsApprovedPlugin(),
            'PayolutionOmsConnector/ReAuthorizationIsApproved' => $container
                ->getLocator()
                ->payolution()
                ->pluginOmsConditionReAuthorizationIsApprovedPlugin(),
            'PayolutionOmsConnector/ReversalIsApproved' => $container
                ->getLocator()
                ->payolution()
                ->pluginOmsConditionReversalIsApprovedPlugin(),
            'PayolutionOmsConnector/CaptureIsApproved' => $container
                ->getLocator()
                ->payolution()
                ->pluginOmsConditionCaptureIsApprovedPlugin(),
            'PayolutionOmsConnector/RefundIsApproved' => $container
                ->getLocator()
                ->payolution()
                ->pluginOmsConditionRefundIsApprovedPlugin(),
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
                ->payolution()
                ->pluginOmsCommandPreAuthorizePlugin(),
            'PayolutionOmsConnector/ReAuthorize' => $container
                ->getLocator()
                ->payolution()
                ->pluginOmsCommandReAuthorizePlugin(),
            'PayolutionOmsConnector/Revert' => $container
                ->getLocator()
                ->payolution()
                ->pluginOmsCommandRevertPlugin(),
            'PayolutionOmsConnector/Capture' => $container
                ->getLocator()
                ->payolution()
                ->pluginOmsCommandCapturePlugin(),
            'PayolutionOmsConnector/Refund' => $container
                ->getLocator()
                ->payolution()
                ->pluginOmsCommandRefundPlugin(),
        ];
    }

}
