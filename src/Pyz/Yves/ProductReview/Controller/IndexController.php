<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductReview\Controller;

use Generated\Shared\Transfer\ProductReviewSearchRequestTransfer;
use Pyz\Yves\Application\Controller\AbstractController;
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
            'ratingAggregation' => $productReviews['ratingAggregation'],
            'productAbstract' => $this->getFactory()->getProductClient()->getProductAbstractFromStorageByIdForCurrentLocale($idProductAbstract),
        ];
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    protected function getParentRequest()
    {
        return $this->getApplication()['request_stack']->getParentRequest();
    }

}
