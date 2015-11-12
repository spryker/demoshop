<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Category\Business\Manager;

use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\NodeTransfer;
use Orm\Zed\Category\Persistence\Base\SpyCategoryAttributeQuery;
use Orm\Zed\Locale\Persistence\SpyLocaleQuery;
use SprykerFeature\Shared\Category\CategoryConfig;
use \SprykerFeature\Zed\Category\Business\Manager\NodeUrlManager as SprykerNodeUrlManager;

class NodeUrlManager extends SprykerNodeUrlManager
{

    /**
     * @param NodeTransfer $categoryNodeTransfer
     * @param LocaleTransfer $localeTransfer
     *
     * @return void
     */
    public function createUrl(NodeTransfer $categoryNodeTransfer, LocaleTransfer $localeTransfer)
    {
        $categoryAttributesQuery = SpyCategoryAttributeQuery::create();
        $categoryAttributes = $categoryAttributesQuery->filterByFkCategory($categoryNodeTransfer->getFkCategory())->find();

        foreach($categoryAttributes as $categoryAttribute) {
            $localeQuery = SpyLocaleQuery::create();
            $localeEntity = $localeQuery->filterByIdLocale($categoryAttribute->getFkLocale())->findOne();

            $localeTransfer = new LocaleTransfer();
            $localeTransfer->fromArray($localeEntity->toArray());

            $this->createLocalizedUrl($categoryNodeTransfer, $localeTransfer);
        }
    }

    /**
     * @param NodeTransfer $categoryNodeTransfer
     * @param LocaleTransfer $localeTransfer
     *
     * @return void
     */
    protected function createLocalizedUrl(NodeTransfer $categoryNodeTransfer, LocaleTransfer $localeTransfer)
    {
        $path = $this->categoryTreeReader->getPath($categoryNodeTransfer->getIdCategoryNode(), $localeTransfer);
        $categoryUrl = $this->generateUrlFromPathTokens($path);
        $idNode = $categoryNodeTransfer->getIdCategoryNode();
        $url = $this->urlFacade->createUrl('/' . mb_substr($localeTransfer->getLocaleName(), 0, 2).$categoryUrl, $localeTransfer, CategoryConfig::RESOURCE_TYPE_CATEGORY_NODE, $idNode);
        $this->urlFacade->touchUrlActive($url->getIdUrl());
    }
}
