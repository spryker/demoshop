<?php

namespace Pyz\Zed\Oms;

use SprykerFeature\Zed\Payolution\Communication\Plugin\Oms\Command\RefundPlugin;
use SprykerFeature\Zed\Payolution\Communication\Plugin\Oms\Command\CapturePlugin;
use SprykerFeature\Zed\Payolution\Communication\Plugin\Oms\Command\RevertPlugin;
use SprykerFeature\Zed\Payolution\Communication\Plugin\Oms\Command\ReAuthorizePlugin;
use SprykerFeature\Zed\Payolution\Communication\Plugin\Oms\Command\PreAuthorizePlugin;
use Pyz\Zed\Oms\Communication\Plugin\Oms\Command\SendInvoice;
use Pyz\Zed\Oms\Communication\Plugin\Oms\Command\CreateInvoice;
use Pyz\Zed\Oms\Communication\Plugin\Oms\Command\SendPaymentRequest;
use SprykerFeature\Zed\Nopayment\Communication\Plugin\Command\NopaymentCommandPlugin;
use SprykerFeature\Zed\Payolution\Communication\Plugin\Oms\Condition\RefundIsApprovedPlugin;
use SprykerFeature\Zed\Payolution\Communication\Plugin\Oms\Condition\CaptureIsApprovedPlugin;
use SprykerFeature\Zed\Payolution\Communication\Plugin\Oms\Condition\ReversalIsApprovedPlugin;
use SprykerFeature\Zed\Payolution\Communication\Plugin\Oms\Condition\ReAuthorizationIsApprovedPlugin;
use SprykerFeature\Zed\Payolution\Communication\Plugin\Oms\Condition\PreAuthorizationIsApprovedPlugin;
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
            'Payolution/PreAuthorizationIsApproved' => new PreAuthorizationIsApprovedPlugin(),
            'Payolution/ReAuthorizationIsApproved' => new ReAuthorizationIsApprovedPlugin(),
            'Payolution/ReversalIsApproved' => new ReversalIsApprovedPlugin(),
            'Payolution/CaptureIsApproved' => new CaptureIsApprovedPlugin(),
            'Payolution/RefundIsApproved' => new RefundIsApprovedPlugin(),
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
