<?php
/**
 * Created by PhpStorm.
 * User: karolygerner
 * Date: 16.08.17
 * Time: 17:44
 */

namespace Pyz\Yves\ProductReview\Controller\Formatter;


interface ProductReviewSummaryFormatterInterface
{
    /**
     * @param array $ratingAggregation
     *
     * @return \Generated\Shared\Transfer\ProductReviewSummaryTransfer
     */
    public function execute(array $ratingAggregation);
}