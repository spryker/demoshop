<?php

namespace Pyz\Zed\Heartbeat;

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
            $this->getLocator()->propelHeartbeatConnector()->pluginHealthIndicatorPlugin(),
            $this->getLocator()->sessionHeartbeatConnector()->pluginHealthIndicatorPlugin(),
            $this->getLocator()->storageHeartbeatConnector()->pluginHealthIndicatorPlugin(),
            $this->getLocator()->searchHeartbeatConnector()->pluginHealthIndicatorPlugin(),
        ];
    }

}
