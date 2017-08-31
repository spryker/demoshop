<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Form\Steps;

use Spryker\Shared\Kernel\Transfer\AbstractTransfer;
use Spryker\Yves\Checkout\Form\Provider\FilterableSubFormProvider;
use Spryker\Yves\StepEngine\Dependency\Form\StepEngineFormDataProviderInterface;
use Spryker\Yves\StepEngine\Form\FormCollectionHandler;
use Spryker\Yves\StepEngine\Form\FormCollectionHandlerProviderInterface;
use Symfony\Component\Form\FormFactoryInterface;

class PaymentFormCollectionHandlerProvider implements FormCollectionHandlerProviderInterface
{

    /**
     * @var \Spryker\Yves\Checkout\Form\Provider\FilterableSubFormProvider
     */
    protected $subFormProvider;

    /**
     * @var \Symfony\Component\Form\FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var \Spryker\Yves\StepEngine\Dependency\Form\StepEngineFormDataProviderInterface
     */
    private $stepEngineFormDataProvider;

    /**
     * @param \Spryker\Yves\Checkout\Form\Provider\FilterableSubFormProvider $subFormProvider
     * @param \Symfony\Component\Form\FormFactoryInterface $formFactory
     * @param \Spryker\Yves\StepEngine\Dependency\Form\StepEngineFormDataProviderInterface $stepEngineFormDataProvider
     */
    public function __construct(
        FilterableSubFormProvider $subFormProvider,
        FormFactoryInterface $formFactory,
        StepEngineFormDataProviderInterface $stepEngineFormDataProvider
    ) {
        $this->subFormProvider = $subFormProvider;
        $this->formFactory = $formFactory;
        $this->stepEngineFormDataProvider = $stepEngineFormDataProvider;
    }

    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer $dataTransfer
     *
     * @return \Spryker\Yves\StepEngine\Form\FormCollectionHandlerInterface
     */
    public function provideFormCollectionHandler(AbstractTransfer $dataTransfer)
    {
        return new FormCollectionHandler(
            [new PaymentForm($this->subFormProvider->getSubForms($dataTransfer))],
            $this->formFactory,
            $this->stepEngineFormDataProvider
        );
    }

}
