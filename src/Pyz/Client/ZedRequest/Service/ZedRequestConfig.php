<?php
namespace Pyz\Client\ZedRequest\Service;

class ZedRequestConfig extends \SprykerFeature\Client\ZedRequest\Service\ZedRequestConfig
{

    /**
     * @return bool
     */
    public function isCurlLogEnabled()
    {
        $curlLogEnabled = false;


        if ($this->config->hasValue('yves_to_zed_curl_log_enabled')) {
            $curlLogEnabled = (bool) $this->config->get('yves_to_zed_curl_log_enabled');
        }
        return $curlLogEnabled;
    }

    /**
     * @return null|string
     */
    public function getCurlLogPath()
    {
        $curlLogPath = null;
        if ($this->config->hasValue('yves_to_zed_curl_log_path')) {
            $curlLogPath = $this->config->get('yves_to_zed_curl_log_path');
        }
        return $curlLogPath;
    }

}
