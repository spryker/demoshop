<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductReview\Controller\Formatter;

use Generated\Shared\Transfer\ProductReviewSummaryTransfer;
use Pyz\Yves\ProductReview\Form\ProductReviewForm;

class ProductReviewSummaryFormatter implements ProductReviewSummaryFormatterInterface
{

    /**
     * @param array $ratingAggregation
     *
     * @return \Generated\Shared\Transfer\ProductReviewSummaryTransfer
     */
    public function execute(array $ratingAggregation)
    {
        for ($rating = ProductReviewForm::MINIMUM_RATING; $rating <= ProductReviewForm::MAXIMUM_RATING; $rating++) {
            $ratingAggregation[$rating] = array_key_exists($rating, $ratingAggregation) ? $ratingAggregation[$rating] : 0;
        }

        ksort($ratingAggregation);

        $totalReview = 0;
        $totalRating = 0;

        foreach ($ratingAggregation as $rating => $reviewCount) {
            $totalRating += $reviewCount * $rating;
            $totalReview += $reviewCount;
        }

        $summary = new ProductReviewSummaryTransfer();
        $summary->setRatingAggregation($ratingAggregation);
        $summary->setMaximumRating(ProductReviewForm::MAXIMUM_RATING);
        $summary->setAverageRating($totalReview === 0 ? 0 : round($totalRating / $totalReview, 1));
        $summary->setTotalReview($totalReview);

        return $summary;
    }

}
