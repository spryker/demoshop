<?php
use Guzzle\Plugin\CurlAuth\CurlAuthPlugin;
use Guzzle\Service\Client;
use ProjectA\Shared\Library\Error\ErrorLogger;

/**
 * Class Sao_Shared_Library_Legacy_Request
 * Fork of ProjectA_Shared_Library_Zed_Request to attach Yves to legacy-platform
 * @see    PalShared_Zed_Request
 */
class Sao_Shared_Library_Legacy_Request
{
    /**
     * @const
     */
    const MESSAGE_REQUEST_ERROR = 'Request to legacy failed';

    /**
     * @param $path
     * @param ProjectA_Shared_Library_Abstract_Object $transferObject
     * @param null $connectionTimeout
     * @param null $requestTimeout
     * @return Sao_Shared_Legacy_Transfer_Response_Legacy
     */
    public function request($path, ProjectA_Shared_Library_Abstract_Object $transferObject = null, $connectionTimeout = null, $requestTimeout = null)
    {
        $transfer = Generated_Shared_Library_TransferLoader::getApplicationRequest();
        $transfer->setYvesSessionId(session_id());

        $transfer->setTime(time());
        $host = gethostname() ? gethostname() : 'n/a';
        $transfer->setHost($host);

        // Validation throws exception, if data is missing or wrong
        if (isset($transferObject)) {
            $transferObject->validate();
        }
        $transfer->setTransfer($transferObject);

        $config = ProjectA_Shared_Library_Config::get();

        $baseUrl = ($config->legacy->http->ssl ? 'https' : 'http') . '://' . $config->url->legacy;
        $client = new Client(
            $baseUrl,
            [
                "curl.options" => [
                    CURLOPT_CONNECTTIMEOUT => 100,
                    CURLOPT_TIMEOUT => 100
                ]
            ]
        );
        // Create request
        $description = Guzzle\Service\Description\ServiceDescription::factory(__DIR__ . '/Guzzle/Service/legacy.json');
        $description->setBaseUrl($baseUrl);
        $client->setDescription($description);

        // Register proxy
        if (!empty($config->url->proxy)) {
            $this->setProxy($client, $config->url->proxy);
        }

        // Setup SSL
        if (isset($config->legacy->http->verifySsl)) {
            $client->setSslVerification((bool)$config->legacy->http->verifySsl);
        }

        // Register auth
        if ($config->legacy->http->auth->username && $config->legacy->http->auth->password) {
            $this->addAuthPlugin($client, $config->legacy->http->auth->username, $config->legacy->http->auth->password);
        }

        if ('YVES' === APPLICATION) {
            // Register cookie-name
            $this->addLegacyCookiePlugin($client, session_name(), session_id(), isset($_COOKIE['cart_cookie']) ? $_COOKIE['cart_cookie'] : null);
        }

        /* @var $command Sao_Shared_Library_Legacy_Guzzle_Service_Command_Request_Abstract */
        $command = $client->getCommand($path);
        $command->setTransferRequest($transfer);

        /* @var $response Sao_Shared_Library_Legacy_Guzzle_Service_Command_Response_Abstract */

        $request_id = md5(microtime(true));

        $lj = ProjectA_Shared_Lumberjack_Code_Lumberjack::getInstance();
        $lj->addField('transfer', $transferObject);
        $lj->addField('path', $path);
        $lj->addField('request_id', $request_id);
        $lj->send('artportal', 'Request to ' . $path, 'request');

        $timestamp = microtime(true);
        try {
            $response = $client->execute($command);
            $transferResponse = $response->getTransferResponse();
        } catch (Exception $e) {
            $transferResponse = new Sao_Shared_Legacy_Transfer_Response_Legacy();
            $transferResponse->setSuccess(false);
            $messages = new Sao_Shared_Application_Transfer_Response_Message_Collection();
            $messages->add(new Sao_Shared_Application_Transfer_Response_Message(array('message' => static::MESSAGE_REQUEST_ERROR)));
            $transferResponse->setMessages($messages);

            if ('YVES' === APPLICATION) {
                ErrorLogger::log($e);
            }
        }

        $lj = ProjectA_Shared_Lumberjack_Code_Lumberjack::getInstance();
        $lj->addField('response', $transferResponse);
        $lj->addField('path', $path);
        $lj->addField('curlConfig', $client->getConfig());
        $lj->addField('request_id', $request_id);
        $lj->addField('duration', number_format(microtime(true) - $timestamp, 4));
        $lj->send('artportal', 'Response from ' . $path, 'response');

        return $transferResponse;
    }

    /**
     * @param string $username
     * @param string $password
     *
     * @return void
     */
    public function addAuthPlugin(Client $client, $username, $password)
    {
        $authPlugin = new CurlAuthPlugin($username, $password);
        $client->addSubscriber($authPlugin);
    }

    /**
     * @param Client $client
     * @param string $sessionName
     * @param string $sessionId
     * @param string|null $cart_cookie
     */
    protected function addLegacyCookiePlugin(Client $client, $sessionName, $sessionId, $cart_cookie = null)
    {
        $domain = parse_url($client->getBaseUrl())['host'];

        // Pass-through frontend-cookies
        $legacyCookies = new Sao_Shared_Library_Legacy_Guzzle_Plugin_LegacyCookies($domain, $sessionName, $sessionId, $cart_cookie);
        $client->addSubscriber($legacyCookies);
    }

    /**
     * @param string $proxy
     *
     * @return void
     */
    public function setProxy(Client $client, $proxy)
    {
        $opts = $client->getConfig($client::CURL_OPTIONS) ?: array();
        $opts[CURLOPT_PROXY] = $proxy;

        $client->getConfig()->set($client::CURL_OPTIONS, $opts);

        return;
    }
}
