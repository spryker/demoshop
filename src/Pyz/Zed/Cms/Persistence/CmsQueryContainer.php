<?php

namespace Pyz\Zed\Cms\Persistence;

use Pyz\Zed\Cms\CmsDependencyProvider;
use Spryker\Zed\Cms\Persistence\CmsQueryContainer as SprykerCmsQueryContainer;

class CmsQueryContainer extends SprykerCmsQueryContainer implements CmsQueryContainerInterface
{

    /**
     * @param string $url
     *
     * @return \Orm\Zed\Url\Persistence\SpyUrlQuery
     */
    public function queryUrlByPath($url)
    {
        return $this->getProvidedDependency(CmsDependencyProvider::QUERY_CONTAINER_URL)
            ->queryUrl($url);
    }

}
