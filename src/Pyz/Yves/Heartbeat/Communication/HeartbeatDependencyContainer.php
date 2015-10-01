<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Heartbeat\Communication;

use Pyz\Yves\Heartbeat\Communication\Plugin\Doctor;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;
use SprykerFeature\Client\Search\Service\SearchClient;
use SprykerFeature\Client\Session\Service\SessionClient;
use SprykerFeature\Client\Storage\Service\StorageClient;

class HeartbeatDependencyContainer extends AbstractCommunicationDependencyContainer
{

    /**
     * @return Doctor
     */
    public function createDoctor()
    {
        $doctor = $this->getLocator()->heartbeat()->pluginDoctor();
        $doctor->setHealthIndicator([
            $this->getLocator()->heartbeat()->pluginSearchHealthIndicator(),
            $this->getLocator()->heartbeat()->pluginSessionHealthIndicator(),
            $this->getLocator()->heartbeat()->pluginStorageHealthIndicator(),
        ]);

        return $doctor;
    }

    /**
     * @return SessionClient
     */
    public function createSessionClient()
    {
        return $this->getLocator()->session()->client();
    }

    /**
     * @return StorageClient
     */
    public function createStorageClient()
    {
        return $this->getLocator()->storage()->client();
    }

    /**
     * @return SearchClient
     */
    public function createSearchClient()
    {
        return $this->getLocator()->search()->client();
    }

}
