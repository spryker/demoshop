<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Assets\Communication\Model;

interface CacheBusterInterface
{

    /**
     * @param string $url
     *
     * @return string
     */
    public function addCacheBust($url);

}
