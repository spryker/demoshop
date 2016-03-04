<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Cms\Persistence;

interface CmsQueryContainerInterface
{

    /**
     * @param string $url
     *
     * @return \Orm\Zed\Url\Persistence\SpyUrlQuery
     */
    public function queryUrlByPath($url);

}
