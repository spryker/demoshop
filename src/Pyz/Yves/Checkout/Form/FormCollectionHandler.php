<?php

namespace Pyz\Yves\Checkout\Form;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Checkout\Dependency\DataProvider\DataProviderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Request;

class FormCollectionHandler implements FormCollectionHandlerInterface
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
     * @var \Pyz\Yves\Checkout\Dependency\DataProvider\DataProviderInterface
     */
    protected $dataProvider;

    /**
     * @var \Symfony\Component\Form\FormInterface[]
     */
    protected $forms = [];

    /**
     * @param \Symfony\Component\Form\FormFactoryInterface $formFactory
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param \Symfony\Component\Form\FormTypeInterface[] $formTypes
     * @param \Pyz\Yves\Checkout\Dependency\DataProvider\DataProviderInterface|null $dataProvider
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        QuoteTransfer $quoteTransfer,
        array $formTypes = [],
        DataProviderInterface $dataProvider = null
    ) {
        $this->formFactory = $formFactory;
        $this->quoteTransfer = $quoteTransfer;
        $this->formTypes = array_values($formTypes);
        $this->dataProvider = $dataProvider;
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
    public function provideDefaultFormData()
    {
        if ($this->dataProvider === null) {
            return;
        }

        foreach ($this->getForms() as $form) {
            $form->setData($this->dataProvider->getData($this->quoteTransfer));
        }
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
        $options = [];
        if ($this->dataProvider !== null) {
            $options = $this->dataProvider->getOptions($this->quoteTransfer);
        }

        return $this->formFactory->create($formType, $this->quoteTransfer, $options);
    }

}
