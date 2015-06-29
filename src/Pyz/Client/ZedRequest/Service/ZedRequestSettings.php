<?php

namespace Pyz\Client\ZedRequest\Service;

use SprykerFeature\Shared\Auth\AuthConfig;
use SprykerFeature\Shared\Auth\Client\StaticToken;
use SprykerFeature\Shared\Library\Config;
use SprykerFeature\Client\ZedRequest\Service\ZedRequestSettings as SprykerZedRequestSettings;

class ZedRequestSettings extends SprykerZedRequestSettings
{

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
