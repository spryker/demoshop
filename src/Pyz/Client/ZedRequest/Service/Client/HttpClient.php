<?php

namespace Pyz\Client\ZedRequest\Service\Client;

use Pyz\Shared\ZedRequest\Client\AbstractHttpClient as PyzAbstractHttpClient;
use SprykerEngine\Shared\Kernel\Factory\FactoryInterface;
use SprykerFeature\Client\Auth\Service\AuthClientInterface;

class HttpClient extends PyzAbstractHttpClient
{

    /**
     * @var string
     */
    protected $rawToken;

    /**
     * @param FactoryInterface $factory
     * @param AuthClientInterface $authClient
     * @param string $baseUrl
     * @param string $rawToken
     * @param string $curlLogEnabled
     * @param string $curlLogPath
     */
    public function __construct(
        FactoryInterface $factory,
        AuthClientInterface $authClient,
        $baseUrl,
        $rawToken,
        $curlLogEnabled,
        $curlLogPath
    ) {

        parent::__construct($factory, $authClient, $baseUrl, $curlLogEnabled, $curlLogPath);
        $this->rawToken = $rawToken;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        $headers = [
            'Auth-Token' => $this->authClient->generateToken($this->rawToken),
        ];

        return $headers;
    }

}
