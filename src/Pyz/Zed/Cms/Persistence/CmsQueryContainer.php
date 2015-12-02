<?php

namespace Pyz\Zed\Cms\Persistence;
use Orm\Zed\Cms\Persistence\SpyCmsPageQuery;
use PavFeature\Zed\Cms\Persistence\CmsQueryContainer as PavCmsQueryContainer;

class CmsQueryContainer extends PavCmsQueryContainer
{
    /**
     * @param $idAbstractProduct
     * @return SpyCmsPageQuery
     */
    public function queryPageByAbstractProductId($idAbstractProduct)
    {
        $query = $this->queryPages();
        $query->filterByFkAbstractProduct($idAbstractProduct);
        return $query;
    }

}
