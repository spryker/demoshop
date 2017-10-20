<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Heartbeat\Model\HealthIndicator;

use Exception;
use Spryker\Client\Search\SearchClientInterface;
use Spryker\Shared\Heartbeat\Code\HealthIndicatorInterface;

class SearchHealthIndicator extends AbstractHealthIndicator implements HealthIndicatorInterface
{
    const FAILURE_MESSAGE_UNABLE_TO_CONNECT_TO_SEARCH = 'Unable to connect to search';

    /**
     * @var \Spryker\Client\Search\SearchClientInterface
     */
    protected $searchClient;

    /**
     * @param \Spryker\Client\Search\SearchClientInterface $searchClient
     */
    public function __construct(SearchClientInterface $searchClient)
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
            $this->searchClient->checkConnection();
        } catch (Exception $e) {
            $this->addFailure(self::FAILURE_MESSAGE_UNABLE_TO_CONNECT_TO_SEARCH);
            $this->addFailure($e->getMessage());
        }
    }
}
