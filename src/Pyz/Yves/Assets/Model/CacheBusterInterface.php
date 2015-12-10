<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Assets\Model;

interface CacheBusterInterface
{

    /**
     * @param string $url
     *
     * @return string
     */
    public function addCacheBust($url);

}
