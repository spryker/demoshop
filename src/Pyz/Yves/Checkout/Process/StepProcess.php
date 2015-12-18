<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Process;

use Codeception\Step;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Checkout\Process\Steps\StepInterface;
use Spryker\Client\Cart\CartClient;
use Spryker\Client\Cart\CartClientInterface;
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
    protected $errorRoute = 'checkout_error_route';

    /**
     * @var CartClient
     */
    protected $cartClient;

    /**
     * @var StepInterface[]
     */
    protected $completedSteps = [];

    /**
     * @param QuoteTransfer $quoteTransfer
     * @param Application $application
     * @param StepInterface[] $steps
     * @param CartClientInterface $cartClient
     */
    public function __construct(
        QuoteTransfer $quoteTransfer,
        Application $application,
        array $steps,
        CartClientInterface $cartClient
    ) {
        $this->quoteTransfer = $quoteTransfer;
        $this->application = $application;
        $this->steps = $steps;
        $this->cartClient = $cartClient;
    }

    /**
     * @param Request $request
     * @param AbstractType|null $formType
     *
     * @return array|RedirectResponse
     */
    public function process(Request $request, AbstractType $formType = null)
    {
        $currentStep = $this->getCurrentStep($request);

        if ($this->canAccessStep($request, $currentStep) === false) {
            return $this->createRedirectResponse($currentStep->getStepRoute());
        }

        $escapeRoute = $this->getEscapeRoute($currentStep);

        if ($currentStep->preCondition($this->quoteTransfer) === false) {
            return $this->createRedirectResponse($escapeRoute);
        }

        if ($currentStep->requireInput() === false) {
            $route = $this->executeWithoutInput($currentStep);
            return $this->createRedirectResponse($route);
        }

        if ($formType !== null) {
            $form = $this->createForm($formType);

            if ($request->isMethod('POST')) {
                if ($form->isValid()) {
                    $route = $this->executeWithFormInput($currentStep, $form->getData());
                    return $this->createRedirectResponse($route);
                } else {
                    //@todo  add flash message.
                }
            }
            return [
                'previousStepUrl' => $this->getUrlForPreviousStep(),
                'quoteTransfer' => $this->quoteTransfer,
                'form' => $form->createView(),
            ];
        } else {
            $this->quoteTransfer = $currentStep->execute($this->quoteTransfer);
            $this->cartClient->storeQuoteToSession($this->quoteTransfer);
            return [
                'previousStepUrl' => $this->getUrlForPreviousStep(),
                'quoteTransfer' => $this->quoteTransfer,
            ];
        }
    }

    /**
     * @todo cleanup logic.
     * @return StepInterface
     */
    protected function getCurrentStep(Request $request)
    {
        $currentStep = null;
        foreach ($this->steps as $step) {
            if ($step->postCondition($this->quoteTransfer) === false || $request->get('_route') === $step->getStepRoute()) {
                $currentStep = $step;
                break;
            }
            $this->completedSteps[] = $step;
        }

        if ($this->isLastStep()) {
            return $this->getLastStep();
        }

        if ($currentStep === null) {
            return $this->getFirstStep();
        }

        return $currentStep;
    }

    /**
     * @return StepInterface|null
     */
    protected function getNextStep(StepInterface $currentStep)
    {
        if ($this->isLastStep() === true) {
            return $this->getLastStep();
        }

        foreach ($this->steps as $step) {
            if ($step->getStepRoute() === $currentStep->getStepRoute()) {
                return current($this->steps);
                break;
            }
        }
        return null;
    }

    /**
     * @return StepInterface
     */
    public function getPreviousStep()
    {
        end($this->completedSteps);
        $prev = current($this->completedSteps);
        reset($this->completedSteps);

        return $prev;
    }

    /**
     * @return StepInterface
     */
    protected function getFirstStep()
    {
        reset($this->steps);
        $firstStep = current($this->steps);
        reset($this->steps);

        return $firstStep;
    }

    /**
     * @return StepInterface
     */
    protected function getLastStep()
    {
        end($this->steps);
        $lastStep = current($this->steps);
        reset($this->steps);

        return $lastStep;
    }

    /**
     * @return bool
     */
    protected function isLastStep()
    {
        return (count($this->steps) === count($this->completedSteps));
    }

    /**
     * @param StepInterface $currentStep
     * @param QuoteTransfer $quoteTransfer
     *
     * @return string
     */
    protected function getNextStepRoute(StepInterface $currentStep, QuoteTransfer $quoteTransfer)
    {
        if ($currentStep->postCondition($quoteTransfer)) {
            $nextStep = $this->getNextStep($currentStep);
            if ($nextStep !== null) {
                return $nextStep->getStepRoute();
            }
        }

        return $currentStep->getStepRoute();
    }

    /**
     * @param AbstractType $formType
     *
     * @return FormInterface
     */
    protected function createForm(AbstractType $formType)
    {
        return $this->application->createForm($formType);
    }

    /**
     * @param StepInterface $currentStep
     *
     * @return string
     */
    protected function getEscapeRoute(StepInterface $currentStep)
    {
        $escapeUrl = $currentStep->getEscapeRoute();
        if ($escapeUrl === null) {
            $escapeUrl = $this->getPreviousStep()->getStepRoute();
        }

        return $escapeUrl;
    }

    /**
     * @param StepInterface $currentStep
     *
     * @return string
     */
    protected function executeWithoutInput(StepInterface $currentStep)
    {
        $this->quoteTransfer = $currentStep->execute($this->quoteTransfer);
        $this->cartClient->storeQuoteToSession($this->quoteTransfer);
        return $this->getNextStepRoute($currentStep, $this->quoteTransfer);
    }

    /**
     * @param StepInterface $currentStep
     * @param $data
     *
     * @return string
     */
    protected function executeWithFormInput(StepInterface $currentStep, $data)
    {
        $this->quoteTransfer = $currentStep->execute($this->quoteTransfer, $data);
        $this->cartClient->storeQuoteToSession($this->quoteTransfer);
        return $this->getNextStepRoute($currentStep, $this->quoteTransfer);
    }

    /**
     * @param string $route
     *
     * @return RedirectResponse
     */
    protected function createRedirectResponse($route)
    {
        return new RedirectResponse($this->getUrlFromRoute($route));
    }

    /**
     * @param Request $request
     * @param StepInterface $currentStep
     *
     * @return bool
     */
    protected function canAccessStep(Request $request, StepInterface $currentStep)
    {
        if ($request->get('_route') === $currentStep->getStepRoute()) {
            return true;
        }

        foreach ($this->completedSteps as $step) {
            if ($step->getStepRoute() === $request->get('_route')) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return string
     */
    protected function getUrlFromRoute($route)
    {
        return $this->application->path($route);
    }

    /**
     * @return string
     */
    protected function getUrlForPreviousStep()
    {
        $step = $this->getPreviousStep();
        if (!empty($step)) {
            return $this->getUrlFromRoute($this->getPreviousStep()->getStepRoute());
        }

        return '';
    }
}
