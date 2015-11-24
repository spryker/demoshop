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
            'AfterbuyExporter/IsAfterbuyExportSuccessful' => $container->getLocator()->omsOrderExporterConnector()->pluginConditionIsAfterbuyExportSuccessful(),
            'Adyen/HasAuthoriseNotificationReceived' => $container->getLocator()->adyen()->pluginConditionHasAuthoriseNotificationReceivedPlugin(),
            'Adyen/IsAuthoriseNotificationSuccess' => $container->getLocator()->adyen()->pluginConditionIsAuthoriseNotificationSuccessPlugin(),
            'Adyen/HasCaptureNotificationReceived' => $container->getLocator()->adyen()->pluginConditionHasCaptureNotificationReceivedPlugin(),
            'Adyen/IsCaptureNotificationSuccess' => $container->getLocator()->adyen()->pluginConditionIsCaptureNotificationSuccessPlugin(),
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
            'OrderExporter/ExportOrderItems' => $container->getLocator()->omsOrderExporterConnector()->pluginCommandExportOrderItemsToAfterbuy(),
            'Nopayment/SetAsPaid' => $container->getLocator()->nopayment()->pluginCommandNopaymentCommandPlugin(),
            'Oms/SendPaymentRequest' => $container->getLocator()->oms()->pluginOmsCommandSendPaymentRequest(),
            'Oms/CreateInvoice' => $container->getLocator()->oms()->pluginOmsCommandCreateInvoice(),
            'Oms/SendInvoice' => $container->getLocator()->oms()->pluginOmsCommandSendInvoice(),
            'Adyen/Authorise' => $container->getLocator()->adyen()->pluginCommandAuthorisePlugin(),
            'Adyen/Capture' => $container->getLocator()->adyen()->pluginCommandCapturePlugin(),
            'Adyen/AuthoriseCreditCard' => $container->getLocator()->adyen()->pluginCommandAuthoriseCreditCardPlugin()
        ];
    }

}
