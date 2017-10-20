<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Twig\Model;

interface CacheBusterInterface
{
    /**
     * @param string $url
     *
     * @return string
     */
    public function addCacheBust($url);
}
