<?php

namespace Pyz\Yves\ProductReview\Form\Helper;


use Generated\Shared\Transfer\CustomerTransfer;
use Symfony\Component\Form\FormInterface;

interface ProductReviewFormHelperInterface
{
    /**
     * @param FormInterface $form
     * @param CustomerTransfer|null $customer
     *
     * @return bool
     */
    public function process(FormInterface $form, CustomerTransfer $customer = null);

    /**
     * @param FormInterface $form
     *
     * @return bool
     */
    public function isEmpty(FormInterface $form);
}
