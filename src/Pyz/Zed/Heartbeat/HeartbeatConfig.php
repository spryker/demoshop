<?php

namespace Pyz\Zed\Heartbeat;

use Spryker\Zed\Heartbeat\Communication\Plugin\SearchHealthIndicatorPlugin;
use Spryker\Zed\Heartbeat\Communication\Plugin\StorageHealthIndicatorPlugin;
use Spryker\Zed\Heartbeat\Communication\Plugin\SessionHealthIndicatorPlugin;
use Spryker\Zed\Heartbeat\Communication\Plugin\PropelHealthIndicatorPlugin;
use Spryker\Zed\Heartbeat\HeartbeatConfig as SprykerHeartbeatConfig;

class HeartbeatConfig extends SprykerHeartbeatConfig
{

    /**
     * @return \Spryker\Shared\Heartbeat\Code\HealthIndicatorInterface[]
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
