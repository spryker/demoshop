<?php

namespace Pyz\Yves\Checkout\Process;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Application\Business\Model\FlashMessengerInterface;
use Pyz\Yves\Checkout\CheckoutFactory;
use Pyz\Yves\Checkout\Process\Steps\StepInterface;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Shared\Gui\Form\AbstractForm;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Spryker\Yves\Application\Controller\AbstractController;
use Pyz\Yves\Checkout\Plugin\Provider\CheckoutControllerProvider;

class StepProcess
{

    /**
     * @var StepInterface[]
     */
    protected $steps = [];

    /**
     * @var StepInterface[]
     */
    protected $completedSteps = [];

    /**
     * @var CartClientInterface
     */
    protected $cartClient;

    /**
     * @var string
     */
    protected $errorRoute = CheckoutControllerProvider::CHECKOUT_ERROR;

    /**
     * @var UrlGeneratorInterface
     */
    protected $urlGenerator;

    /**
     * @var FormFactoryInterface
     */
    protected $formFactory;

    /**
     * @var FlashMessengerInterface
     */
    protected $flashMessenger;

    /**
     * @param FormFactoryInterface $formFactory
     * @param UrlGeneratorInterface $urlGenerator
     * @param StepInterface[] $steps
     * @param CartClientInterface $cartClient
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        UrlGeneratorInterface $urlGenerator,
        array $steps,
        CartClientInterface $cartClient,
        FlashMessengerInterface $flashMessenger
    ) {
        $this->formFactory = $formFactory;
        $this->urlGenerator = $urlGenerator;
        $this->steps = $steps;
        $this->cartClient = $cartClient;
        $this->flashMessenger = $flashMessenger;
    }

    /**
     * @param Request $request
     * @param CheckoutFactory $checkoutFactory
     * @param AbstractForm|null $stepForm
     *
     * @return array|RedirectResponse
     */
    public function process(
        Request $request,
        CheckoutFactory $checkoutFactory,
        AbstractForm $stepForm = null
    ) {
        $currentStep = $this->getCurrentStep($request);

        if ($this->canAccessStep($request, $currentStep) === false) {
            $stepRoute = $currentStep->getStepRoute();
            return $this->createRedirectResponse($this->getUrlFromRoute($stepRoute));
        }

        if ($currentStep->preCondition($this->getQuoteTransfer()) === false) {
            $escapeRoute = $this->getEscapeRoute($currentStep);
            return $this->createRedirectResponse($this->getUrlFromRoute($escapeRoute));
        }

        if ($currentStep->requireInput() === false) {
            $this->executeWithoutInput($currentStep, $request, $checkoutFactory);
            return $this->createRedirectResponse($this->getNextRedirectUrl($currentStep));
        }

        if ($stepForm !== null) {
            $form = $this->createForm($stepForm, $this->getQuoteTransfer());
            $form->handleRequest($request);
            if ($request->isMethod(Request::METHOD_POST)) {
                if ($form->isValid()) {
                    $quoteTransfer = $form->getData();
                    $this->executeWithFormInput($currentStep, $request, $quoteTransfer, $checkoutFactory);
                    return $this->createRedirectResponse($this->getNextRedirectUrl($currentStep));
                } else {
                    $this->flashMessenger->addErrorMessage('checkout.form.validation.failed');
                }
            }
            return [
                'paymentMethodsSubForms' => ['payolution/invoice', 'payolution/installment'],
                'previousStepUrl' => $this->getUrlFromRoute($this->getPreviousStepRoute()),
                'quoteTransfer' => $this->getQuoteTransfer(),
                'form' => $form->createView(),
            ];
        } else {
            $this->executeWithoutInput($currentStep, $request, $checkoutFactory);
            return [
                'previousStepUrl' => $this->getUrlFromRoute($this->getPreviousStepRoute()),
                'quoteTransfer' => $this->getQuoteTransfer(),
            ];
        }
    }

    /**
     * @param Request $request
     *
     * @return StepInterface
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
     * @param StepInterface $currentStep
     *
     * @return null|StepInterface
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
     * @param StepInterface $currentStep
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

        if ($currentStep->requireInput() === true) {
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
     * @param StepInterface $currentStep
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
     * @param StepInterface $currentStep
     * @param Request $request
     * @param CheckoutFactory $checkoutFactory
     *
     * @return void
     */
    protected function executeWithoutInput(
        StepInterface $currentStep,
        Request $request,
        CheckoutFactory $checkoutFactory
    ) {
        $quoteTransfer = $currentStep->execute($request, $this->getQuoteTransfer(), $checkoutFactory);
        $this->cartClient->storeQuoteToSession($quoteTransfer);
    }

    /**
     * @param StepInterface $currentStep
     * @param Request $request
     * @param QuoteTransfer $quoteTransfer
     * @param CheckoutFactory $checkoutFactory
     *
     * @return void
     */
    protected function executeWithFormInput(
        StepInterface $currentStep,
        Request $request,
        QuoteTransfer $quoteTransfer,
        CheckoutFactory $checkoutFactory
    ) {
        $quoteTransfer = $currentStep->execute($request, $quoteTransfer, $checkoutFactory);
        $this->cartClient->storeQuoteToSession($quoteTransfer);
    }

    /**
     * @param AbstractForm $form
     * @param mixed $data
     *
     * @return FormInterface
     */
    protected function createForm(AbstractForm $form, $data = null)
    {
        return $this->formFactory->create($form, $data);
    }

    /**
     * @param string $url
     *
     * @return RedirectResponse
     */
    protected function createRedirectResponse($url)
    {
        return new RedirectResponse($url);
    }

    /**
     * @return QuoteTransfer
     */
    protected function getQuoteTransfer()
    {
        return $this->cartClient->getQuote();
    }
}
