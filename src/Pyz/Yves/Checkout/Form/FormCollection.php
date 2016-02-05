<?php

namespace Pyz\Yves\Checkout\Form;

use Generated\Shared\Transfer\QuoteTransfer;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Request;

class FormCollection implements FormCollectionInterface
{

    /**
     * @var \Symfony\Component\Form\FormFactoryInterface
     */
    protected $formFactory;

    /**
     * @var \Generated\Shared\Transfer\QuoteTransfer
     */
    protected $quoteTransfer;

    /**
     * @var \Symfony\Component\Form\AbstractType[]
     */
    protected $formTypes = [];

    /**
     * @var \Symfony\Component\Form\FormInterface[]
     */
    protected $forms = [];

    /**
     * @param \Symfony\Component\Form\FormFactoryInterface $formFactory
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param \Symfony\Component\Form\FormTypeInterface[] $formTypes
     */
    public function __construct(FormFactoryInterface $formFactory, QuoteTransfer $quoteTransfer, array $formTypes = [])
    {
        $this->formFactory = $formFactory;
        $this->quoteTransfer = $quoteTransfer;
        $this->formTypes = array_values($formTypes);
    }

    /**
     * @param \Symfony\Component\Form\FormTypeInterface $formType
     *
     * @return self
     */
    public function addFormType(FormTypeInterface $formType)
    {
        $this->formTypes[] = $formType;

        return $this;
    }

    /**
     * @return \Symfony\Component\Form\FormInterface[]
     */
    public function getForms()
    {
        if (count($this->forms) !== count($this->formTypes)) {
            $this->createForms();
        }

        return $this->forms;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return bool
     */
    public function hasSubmittedForm(Request $request)
    {
        foreach ($this->getForms() as $form) {
            if ($request->request->has($form->getName())) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    public function handleRequest(Request $request)
    {
        foreach ($this->getForms() as $form) {
            if ($request->request->has($form->getName())) {
                return $form->handleRequest($request);
            }
        }

        return $this;
    }

    /**
     * @return void
     */
    protected function createForms()
    {
        $firstIndex = count($this->forms);
        $lastIndex = count($this->formTypes);
        for ($i = $firstIndex; $i < $lastIndex; $i++) {
            $this->forms[] = $this->createForm($this->formTypes[$i]);
        }
    }

    /**
     * @param \Symfony\Component\Form\FormTypeInterface $formType
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    protected function createForm(FormTypeInterface $formType)
    {
        return $this->formFactory->create($formType, $this->quoteTransfer);
    }

}
