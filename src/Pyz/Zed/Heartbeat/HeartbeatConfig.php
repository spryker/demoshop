<?php

namespace Pyz\Zed\Heartbeat;

use SprykerFeature\Zed\SearchHeartbeatConnector\Communication\Plugin\HealthIndicatorPlugin as SearchHeartbeatConnectorSearchHeartbeatConnectorSearchHeartbeatConnectorHealthIndicatorPlugin;
use SprykerFeature\Zed\StorageHeartbeatConnector\Communication\Plugin\HealthIndicatorPlugin as CommunicationCommunicationHealthIndicatorPlugin;
use SprykerFeature\Zed\SessionHeartbeatConnector\Communication\Plugin\HealthIndicatorPlugin as PluginHealthIndicatorPlugin;
use SprykerFeature\Zed\PropelHeartbeatConnector\Communication\Plugin\HealthIndicatorPlugin;
use SprykerFeature\Shared\Heartbeat\Code\HealthIndicatorInterface;
use SprykerFeature\Zed\Heartbeat\HeartbeatConfig as SprykerHeartbeatConfig;

class HeartbeatConfig extends SprykerHeartbeatConfig
{

    /**
     * @return HealthIndicatorInterface[]
     */
    public function getHealthIndicator()
    {
        return [
            new HealthIndicatorPlugin(),
            new PluginHealthIndicatorPlugin(),
            new CommunicationCommunicationHealthIndicatorPlugin(),
            new SearchHeartbeatConnectorSearchHeartbeatConnectorSearchHeartbeatConnectorHealthIndicatorPlugin(),
        ];
    }

}
