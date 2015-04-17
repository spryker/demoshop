<?php

namespace Pyz\Sdk\ZedRequest;

use ProjectA\Shared\Kernel\LocatorLocatorInterface;
use SprykerFeature\Sdk\Auth\Client\StaticToken;
use ProjectA\Shared\Library\Config;
use ProjectA\Shared\System\SystemConfig;
use Generated\Yves\Ide\AutoCompletion;

class ZedRequestSettings
{
    /** @var AutoCompletion */
    protected $locator;

    /**
     * @param LocatorLocatorInterface $locator
     */
    public function __construct(LocatorLocatorInterface $locator)
    {
        $this->locator = $locator;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getHeaders()
    {
        $authConfig = Config::get(SystemConfig::ZED_AUTH_SETTINGS);
        $rawToken = $authConfig['credentials']['_yves']['token'];

        $staticToken = $this->getStaticToken();
        $staticToken->setRawToken($rawToken);

        $headers['Auth-Token'] = $staticToken->generate();

        return $headers;
    }

    /**
     * @return StaticToken
     */
    protected function getStaticToken()
    {
        return $this->locator->auth()->pluginStaticToken();
    }
}
