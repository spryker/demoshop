<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductReview\Form\Helper;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\ProductReviewTransfer;
use Spryker\Client\ProductReview\ProductReviewClientInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormInterface;

class ProductReviewFormHelper implements ProductReviewFormHelperInterface
{
    /**
     * @var ProductReviewClientInterface
     */
    protected $productReviewClient;

    /**
     * @param ProductReviewClientInterface $productReviewClient
     */
    public function __construct(ProductReviewClientInterface $productReviewClient)
    {
        $this->productReviewClient = $productReviewClient;
    }

    /**
     * @param FormInterface $form
     * @param CustomerTransfer|null $customer
     *
     * @return bool
     */
    public function process(FormInterface $form, CustomerTransfer $customer = null)
    {
        $customerReference = $customer === null ? null : $customer->getCustomerReference();

        if ($customerReference === null) {
            // TODO: message needs localization
            $form->addError(new FormError('product_review.submit.customer_required'));
        }

        if ($form->isValid()) {
            $this->productReviewClient->submitCustomerReview(
                // TODO: get locale
                $form->getData()->setCustomerReference($customerReference)->setFkLocale(46)
            );

            return true;
        }

        return false;
    }

    /**
     * @param FormInterface $form
     *
     * @return bool
     */
    public function isEmpty(FormInterface $form)
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

}
