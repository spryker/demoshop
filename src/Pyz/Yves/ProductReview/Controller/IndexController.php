<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductReview\Controller;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\ProductReviewSearchRequestTransfer;
use Generated\Shared\Transfer\ProductReviewSummaryReviewMapElementTransfer;
use Generated\Shared\Transfer\ProductReviewSummaryTransfer;
use Generated\Shared\Transfer\ProductReviewTransfer;
use Pyz\Yves\Application\Controller\AbstractController;
use Spryker\Client\ProductReview\ProductReviewClientInterface;
use Spryker\Shared\Storage\StorageConstants;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method ProductReviewClientInterface getClient()
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

        $form = $this->getForm($idProductAbstract);
        $form->handleRequest($parentRequest);
        $isFormEmpty = $this->isFormEmpty($form);
        $isReviewPosted = $this->processForm($form, $customer);

        $productReviewSearchRequestTransfer = new ProductReviewSearchRequestTransfer();
        $productReviewSearchRequestTransfer->setIdProductAbstract($idProductAbstract);
        $productReviewSearchRequestTransfer->setRequestParams($parentRequest->query->all());

        $productReviews = $this->getClient()->findProductReviews($productReviewSearchRequestTransfer, $parentRequest->query->all());

        return [
            'hideForm' => $isFormEmpty || $isReviewPosted,
            'showAddReviewButton' => $isFormEmpty && !$isReviewPosted,
            'showSuccessMessage' => $isReviewPosted,
            'hasCustomer' => $hasCustomer,
            'form' => $form->createView(),
            'reviews' => $productReviews['productReviews'],
            'pagination' => $productReviews['pagination'],
            'summary' => $this->getProductReviewSummaryTransfer($idProductAbstract),
            'productAbstract' => $this->getFactory()->getProductClient()->getProductAbstractFromStorageByIdForCurrentLocale($idProductAbstract),
        ];
    }

    /**
     * @param $idProductAbstract
     *
     * @return FormInterface
     */
    protected function getForm($idProductAbstract)
    {
        $submitFormDataProvider = $this->getFactory()->createSubmitFormDataProvider();
        $form = $this->getFactory()
            ->createSubmitForm(
                $submitFormDataProvider->getData($idProductAbstract),
                $submitFormDataProvider->getOptions()
            );

        return $form;
    }

    protected function processForm(FormInterface $form, CustomerTransfer $customer = null)
    {
        $customerReference = $customer === null ? null : $customer->getCustomerReference();

        if ($customerReference === null) {
            // TODO: message needs localization
            $form->addError(new FormError('product_review.submit.customer_required'));
        }

        if ($form->isValid()) {
            $this->getFactory()->getProductReviewClient()->submitCustomerReview($form->getData()->setCustomerReference($customerReference)->setFkLocale(46));

            return true;
        }

        return false;
    }

    /**
     * @return Request
     */
    protected function getParentRequest()
    {
        return $this->getApplication()['request_stack']->getParentRequest();
    }

    /**
     * @param FormInterface $form
     *
     * @return bool
     */
    protected function isFormEmpty(FormInterface $form)
    {
        /** @var ProductReviewTransfer $productReviewTransfer */
        $productReviewTransfer = $form->getData();
        if (!empty($productReviewTransfer->getSummary())) {
            return false;
        }

        if (!empty($productReviewTransfer->getDescription())) {
            return false;
        }

        if (!empty($productReviewTransfer->getNickname())) {
            return false;
        }

        if (!empty($productReviewTransfer->getRating())) {
            return false;
        }

        return true;
    }


    protected function getProductReviewSummaryTransfer($fkProductAbstract)
    {
        $summary = new ProductReviewSummaryTransfer();
        $summary->setAverageRating(3.6);
        $summary->setMaximumRating(5);
        $summary->setTotalReview(15);
        $summary->addReviewMap((new ProductReviewSummaryReviewMapElementTransfer())->setRating(5)->setReviewCount(2));
        $summary->addReviewMap((new ProductReviewSummaryReviewMapElementTransfer())->setRating(4)->setReviewCount(4));
        $summary->addReviewMap((new ProductReviewSummaryReviewMapElementTransfer())->setRating(3)->setReviewCount(1));
        $summary->addReviewMap((new ProductReviewSummaryReviewMapElementTransfer())->setRating(2)->setReviewCount(3));
        $summary->addReviewMap((new ProductReviewSummaryReviewMapElementTransfer())->setRating(1)->setReviewCount(5));

        return $summary;
    }
}

