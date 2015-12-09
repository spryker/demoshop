<?php

namespace Pyz\Zed\Heartbeat;

use SprykerFeature\Zed\SearchHeartbeatConnector\Communication\Plugin\HealthIndicatorPlugin as SearchHealthIndicatorPlugin;
use SprykerFeature\Zed\StorageHeartbeatConnector\Communication\Plugin\HealthIndicatorPlugin as StorageHealthIndicatorPlugin;
use SprykerFeature\Zed\SessionHeartbeatConnector\Communication\Plugin\HealthIndicatorPlugin as SessionHealthIndicatorPlugin;
use SprykerFeature\Zed\PropelHeartbeatConnector\Communication\Plugin\HealthIndicatorPlugin as PropelHealthIndicatorPlugin;
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
            new PropelHealthIndicatorPlugin(),
            new SessionHealthIndicatorPlugin(),
            new StorageHealthIndicatorPlugin(),
            new SearchHealthIndicatorPlugin(),
        ];
    }

}
