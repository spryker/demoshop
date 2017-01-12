<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Category\Business\Map;

use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageMapTransfer;
use Spryker\Shared\Kernel\Store;
use Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface;

/**
 * @method \Pyz\Zed\Collector\Communication\CollectorCommunicationFactory getFactory()
 */
class CategoryNodeDataPageMapBuilder
{

    const TYPE_CATEGORY = 'category';

    /**
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param array $categoryData
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return \Generated\Shared\Transfer\PageMapTransfer
     */
    public function buildPageMap(PageMapBuilderInterface $pageMapBuilder, array $categoryData, LocaleTransfer $localeTransfer)
    {
        $pageMapTransfer = (new PageMapTransfer())
            ->setStore(Store::getInstance()->getStoreName())
            ->setLocale($localeTransfer->getLocaleName())
            ->setType(static::TYPE_CATEGORY);

        /*
         * Here you can hard code which category data will be used for which search functionality
         */
        $pageMapBuilder
            ->addSearchResultData($pageMapTransfer, 'id_category', $categoryData['id_category'])
            ->addSearchResultData($pageMapTransfer, 'name', $categoryData['name'])
            ->addSearchResultData($pageMapTransfer, 'url', $categoryData['url'])
            ->addSearchResultData($pageMapTransfer, 'type', static::TYPE_CATEGORY)
            ->addFullTextBoosted($pageMapTransfer, $categoryData['name'])
            ->addFullText($pageMapTransfer, $categoryData['meta_title'])
            ->addFullText($pageMapTransfer, $categoryData['meta_keywords'])
            ->addFullText($pageMapTransfer, $categoryData['meta_description'])
            ->addSuggestionTerms($pageMapTransfer, $categoryData['name'])
            ->addCompletionTerms($pageMapTransfer, $categoryData['name']);

        return $pageMapTransfer;
    }

}
