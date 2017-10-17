<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductReview\Controller;

use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Yves\Application\Controller\AbstractController;
use Spryker\Shared\Storage\StorageConstants;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Spryker\Client\ProductReview\ProductReviewClientInterface getClient()
 * @method \Pyz\Yves\ProductReview\ProductReviewFactory getFactory()
 */
class SubmitController extends AbstractController
{
    const STORAGE_CACHE_STRATEGY = StorageConstants::STORAGE_CACHE_STRATEGY_INACTIVE;

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $parentRequest = $this->getParentRequest();
        $idProductAbstract = $request->attributes->get('idProductAbstract');

        $customer = $this->getFactory()->getCustomerClient()->getCustomer();
        $productReviewForm = $this->getFactory()
            ->createProductReviewForm($idProductAbstract)
            ->handleRequest($parentRequest);
        $isFormEmpty = !$productReviewForm->isSubmitted();
        $isReviewPosted = $this->processProductReviewForm($productReviewForm, $customer);

        if ($isReviewPosted) {
            $productReviewForm = $this->getFactory()->createProductReviewForm($idProductAbstract);
        }

        return [
            'hideForm' => $isFormEmpty || $isReviewPosted,
            'form' => $productReviewForm->createView(),
            'showSuccess' => $isReviewPosted,
            'productAbstract' => $this->getFactory()->getProductClient()->getProductAbstractFromStorageByIdForCurrentLocale($idProductAbstract),
        ];
    }

    /**
     * @param \Symfony\Component\Form\FormInterface $form
     * @param \Generated\Shared\Transfer\CustomerTransfer|null $customer
     *
     * @return bool Returns true if the review was posted
     */
    protected function processProductReviewForm(FormInterface $form, CustomerTransfer $customer = null)
    {
        if (!$form->isSubmitted()) {
            return false;
        }

        $customerReference = $customer === null ? null : $customer->getCustomerReference();

        if ($customerReference === null) {
            $form->addError(new FormError('Only customers can use this feature. Please log in.'));
        }

        if (!$form->isValid()) {
            return false;
        }

        $productReviewResponseTransfer = $this->getFactory()->getProductReviewClient()->submitCustomerReview(
            $this->getProductReviewFormData($form)
                    ->setCustomerReference($customerReference)
                    ->setLocaleName($this->getLocale())
        );

        if ($productReviewResponseTransfer->getIsSuccess()) {
            return true;
        }

        $form->addError(new FormError($productReviewResponseTransfer->getErrors()[0]->getMessage()));

        return false;
    }

    /**
     * @param \Symfony\Component\Form\FormInterface $form
     *
     * @return \Generated\Shared\Transfer\ProductReviewRequestTransfer
     */
    protected function getProductReviewFormData(FormInterface $form)
    {
        return $form->getData();
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    protected function getParentRequest()
    {
        return $this->getApplication()['request_stack']->getParentRequest();
    }
}
