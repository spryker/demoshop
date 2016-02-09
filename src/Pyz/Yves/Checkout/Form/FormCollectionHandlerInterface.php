<?php

namespace Pyz\Yves\Checkout\Form;

use Symfony\Component\HttpFoundation\Request;

interface FormCollectionHandlerInterface
{

    /**
     * @return \Symfony\Component\Form\FormInterface[]
     */
    public function getForms();

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return bool
     */
    public function hasSubmittedForm(Request $request);

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\Form\FormInterface|null
     */
    public function handleRequest(Request $request);

    /**
     * @return void
     */
    public function provideDefaultFormData();

}
