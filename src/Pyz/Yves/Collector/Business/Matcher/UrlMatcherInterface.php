<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Collector\Business\Matcher;

interface UrlMatcherInterface
{
    /**
     * @param string $url
     * @param string $localeName
     *
     * @return mixed
     */
    public function matchUrl($url, $localeName);
}
