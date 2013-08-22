<?php

/**
 * Class Sao_Shared_Legacy_Transfer_Response_Legacy
 *
 * @author Stefan Sorge
 */
class Sao_Shared_Legacy_Transfer_Response_Legacy extends ProjectA_Shared_Library_Transfer_Response
{
    /**
     * @var array
     */
    protected $cookies = null;
    protected $_cookies = array('is_array');

    /**
     * @var string
     */
    protected $redirectUrl = null;
    protected $_redirectUrl = array('is_string');

    /**
     * @param $cookies
     *
     * @return Sao_Shared_Legacy_Transfer_Response_Legacy
     */
    public function setCookies($cookies)
    {
        $this->cookies = $cookies;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getCookies()
    {
        return $this->cookies;
    }

    /**
     * @param $redirectUrl
     *
     * @return Sao_Shared_Legacy_Transfer_Response_Legacy
     */
    public function setRedirectUrl($redirectUrl)
    {
        $this->redirectUrl = $redirectUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

}
