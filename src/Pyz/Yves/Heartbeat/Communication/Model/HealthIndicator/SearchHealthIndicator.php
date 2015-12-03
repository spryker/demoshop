<?php

namespace Pyz\Yves\Heartbeat\Communication\Model\HealthIndicator;

use SprykerFeature\Client\Search\Service\SearchClient;
use SprykerFeature\Shared\Heartbeat\Code\HealthIndicatorInterface;

class SearchHealthIndicator extends AbstractHealthIndicator implements HealthIndicatorInterface
{

    const HEALTH_MESSAGE_UNABLE_TO_CONNECT_TO_SEARCH = 'Unable to connect to search';

    /**
     * @var SearchClient
     */
    protected $searchClient;

    /**
     * @param SearchClient $searchClient
     */
    public function __construct(SearchClient $searchClient)
    {
        $this->searchClient = $searchClient;
    }

    /**
     * @return void
     */
    public function doHealthCheck()
    {
        $this->checkConnectToSearch();
    }

    /**
     * @return void
     */
    private function checkConnectToSearch()
    {
        try {
            $this->searchClient->getIndexClient()->getStats();
        } catch (\Exception $e) {
            $this->addDysfunction(self::HEALTH_MESSAGE_UNABLE_TO_CONNECT_TO_SEARCH);
            $this->addDysfunction($e->getMessage());
        }
    }

}
