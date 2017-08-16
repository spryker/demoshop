<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductReview\Controller;

use Generated\Shared\Transfer\ProductReviewSearchRequestTransfer;
use Pyz\Yves\Application\Controller\AbstractController;
use Pyz\Yves\ProductReview\Form\ProductReviewForm;
use Spryker\Shared\Storage\StorageConstants;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Spryker\Client\ProductReview\ProductReviewClientInterface getClient()
 * @method \Pyz\Yves\ProductReview\ProductReviewFactory getFactory()
 */
class IndexController extends AbstractController
{

    const STORAGE_CACHE_STRATEGY = StorageConstants::STORAGE_CACHE_STRATEGY_INACTIVE;
    const REVIEW_PER_PAGE = 3;

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array
     */
    public function indexAction(Request $request)
    {
        $parentRequest = $this->getParentRequest();
        $idProductAbstract = $request->attributes->get('idProductAbstract');
        $page = (int)$parentRequest->query->get('page', 1);

        $customer = $this->getFactory()->getCustomerClient()->getCustomer();
        $hasCustomer = $customer !== null;

        $productReviewFormHelper = $this->getFactory()->createProductReviewFormHelper();
        $productReviewForm = $this->getFactory()->createProductReviewForm($idProductAbstract);
        $productReviewForm->handleRequest($parentRequest);
        $isFormEmpty = $productReviewFormHelper->isEmpty($productReviewForm);
        $isReviewPosted = $productReviewFormHelper->process($productReviewForm, $customer);

        $productReviewSearchRequestTransfer = new ProductReviewSearchRequestTransfer();
        $productReviewSearchRequestTransfer->setIdProductAbstract($idProductAbstract);
        $productReviewSearchRequestTransfer->setRequestParams($parentRequest->query->all());
        // TODO: max page size should be injectable
        $productReviews = $this->getClient()->findProductReviews($productReviewSearchRequestTransfer);

        return [
            'hideForm' => $isFormEmpty || $isReviewPosted,
            'showAddReviewButton' => $isFormEmpty && !$isReviewPosted,
            'showSuccessMessage' => $isReviewPosted,
            'hasCustomer' => $hasCustomer,
            'form' => $productReviewForm->createView(),
            'productReviews' => $productReviews['productReviews'],
            'pagination' => $productReviews['pagination'],
            'ratingAggregation' => $this->formatRatingAggregation($productReviews['ratingAggregation']),
            'productAbstract' => $this->getFactory()->getProductClient()->getProductAbstractFromStorageByIdForCurrentLocale($idProductAbstract),
        ];
    }

    protected function formatRatingAggregation(array $ratingAggregation)
    {
        $totalReview = 0;
        $totalRating = 0;

        $result = [
            'ratingAggregation' => [],
            'averageRating' => 0,
            'totalReview' => 0,
            'maximumRating' => ProductReviewForm::MAXIMUM_RATING,
        ];

        for ($rating = ProductReviewForm::MINIMUM_RATING; $rating <= ProductReviewForm::MAXIMUM_RATING; $rating++) {
            $reviewCount = array_key_exists($rating, $ratingAggregation) ? $ratingAggregation[$rating] : 0;
            $totalRating += $reviewCount * $rating;
            $totalReview += $reviewCount;
        }

        for ($rating = ProductReviewForm::MINIMUM_RATING; $rating <= ProductReviewForm::MAXIMUM_RATING; $rating++) {
            $reviewCount = array_key_exists($rating, $ratingAggregation) ? $ratingAggregation[$rating] : 0;
            $result['ratingAggregation'][$rating]['count'] = $reviewCount;
            $result['ratingAggregation'][$rating]['percentage'] = $totalReview === 0 ? 0 : round(($reviewCount / $totalReview) * 100);
        }
        $result['totalReview'] = $totalReview;
        $result['averageRating'] = $totalReview === 0 ? 0 : round($totalRating / $totalReview, 1);;

        return $result;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    protected function getParentRequest()
    {
        return $this->getApplication()['request_stack']->getParentRequest();
    }

}
