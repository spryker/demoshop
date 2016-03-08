<?php

namespace Pyz\Yves\Checkout\Form;

use Generated\Shared\Transfer\QuoteTransfer;
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
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    public function provideDefaultFormData(QuoteTransfer $quoteTransfer);

}
