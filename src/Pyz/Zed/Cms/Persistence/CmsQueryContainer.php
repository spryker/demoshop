<?php

namespace Pyz\Zed\Cms\Persistence;

use Pyz\Zed\Cms\CmsDependencyProvider;
use Orm\Zed\Url\Persistence\SpyUrlQuery;
use SprykerFeature\Zed\Cms\Persistence\CmsQueryContainer as SprykerCmsQueryContainer;

class CmsQueryContainer extends SprykerCmsQueryContainer
{

    /**
     * @param string $url
     *
     * @return SpyUrlQuery
     */
    public function queryUrlByPath($url)
    {
        return $this->getProvidedDependency(CmsDependencyProvider::URL_QUERY_CONTAINER)
            ->queryUrl($url)
        ;
    }

}
