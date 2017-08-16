<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductReview\Controller;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\ProductReviewSearchRequestTransfer;
use Pyz\Yves\Application\Controller\AbstractController;
use Spryker\Shared\Storage\StorageConstants;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormInterface;
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

        $customer = $this->getFactory()->getCustomerClient()->getCustomer();
        $hasCustomer = $customer !== null;

        $productReviewForm = $this->getFactory()->createProductReviewForm($idProductAbstract);
        $productReviewForm->handleRequest($parentRequest);
        $isFormEmpty = !$productReviewForm->isSubmitted();
        $isReviewPosted = $this->processProductReviewForm($productReviewForm, $customer);

        $productReviewSearchRequestTransfer = new ProductReviewSearchRequestTransfer();
        $productReviewSearchRequestTransfer->setIdProductAbstract($idProductAbstract);
        $productReviewSearchRequestTransfer->setRequestParams($parentRequest->query->all());
        $productReviews = $this->getClient()->findProductReviews($productReviewSearchRequestTransfer);

        return [
            'hideForm' => $isFormEmpty || $isReviewPosted,
            'showAddReviewButton' => $isFormEmpty && !$isReviewPosted,
            'showSuccessMessage' => $isReviewPosted,
            'hasCustomer' => $hasCustomer,
            'form' => $productReviewForm->createView(),
            'productReviews' => $productReviews['productReviews'],
            'pagination' => $productReviews['pagination'],
            'summary' => $this->getFactory()->createProductReviewSummaryFormatter()->execute($productReviews['ratingAggregation']),
            'productAbstract' => $this->getFactory()->getProductClient()->getProductAbstractFromStorageByIdForCurrentLocale($idProductAbstract),
        ];
    }

    /**
     * @param FormInterface $form
     * @param CustomerTransfer|null $customer
     *
     * @return bool Returns true if the review was posted
     */
    public function processProductReviewForm(FormInterface $form, CustomerTransfer $customer = null)
    {
        if (!$form->isSubmitted()) {
            return false;
        }

        $customerReference = $customer === null ? null : $customer->getCustomerReference();

        if ($customerReference === null) {
            $form->addError(new FormError('Only customers can use this feature. Please log in.'));
        }

        if ($form->isValid()) {
            // TODO: Replace static locale id with dynamic
            $this->getFactory()->getProductReviewClient()->submitCustomerReview(
                $form->getData()
                    ->setCustomerReference($customerReference)
                    ->setFkLocale(66)
            );

            return true;
        }

        return false;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    protected function getParentRequest()
    {
        return $this->getApplication()['request_stack']->getParentRequest();
    }

}
