<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Heartbeat\Model\HealthIndicator;

use Exception;
use Spryker\Client\Storage\StorageClientInterface;
use Spryker\Shared\Heartbeat\Code\HealthIndicatorInterface;

class StorageHealthIndicator extends AbstractHealthIndicator implements HealthIndicatorInterface
{
    const FAILURE_MESSAGE_UNABLE_TO_READ_FROM_STORAGE = 'Unable to read from storage';
    const KEY_HEARTBEAT = 'heartbeat';

    /**
     * @var \Spryker\Client\Storage\StorageClientInterface
     */
    protected $storageClient;

    /**
     * @param \Spryker\Client\Storage\StorageClientInterface $storageClient
     */
    public function __construct(StorageClientInterface $storageClient)
    {
        $this->storageClient = $storageClient;
    }

    /**
     * @return void
     */
    public function doHealthCheck()
    {
        $this->checkReadFromStorage();
    }

    /**
     * @return void
     */
    private function checkReadFromStorage()
    {
        try {
            $this->storageClient->get(self::KEY_HEARTBEAT);
        } catch (Exception $e) {
            $this->addFailure(self::FAILURE_MESSAGE_UNABLE_TO_READ_FROM_STORAGE);
            $this->addFailure($e->getMessage());
        }
    }
}
