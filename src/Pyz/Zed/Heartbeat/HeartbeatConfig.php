<?php

namespace Pyz\Zed\Heartbeat;

use SprykerFeature\Zed\Heartbeat\Communication\Plugin\SearchHealthIndicatorPlugin;
use SprykerFeature\Zed\Heartbeat\Communication\Plugin\StorageHealthIndicatorPlugin;
use SprykerFeature\Zed\Heartbeat\Communication\Plugin\SessionHealthIndicatorPlugin;
use SprykerFeature\Zed\Heartbeat\Communication\Plugin\PropelHealthIndicatorPlugin;
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
