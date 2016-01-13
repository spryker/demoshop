<?php

namespace Pyz\Yves\Collector\Business\Matcher;

use Pyz\Yves\Collector\Business\Model\UrlResource;

interface UrlMatcherInterface
{

    /**
     * @param string $url
     * @param string $localeName
     *
     * @return UrlResource
     */
    public function matchUrl($url, $localeName);

}
