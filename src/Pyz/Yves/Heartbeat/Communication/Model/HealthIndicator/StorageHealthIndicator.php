<?php

namespace Pyz\Yves\Heartbeat\Communication\Model\HealthIndicator;

use SprykerFeature\Client\Storage\Service\StorageClientInterface;
use SprykerFeature\Shared\Heartbeat\Code\HealthIndicatorInterface;

class StorageHealthIndicator extends AbstractHealthIndicator implements HealthIndicatorInterface
{

    const HEALTH_MESSAGE_UNABLE_TO_READ_FROM_STORAGE = 'Unable to read from storage';
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
            $this->addDysfunction(self::HEALTH_MESSAGE_UNABLE_TO_READ_FROM_STORAGE);
            $this->addDysfunction($e->getMessage());
        }
    }

}
