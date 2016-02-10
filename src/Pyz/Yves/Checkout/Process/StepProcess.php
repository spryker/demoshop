<?php

namespace Pyz\Yves\Checkout\Process;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Checkout\Form\FormCollectionHandlerInterface;
use Pyz\Yves\Checkout\Process\Steps\StepInterface;
use Spryker\Client\Cart\CartClientInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Pyz\Yves\Checkout\Plugin\Provider\CheckoutControllerProvider;

class StepProcess
{

    /**
     * @var \Pyz\Yves\Checkout\Process\Steps\StepInterface[]
     */
    protected $steps = [];

    /**
     * @var \Pyz\Yves\Checkout\Process\Steps\StepInterface[]
     */
    protected $completedSteps = [];

    /**
     * @var \Spryker\Client\Cart\CartClientInterface
     */
    protected $cartClient;

    /**
     * @var string
     */
    protected $errorRoute = CheckoutControllerProvider::CHECKOUT_ERROR;

    /**
     * @var \Symfony\Component\Routing\Generator\UrlGeneratorInterface
     */
    protected $urlGenerator;

    /**
     * @param \Pyz\Yves\Checkout\Process\Steps\StepInterface[] $steps
     * @param \Symfony\Component\Routing\Generator\UrlGeneratorInterface $urlGenerator
     * @param \Spryker\Client\Cart\CartClientInterface $cartClient
     */
    public function __construct(
        array $steps,
        UrlGeneratorInterface $urlGenerator,
        CartClientInterface $cartClient
    ) {
        $this->urlGenerator = $urlGenerator;
        $this->steps = $steps;
        $this->cartClient = $cartClient;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Pyz\Yves\Checkout\Form\FormCollectionHandlerInterface|null $formCollection
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function process(Request $request, FormCollectionHandlerInterface $formCollection = null)
    {
        $currentStep = $this->getCurrentStep($request);

        if ($currentStep->preCondition($this->getQuoteTransfer()) === false) {
            $escapeRoute = $this->getEscapeRoute($currentStep);
            return $this->createRedirectResponse($this->getUrlFromRoute($escapeRoute));
        }

        if ($this->canAccessStep($request, $currentStep) === false) {
            $stepRoute = $currentStep->getStepRoute();
            return $this->createRedirectResponse($this->getUrlFromRoute($stepRoute));
        }

        if ($currentStep->requireInput($this->getQuoteTransfer()) === false) {
            $this->executeWithoutInput($currentStep, $request);
            return $this->createRedirectResponse($this->getNextRedirectUrl($currentStep));
        }

        if ($formCollection !== null) {
            if ($formCollection->hasSubmittedForm($request)) {
                $form = $formCollection->handleRequest($request);
                if ($form->isValid()) {
                    $this->executeWithFormInput($currentStep, $request, $form->getData());
                    return $this->createRedirectResponse($this->getNextRedirectUrl($currentStep));
                }
            } else {
                $formCollection->provideDefaultFormData();
            }
            return $this->getTemplateVariables($currentStep, $formCollection);
        }

        $this->executeWithoutInput($currentStep, $request);
        return $this->getTemplateVariables($currentStep);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Pyz\Yves\Checkout\Process\Steps\StepInterface
     */
    protected function getCurrentStep(Request $request)
    {
        $currentStep = null;
        $quoteTransfer = $this->getQuoteTransfer();
        foreach ($this->steps as $step) {
            if ($step->postCondition($quoteTransfer) === false || $request->get('_route') === $step->getStepRoute()) {
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
     * @param \Pyz\Yves\Checkout\Process\Steps\StepInterface $currentStep
     *
     * @return null|\Pyz\Yves\Checkout\Process\Steps\StepInterface
     */
    protected function getNextStep(StepInterface $currentStep)
    {
        if ($this->isLastStep() === true) {
            return $this->getLastStep();
        }

        foreach ($this->steps as $step) {
            if ($step->getStepRoute() === $currentStep->getStepRoute()) {
                return current($this->steps);
            }
        }

        return null;
    }

    /**
     * @return \Pyz\Yves\Checkout\Process\Steps\StepInterface
     */
    public function getPreviousStep()
    {
        end($this->completedSteps);
        $prev = current($this->completedSteps);
        reset($this->completedSteps);

        return $prev;
    }

    /**
     * @return \Pyz\Yves\Checkout\Process\Steps\StepInterface
     */
    protected function getFirstStep()
    {
        reset($this->steps);
        $firstStep = current($this->steps);

        return $firstStep;
    }

    /**
     * @return \Pyz\Yves\Checkout\Process\Steps\StepInterface
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
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Pyz\Yves\Checkout\Process\Steps\StepInterface $currentStep
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
     * @param \Pyz\Yves\Checkout\Process\Steps\StepInterface $currentStep
     *
     * @return string
     */
    protected function getNextRedirectUrl(StepInterface $currentStep)
    {
        if (!empty($currentStep->getExternalRedirectUrl())) {
            return $currentStep->getExternalRedirectUrl();
        }

        $route = $this->getNextStepRoute($currentStep, $this->getQuoteTransfer());

        return $this->getUrlFromRoute($route);
    }

    /**
     * @param \Pyz\Yves\Checkout\Process\Steps\StepInterface $currentStep
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return string
     */
    protected function getNextStepRoute(StepInterface $currentStep, QuoteTransfer $quoteTransfer)
    {
        if ($currentStep->postCondition($quoteTransfer) === true) {
            $nextStep = $this->getNextStep($currentStep);
            if ($nextStep !== null) {
                return $nextStep->getStepRoute();
            }
        }

        if ($currentStep->requireInput($quoteTransfer) === true) {
            return $currentStep->getStepRoute();
        } else {
            return $this->errorRoute;
        }
    }

    /**
     * @return string
     */
    protected function getPreviousStepRoute()
    {
        $step = $this->getPreviousStep();
        if (empty($step) === false) {
            return $this->getPreviousStep()->getStepRoute();
        }

        return '';
    }

    /**
     * @param \Pyz\Yves\Checkout\Process\Steps\StepInterface $currentStep
     *
     * @return string
     */
    protected function getEscapeRoute(StepInterface $currentStep)
    {
        $escapeRoute = $currentStep->getEscapeRoute();
        if ($escapeRoute === null) {
            $escapeRoute = $this->getPreviousStep()->getStepRoute();
        }

        return $escapeRoute;
    }

    /**
     * @param string $route
     *
     * @return string
     */
    protected function getUrlFromRoute($route)
    {
        if (empty($route) === true) {
            return $route;
        }

        return $this->urlGenerator->generate($route);
    }

    /**
     * @param \Pyz\Yves\Checkout\Process\Steps\StepInterface $currentStep
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return void
     */
    protected function executeWithoutInput(StepInterface $currentStep, Request $request)
    {
        $quoteTransfer = $currentStep->execute($request, $this->getQuoteTransfer());
        $this->cartClient->storeQuoteToSession($quoteTransfer);
    }

    /**
     * @param \Pyz\Yves\Checkout\Process\Steps\StepInterface $currentStep
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    protected function executeWithFormInput(
        StepInterface $currentStep,
        Request $request,
        QuoteTransfer $quoteTransfer
    ) {
        $quoteTransfer = $currentStep->execute($request, $quoteTransfer);
        $this->cartClient->storeQuoteToSession($quoteTransfer);
    }

    /**
     * @param string $url
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    protected function createRedirectResponse($url)
    {
        return new RedirectResponse($url);
    }

    /**
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    protected function getQuoteTransfer()
    {
        return $this->cartClient->getQuote();
    }

    /**
     * @param \Pyz\Yves\Checkout\Process\Steps\StepInterface $currentStep
     * @param \Pyz\Yves\Checkout\Form\FormCollectionHandlerInterface|null $formCollection
     *
     * @return array
     */
    protected function getTemplateVariables(StepInterface $currentStep, FormCollectionHandlerInterface $formCollection = null)
    {
        $templateVariables = [
            'previousStepUrl' => $this->getUrlFromRoute($this->getPreviousStepRoute()),
            'quoteTransfer' => $this->getQuoteTransfer(),
        ];
        $templateVariables = array_merge($templateVariables, $currentStep->getTemplateVariables());

        if ($formCollection !== null) {
            foreach ($formCollection->getForms() as $form) {
                $templateVariables[$form->getName()] = $form->createView();
            }
        }

        return $templateVariables;
    }

}
