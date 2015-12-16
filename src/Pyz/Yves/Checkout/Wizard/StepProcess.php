<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Wizard;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Checkout\Wizard\Steps\StepInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\AbstractType;
use Spryker\Yves\Application\Application;

class StepProcess
{

    /**
     * @var StepInterface[]
     */
    protected $steps = [];

    /**
     * @var QuoteTransfer
     */
    protected $quoteTransfer;

    /**
     * @var Application
     */
    protected $application;

    /**
     * @var string
     */
    protected $currentRoute;

    /**
     * @var StepInterface
     */
    protected $currentStep;

    /**
     * @var string
     */
    protected $errorRoute = 'checkout_error_route';

    /**
     * StepProcess constructor.
     */
    public function __construct(
        QuoteTransfer $quoteTransfer,
        Application $application,
        array $steps = []
    )
    {
        $this->quoteTransfer = $quoteTransfer;
        $this->application = $application;
        $this->steps = $steps;
        $this->setCurrentStep();
    }


    /**
     * @param Request $request
     * @param AbstractType|null $formType
     *
     * @return array|RedirectResponse
     */
    public function process(Request $request, AbstractType $formType = null)
    {
        if (empty($this->currentStep)) {
            return $this->createRedirectResponse($this->application->path($this->errorRoute));
        }

        if (!$this->currentStep->preCondition($this->quoteTransfer)) {
            return $this->createRedirectResponse($this->getPreviousRoute());
        }

        $form = $this->createForm($formType);
        if ($this->canRenderForm($request, $this->currentStep)) {
            return ['form' => $form];
        }

        $data = $this->getDataForStep($form);

        $quoteTransfer = $this->currentStep->execute($this->quoteTransfer, $data);
        $route = $this->getNextStepRoute($this->currentStep, $quoteTransfer);

        return $this->createRedirectResponse($this->application->path($route));
    }

    /**
     * @param string $path
     *
     * @return RedirectResponse
     */
    protected function createRedirectResponse($path)
    {
        return new RedirectResponse($path, 302);
    }

    /**
     * @return void
     */
    protected function setCurrentStep()
    {
        $currentStep = null;
        foreach ($this->steps as $routeName => $step) {
            if (!$step->postCondition($this->quoteTransfer)) {
                $this->currentRoute = $routeName;
                $this->currentStep = $step;
                break;
            }
        }
    }

    /**
     * @return string
     */
    protected function getNexRoute()
    {
        $nextRoute = '';
        foreach ($this->steps as $routeName => $step) {
            if ($routeName === $this->currentRoute) {
                $nextRoute = key($this->steps);
                break;
            }
        }
        return $nextRoute;
    }

    /**
     * @return string
     */
    public function getPreviousRoute()
    {
        return 'previous-step';
    }

    /**
     * @param FormInterface $form
     *
     * @return string
     */
    protected function getDataForStep(FormInterface $form = null)
    {
        if (isset($form) && $form->isValid()) {
            return $form->getData();
        } else {
            return 'maybe some data';
        }
    }

    /**
     * @param StepInterface $step
     * @param QuoteTransfer $quoteTransfer
     *
     * @return string
     */
    protected function getNextStepRoute(StepInterface $step, QuoteTransfer $quoteTransfer)
    {
        if ($step->postCondition($quoteTransfer)) {
             return $this->getNexRoute();
        } else {
             return $this->currentRoute;
        }
    }

    /**
     * @param Request $request
     * @param $step
     *
     * @return bool
     */
    protected function canRenderForm(Request $request, StepInterface $step)
    {
        return ($step->requireInput() && $request->isMethod('GET'));
    }

    /**
     * @param AbstractType $formType
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    protected function createForm(AbstractType $formType)
    {
        return $this->application->createForm($formType);
    }
}
