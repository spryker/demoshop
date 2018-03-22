<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Category\Business;

use Generated\Shared\Transfer\LocaleTransfer;
use Spryker\Zed\Category\Business\CategoryFacadeInterface as SprykerCategoryFacadeInterface;
use Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface;

interface CategoryFacadeInterface extends SprykerCategoryFacadeInterface
{
    /**
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param array $cmsData
     * @param \Generated\Shared\Transfer\LocaleTransfer $locale
     *
     * @return \Generated\Shared\Transfer\PageMapTransfer
     */
    public function buildPageMap(PageMapBuilderInterface $pageMapBuilder, array $cmsData, LocaleTransfer $locale);
}
