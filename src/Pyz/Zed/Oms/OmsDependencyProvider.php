<?php

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
            'Payolution/IsPreAuthorizationApproved' => $container
                ->getLocator()
                ->payolution()
                ->pluginOmsConditionIsPreAuthorizationApprovedPlugin(),
            'Payolution/IsReAuthorizationApproved' => $container
                ->getLocator()
                ->payolution()
                ->pluginOmsConditionIsReAuthorizationApprovedPlugin(),
            'Payolution/IsReversalApproved' => $container
                ->getLocator()
                ->payolution()
                ->pluginOmsConditionIsReversalApprovedPlugin(),
            'Payolution/IsCaptureApproved' => $container
                ->getLocator()
                ->payolution()
                ->pluginOmsConditionIsCaptureApprovedPlugin(),
            'Payolution/IsRefundApproved' => $container
                ->getLocator()
                ->payolution()
                ->pluginOmsConditionIsRefundApprovedPlugin(),
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
