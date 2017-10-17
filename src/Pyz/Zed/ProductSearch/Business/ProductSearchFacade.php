<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductSearch\Business;

use Generated\Shared\Transfer\LocaleTransfer;
use Spryker\Zed\ProductSearch\Business\ProductSearchFacade as SprykerProductSearchFacade;
use Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface;

/**
 * @method \Pyz\Zed\ProductSearch\Business\ProductSearchBusinessFactory getFactory()
 */
class ProductSearchFacade extends SprykerProductSearchFacade implements ProductSearchFacadeInterface
{
    /**
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param array $productData
     * @param \Generated\Shared\Transfer\LocaleTransfer $locale
     *
     * @return \Generated\Shared\Transfer\PageMapTransfer
     */
    public function buildPageMap(PageMapBuilderInterface $pageMapBuilder, array $productData, LocaleTransfer $locale)
    {
        return $this
            ->getFactory()
            ->createProductDataPageMapBuilder()
            ->buildPageMap($pageMapBuilder, $productData, $locale);
    }
}
