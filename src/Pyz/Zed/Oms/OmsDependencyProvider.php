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
            'Payolution/PreAuthorizationIsApproved' => $container
                ->getLocator()
                ->payolution()
                ->pluginOmsConditionPreAuthorizationIsApprovedPlugin(),
            'Payolution/ReAuthorizationIsApproved' => $container
                ->getLocator()
                ->payolution()
                ->pluginOmsConditionReAuthorizationIsApprovedPlugin(),
            'Payolution/ReversalIsApproved' => $container
                ->getLocator()
                ->payolution()
                ->pluginOmsConditionReversalIsApprovedPlugin(),
            'Payolution/CaptureIsApproved' => $container
                ->getLocator()
                ->payolution()
                ->pluginOmsConditionCaptureIsApprovedPlugin(),
            'Payolution/RefundIsApproved' => $container
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
            'Payolution/PreAuthorize' => $container
                ->getLocator()
                ->payolution()
                ->pluginOmsCommandPreAuthorizePlugin(),
            'Payolution/ReAuthorize' => $container
                ->getLocator()
                ->payolution()
                ->pluginOmsCommandReAuthorizePlugin(),
            'Payolution/Revert' => $container
                ->getLocator()
                ->payolution()
                ->pluginOmsCommandRevertPlugin(),
            'Payolution/Capture' => $container
                ->getLocator()
                ->payolution()
                ->pluginOmsCommandCapturePlugin(),
            'Payolution/Refund' => $container
                ->getLocator()
                ->payolution()
                ->pluginOmsCommandRefundPlugin(),
        ];
    }

}
