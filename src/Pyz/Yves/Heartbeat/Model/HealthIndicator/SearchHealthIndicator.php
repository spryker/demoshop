<?php

namespace Pyz\Yves\Heartbeat\Model\HealthIndicator;

use Spryker\Client\Search\SearchClient;
use Spryker\Shared\Heartbeat\Code\HealthIndicatorInterface;

class SearchHealthIndicator extends AbstractHealthIndicator implements HealthIndicatorInterface
{

    const FAILURE_MESSAGE_UNABLE_TO_CONNECT_TO_SEARCH = 'Unable to connect to search';

    /**
     * @var \Spryker\Client\Search\SearchClient
     */
    protected $searchClient;

    /**
     * @param \Spryker\Client\Search\SearchClient $searchClient
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
            $this->addFailure(self::FAILURE_MESSAGE_UNABLE_TO_CONNECT_TO_SEARCH);
            $this->addFailure($e->getMessage());
        }
    }

}
