<?php

namespace Pyz\Yves\Heartbeat\Model\HealthIndicator;

use SprykerFeature\Client\Storage\StorageClientInterface;
use SprykerFeature\Shared\Heartbeat\Code\HealthIndicatorInterface;

class StorageHealthIndicator extends AbstractHealthIndicator implements HealthIndicatorInterface
{

    const FAILURE_MESSAGE_UNABLE_TO_READ_FROM_STORAGE = 'Unable to read from storage';
    const KEY_HEARTBEAT = 'heartbeat';

    /**
     * @var StorageClientInterface
     */
    protected $storageClient;

    /**
     * @param StorageClientInterface $storageClient
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
        } catch (\Exception $e) {
            $this->addFailure(self::FAILURE_MESSAGE_UNABLE_TO_READ_FROM_STORAGE);
            $this->addFailure($e->getMessage());
        }
    }

}
