<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Assets\Communication\Model;

class UrlParameterCacheBuster implements CacheBusterInterface
{

    /**
     * @var string
     */
    private $cacheBust = '';

    /**
     * @param string $cacheBust
     */
    public function __construct($cacheBust)
    {
        $this->cacheBust = (string) $cacheBust;
    }

    public function addCacheBust($url)
    {
        return $url . '?v=' . $this->getCacheBust();
    }

    /**
     * @return string
     */
    protected function getCacheBust()
    {
        return $this->cacheBust;
    }

}
