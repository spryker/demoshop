<?php

namespace Pyz\Client\ZedRequest\Service;

use Generated\Client\Ide\FactoryAutoCompletion\ZedRequestService;
use SprykerEngine\Shared\Config;
use SprykerFeature\Client\ZedRequest\Service\Client\HttpClient;
use SprykerFeature\Client\ZedRequest\ZedRequestDependencyProvider;
use SprykerFeature\Client\ZedRequest\Service\ZedRequestDependencyContainer as SprykerZedRequestDependencyContainer;

/**
 * @method ZedRequestService getFactory()
 */
class ZedRequestDependencyContainer extends SprykerZedRequestDependencyContainer
{


    /**
     * @return HttpClient
     *
     * @todo remove Factory usage: https://spryker.atlassian.net/browse/CD-439
     */
    protected function createHttpClient()
    {
        $httpClient = $this->getFactory()->createClientHttpClient(
            $this->getFactory(),
            $this->getProvidedDependency(ZedRequestDependencyProvider::CLIENT_AUTH),
            $this->getConfig()->getZedRequestBaseUrl(),
            $this->getConfig()->getRawToken(),
            $this->getConfig()->isCurlLogEnabled(),
            $this->getConfig()->getCurlLogPath()
        );

        return $httpClient;
    }

    /**
     * @return ZedRequestConfig
     */
    protected function getConfig()
    {
        return $this->getFactory()->createZedRequestConfig(Config::getInstance());
    }

}
