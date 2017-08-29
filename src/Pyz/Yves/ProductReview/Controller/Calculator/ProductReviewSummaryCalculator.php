<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductReview\Controller\Calculator;

use Generated\Shared\Transfer\ProductReviewSummaryTransfer;
use Pyz\Yves\ProductReview\Form\ProductReviewForm;
use Spryker\Client\ProductReview\ProductReviewClientInterface;

class ProductReviewSummaryCalculator implements ProductReviewSummaryCalculatorInterface
{

    const MINIMUM_RATING = ProductReviewForm::MINIMUM_RATING;
    const RATING_PRECISION = 1;

    /**
     * @var \Spryker\Client\ProductReview\ProductReviewClientInterface
     */
    protected $productReviewClient;

    /**
     * @param \Spryker\Client\ProductReview\ProductReviewClientInterface $productReviewClient
     */
    public function __construct(ProductReviewClientInterface $productReviewClient)
    {
        $this->productReviewClient = $productReviewClient;
    }

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
            ->setMaximumRating($this->productReviewClient->getMaximumRating())
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
            return 0.0;
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
        $maximumRating = $this->productReviewClient->getMaximumRating();

        for ($rating = static::MINIMUM_RATING; $rating <= $maximumRating; $rating++) {
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

        foreach ($ratingAggregation as $reviewCount) {
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

}
