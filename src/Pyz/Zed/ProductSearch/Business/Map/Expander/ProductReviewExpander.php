<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductSearch\Business\Map\Expander;

use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageMapTransfer;
use Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface;

class ProductReviewExpander implements ProductPageMapExpanderInterface
{

    /**
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param array $productData
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return \Generated\Shared\Transfer\PageMapTransfer
     */
    public function expandProductPageMap(
        PageMapTransfer $pageMapTransfer,
        PageMapBuilderInterface $pageMapBuilder,
        array $productData,
        LocaleTransfer $localeTransfer
    ) {
        $rating = $this->getRating($productData);

        if (!$rating) {
            return $pageMapTransfer;
        }

        $pageMapBuilder
            ->addSearchResultData($pageMapTransfer, 'rating', $rating)
            ->addSearchResultData($pageMapTransfer, 'review_count', $productData['review_count'])
            ->addIntegerFacet($pageMapTransfer, 'rating', $rating * 100)
            ->addIntegerSort($pageMapTransfer, 'rating', $rating * 100);

        return $pageMapTransfer;
    }

    /**
     * @param array $productData
     *
     * @return float
     */
    protected function getRating(array $productData)
    {
        return round($productData['average_rating'], 2);
    }

}
