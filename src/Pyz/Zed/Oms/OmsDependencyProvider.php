<?php

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

            'Adyen/IsAuthoriseTransactionSuccess' => $container->getLocator()->adyen()->pluginConditionIsAuthoriseTransactionSuccessPlugin(),
            'Adyen/IsCaptureTransactionSuccess' => $container->getLocator()->adyen()->pluginConditionIsCaptureTransactionSuccessPlugin(),
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

            'Adyen/Authorise' => $container->getLocator()->adyen()->pluginCommandAuthorisePlugin(),
            'Adyen/Capture' => $container->getLocator()->adyen()->pluginCommandCapturePlugin(),
            'Adyen/Cancel' => $container->getLocator()->adyen()->pluginCommandCancelPlugin(),
            'Adyen/AuthoriseCreditCard' => $container->getLocator()->adyen()->pluginCommandAuthoriseCreditCardPlugin()
        ];
    }

}
