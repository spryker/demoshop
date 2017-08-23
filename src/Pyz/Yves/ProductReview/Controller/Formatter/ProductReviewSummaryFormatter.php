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

    const MINIMUM_RATING = ProductReviewForm::MINIMUM_RATING;
    const MAXIMUM_RATING = ProductReviewForm::MAXIMUM_RATING;
    const RATING_PRECISION = 1;

    /**
     * @param array $ratingAggregation
     *
     * @return \Generated\Shared\Transfer\ProductReviewSummaryTransfer
     */
    public function execute(array $ratingAggregation)
    {
        $totalReview = $this->getTotalReview($ratingAggregation);

        $summary = (new ProductReviewSummaryTransfer())
            ->setRatingAggregation($this->formatRatingAggregation($ratingAggregation))
            ->setMaximumRating($this->getMaximumRating())
            ->setAverageRating($this->getAverageRating($ratingAggregation, $totalReview))
            ->setTotalReview($totalReview);

        return $summary;
    }

    /**
     * @param array $ratingAggregation
     * @param int $totalReview
     *
     * @return float
     */
    protected function getAverageRating(array $ratingAggregation, $totalReview)
    {
        if ($totalReview === 0) {
            return 0;
        }

        $totalRating = $this->getTotalRating($ratingAggregation);

        return round($totalRating / $totalReview, static::RATING_PRECISION);
    }

    /**
     * @param array $ratingAggregation
     *
     * @return array
     */
    protected function formatRatingAggregation(array $ratingAggregation)
    {
        $ratingAggregation = $this->fillRatings($ratingAggregation);
        $ratingAggregation = $this->sortRatings($ratingAggregation);

        return $ratingAggregation;
    }

    /**
     * @param array $ratingAggregation
     *
     * @return array
     */
    protected function fillRatings(array $ratingAggregation)
    {
        for ($rating = static::MINIMUM_RATING; $rating <= static::MAXIMUM_RATING; $rating++) {
            $ratingAggregation[$rating] = array_key_exists($rating, $ratingAggregation) ? $ratingAggregation[$rating] : 0;
        }

        return $ratingAggregation;
    }

    /**
     * @param array $ratingAggregation
     *
     * @return array
     */
    protected function sortRatings(array $ratingAggregation)
    {
        krsort($ratingAggregation);

        return $ratingAggregation;
    }

    /**
     * @param array $ratingAggregation
     *
     * @return int
     */
    protected function getTotalReview(array $ratingAggregation)
    {
        $totalReview = 0;

        foreach ($ratingAggregation as $rating => $reviewCount) {
            $totalReview += $reviewCount;
        }

        return $totalReview;
    }

    /**
     * @param array $ratingAggregation
     *
     * @return int
     */
    protected function getTotalRating(array $ratingAggregation)
    {
        $totalRating = 0;

        foreach ($ratingAggregation as $rating => $reviewCount) {
            $totalRating += $reviewCount * $rating;
        }

        return $totalRating;
    }

    /**
     * @return int
     */
    protected function getMaximumRating()
    {
        return static::MAXIMUM_RATING;
    }

}
