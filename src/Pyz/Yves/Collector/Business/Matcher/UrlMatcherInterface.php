<?php

namespace Pyz\Yves\Collector\Business\Matcher;

use Pyz\Yves\Collector\Business\Model\UrlResource;

interface UrlMatcherInterface
{

    /**
     * @param string $url
     * @param string $localeName
     *
     * @return \Pyz\Yves\Collector\Business\Model\UrlResource
     */
    public function matchUrl($url, $localeName);

}
