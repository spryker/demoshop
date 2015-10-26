<?php

namespace Pyz\Shared\ZedRequest\Client;

use Guzzle\Http\Message\EntityEnclosingRequest;
use SprykerEngine\Shared\Kernel\Factory\FactoryInterface;
use SprykerEngine\Shared\Transfer\TransferInterface;
use SprykerFeature\Client\Auth\Service\AuthClientInterface;
use SprykerFeature\Shared\ZedRequest\Client\AbstractHttpClient as SprykerAbstractHttpClient;

abstract class AbstractHttpClient extends SprykerAbstractHttpClient
{

    protected $curlLogEnabled = false;
    protected $curlLogPath = '';


    /**
     * @param FactoryInterface $factory
     * @param AuthClientInterface $authClient
     * @param string $baseUrl
     * @param string $curlLogEnabled
     * @param string $curlLogPath
     */
    public function __construct(
        FactoryInterface $factory,
        AuthClientInterface $authClient,
        $baseUrl,
        $curlLogEnabled,
        $curlLogPath
    ) {
        $this->factory = $factory;
        $this->authClient = $authClient;
        $this->baseUrl = $baseUrl;
        $this->curlLogEnabled = $curlLogEnabled;
        $this->curlLogPath = $curlLogPath;
    }

    /**
     * @param string $pathInfo
     * @param TransferInterface $transferObject
     * @param array $metaTransfers
     * @param null $timeoutInSeconds
     * @param bool $isBackgroundRequest
     *
     * @throws \LogicException
     *
     * @return \SprykerFeature\Shared\Library\Communication\Response
     */
    public function request(
        $pathInfo,
        TransferInterface $transferObject = null,
        array $metaTransfers = [],
        $timeoutInSeconds = null,
        $isBackgroundRequest = false
    ) {
        if (!$this->isRequestAllowed($isBackgroundRequest)) {
            throw new \LogicException('You cannot make more than one request from Yves to Zed.');
        }
        self::$requestCounter++;

        $requestTransfer = $this->createRequestTransfer($transferObject, $metaTransfers);
        $request = $this->createGuzzleRequest($pathInfo, $requestTransfer, $timeoutInSeconds);
        $this->logRequest($pathInfo, $requestTransfer, (string) $request->getBody());

        $this->forwardDebugSession($request);

        $this->logRequestAsCurl($request);

        $response = $this->sendRequest($request);
        $responseTransfer = $this->getTransferFromResponse($response);
        $this->logResponse($pathInfo, $responseTransfer, $response->getBody(true));

        return $responseTransfer;
    }

    /**
     * @param EntityEnclosingRequest $request
     */
    private function logRequestAsCurl(EntityEnclosingRequest $request)
    {
        if (!$this->curlLogEnabled) {
            return;
        }

        $formatter = new CurlFormatter();
        $curlRequest = $formatter->format($request) . "\n";
        file_put_contents($this->curlLogPath, $curlRequest, FILE_APPEND);
    }
}
