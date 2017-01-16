<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Cms\Business\Map;

use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageMapTransfer;
use Spryker\Shared\Kernel\Store;
use Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface;

/**
 * @method \Pyz\Zed\Collector\Communication\CollectorCommunicationFactory getFactory()
 */
class CmsDataPageMapBuilder
{

    const TYPE_CMS_PAGE = 'cms_page';

    /**
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param array $cmsPageData
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return \Generated\Shared\Transfer\PageMapTransfer
     */
    public function buildPageMap(PageMapBuilderInterface $pageMapBuilder, array $cmsPageData, LocaleTransfer $localeTransfer)
    {
        $pageMapTransfer = (new PageMapTransfer())
            ->setStore(Store::getInstance()->getStoreName())
            ->setLocale($localeTransfer->getLocaleName())
            ->setType(static::TYPE_CMS_PAGE);

        /*
         * Here you can hard code which cms data will be used for which search functionality
         */
        $pageMapBuilder
            ->addSearchResultData($pageMapTransfer, 'id_cms_page', $cmsPageData['id_cms_page'])
            ->addSearchResultData($pageMapTransfer, 'name', $cmsPageData['name'])
            ->addSearchResultData($pageMapTransfer, 'url', $cmsPageData['url'])
            ->addSearchResultData($pageMapTransfer, 'type', static::TYPE_CMS_PAGE)
            ->addFullTextBoosted($pageMapTransfer, $cmsPageData['name'])
            ->addFullText($pageMapTransfer, $cmsPageData['meta_title'])
            ->addFullText($pageMapTransfer, $cmsPageData['meta_keywords'])
            ->addFullText($pageMapTransfer, $cmsPageData['meta_description'])
            ->addFullText($pageMapTransfer, $cmsPageData['content'])
            ->addSuggestionTerms($pageMapTransfer, $cmsPageData['name'])
            ->addCompletionTerms($pageMapTransfer, $cmsPageData['name']);

        return $pageMapTransfer;
    }

}
