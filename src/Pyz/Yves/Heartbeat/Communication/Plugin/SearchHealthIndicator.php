<?php

namespace Pyz\Yves\Heartbeat\Communication\Plugin;

use Pyz\Yves\Heartbeat\Communication\HeartbeatDependencyContainer;
use SprykerFeature\Shared\Heartbeat\Code\HealthIndicatorInterface;

/**
 * @method HeartbeatDependencyContainer getDependencyContainer()
 */
class SearchHealthIndicator extends AbstractHealthIndicatorPlugin implements HealthIndicatorInterface
{

    const HEALTH_MESSAGE_UNABLE_TO_CONNECT_TO_SEARCH = 'Unable to connect to search';

    public function doHealthCheck()
    {
        $this->checkConnectToSearch();
    }

    private function checkConnectToSearch()
    {
        try {
            $this->getDependencyContainer()->createSearchClient()->getIndexClient()->getStats();
        } catch (\Exception $e) {
            $this->addDysfunction(self::HEALTH_MESSAGE_UNABLE_TO_CONNECT_TO_SEARCH);
            $this->addDysfunction($e->getMessage());
        }
    }

}
