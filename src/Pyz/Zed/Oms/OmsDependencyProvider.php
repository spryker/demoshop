<?php

namespace Pyz\Zed\Oms;

use Spryker\Zed\Payolution\Communication\Plugin\Oms\Command\RefundPlugin;
use Spryker\Zed\Payolution\Communication\Plugin\Oms\Command\CapturePlugin;
use Spryker\Zed\Payolution\Communication\Plugin\Oms\Command\RevertPlugin;
use Spryker\Zed\Payolution\Communication\Plugin\Oms\Command\ReAuthorizePlugin;
use Spryker\Zed\Payolution\Communication\Plugin\Oms\Command\PreAuthorizePlugin;
use Pyz\Zed\Oms\Communication\Plugin\Oms\Command\SendInvoice;
use Pyz\Zed\Oms\Communication\Plugin\Oms\Command\CreateInvoice;
use Pyz\Zed\Oms\Communication\Plugin\Oms\Command\SendPaymentRequest;
use Spryker\Zed\Nopayment\Communication\Plugin\Command\NopaymentCommandPlugin;
use Spryker\Zed\Payolution\Communication\Plugin\Oms\Condition\IsCaptureApprovedPlugin;
use Spryker\Zed\Payolution\Communication\Plugin\Oms\Condition\IsPreAuthorizationApprovedPlugin;
use Spryker\Zed\Payolution\Communication\Plugin\Oms\Condition\IsReAuthorizationApprovedPlugin;
use Spryker\Zed\Payolution\Communication\Plugin\Oms\Condition\IsRefundApprovedPlugin;
use Spryker\Zed\Payolution\Communication\Plugin\Oms\Condition\IsReversalApprovedPlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Oms\Communication\Plugin\Oms\Command\CommandInterface;
use Spryker\Zed\Oms\Communication\Plugin\Oms\Condition\ConditionInterface;
use Spryker\Zed\Oms\OmsDependencyProvider as SprykerOmsDependencyProvider;

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
            'Payolution/IsPreAuthorizationApprovedPlugin' => new IsPreAuthorizationApprovedPlugin(),
            'Payolution/IsReAuthorizationApprovedPlugin' => new IsReAuthorizationApprovedPlugin(),
            'Payolution/IsReversalApprovedPlugin' => new IsReversalApprovedPlugin(),
            'Payolution/IsCaptureApprovedPlugin' => new IsCaptureApprovedPlugin(),
            'Payolution/IsRefundApprovedPlugin' => new IsRefundApprovedPlugin(),
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
            'Payolution/PreAuthorize' => new PreAuthorizePlugin(),
            'Payolution/ReAuthorize' => new ReAuthorizePlugin(),
            'Payolution/Revert' => new RevertPlugin(),
            'Payolution/Capture' => new CapturePlugin(),
            'Payolution/Refund' => new RefundPlugin(),

        ];
    }

}
