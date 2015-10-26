<?php
namespace Pyz\Client\ZedRequest\Service;

class ZedRequestConfig extends \SprykerFeature\Client\ZedRequest\Service\ZedRequestConfig
{

    const YVES_TO_ZED_CURL_LOG_ENABLED = 'yves_to_zed_curl_log_enabled';
    const YVES_TO_ZED_CURL_LOG_FILE_PATH = 'yves_to_zed_curl_log_path';

    /**
     * @return bool
     */
    public function isCurlLogEnabled()
    {
        $curlLogEnabled = false;


        if ($this->config->hasValue(self::YVES_TO_ZED_CURL_LOG_ENABLED)) {
            $curlLogEnabled = (bool) $this->config->get(self::YVES_TO_ZED_CURL_LOG_ENABLED);
        }
        return $curlLogEnabled;
    }

    /**
     * @return null|string
     */
    public function getCurlLogPath()
    {
        $curlLogPath = null;
        if ($this->config->hasValue(self::YVES_TO_ZED_CURL_LOG_FILE_PATH)) {
            $curlLogPath = $this->config->get(self::YVES_TO_ZED_CURL_LOG_FILE_PATH);
        }
        return $curlLogPath;
    }

}
