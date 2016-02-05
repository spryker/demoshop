<?php

namespace Pyz\Yves\Checkout\Form;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Request;

interface FormCollectionInterface
{

    /**
     * @param FormTypeInterface $formType
     *
     * @return self
     */
    public function addFormType(FormTypeInterface $formType);

    /**
     * @return FormInterface[]
     */
    public function getForms();

    /**
     * @param Request $request
     *
     * @return bool
     */
    public function hasSubmittedForm(Request $request);

    /**
     * @param Request $request
     *
     * @return FormInterface|null
     */
    public function handleRequest(Request $request);

}
