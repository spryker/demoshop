<?php

namespace Pyz\Client\ZedRequest;

use SprykerEngine\Shared\Kernel\LocatorLocatorInterface;
use SprykerFeature\Client\Auth\Client\StaticToken;
use SprykerFeature\Shared\Library\Config;
use Generated\Yves\Ide\AutoCompletion;
use SprykerFeature\Shared\Auth\AuthConfig;

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
     * @return array
     * @throws \Exception
     */
    public function getHeaders()
    {
        $authConfig = Config::get(AuthConfig::AUTH_DEFAULT_CREDENTIALS);
        $rawToken = $authConfig['yves_system']['token'];

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
