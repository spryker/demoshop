<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Twig\Model;

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
        $this->cacheBust = (string)$cacheBust;
    }

    /**
     * @param string $url
     *
     * @return string
     */
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
