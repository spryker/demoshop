<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Wizard;

use Codeception\Step;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Checkout\Wizard\Steps\StepInterface;
use Spryker\Client\Cart\CartClient;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\AbstractType;
use Spryker\Yves\Application\Application;

class StepProcess
{

    /**
     * @var stepConfiguration[]
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
     * @var string
     */
    protected $errorRoute = 'checkout_error_route';
    /**
     * @var CartClient
     */
    private $cartClient;

    /**
     * StepProcess constructor.
     */
    public function __construct(
        QuoteTransfer $quoteTransfer,
        Application $application,
        array $steps = [],
        CartClient $cartClient
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
        $stepConfiguration = $this->getCurrentStepConfiguration();

        if ($request->get('_route') !== $this->currentRoute) {
            return $this->createRedirectResponse($this->application->path($this->currentRoute));
        }

        if ($stepConfiguration === null) {
            return $this->createRedirectResponse($this->application->path($this->errorRoute));
        }

        $currentStep = $stepConfiguration->getStep();
        $escapeRoute = $this->getEscapeRoute($stepConfiguration);

        if ($currentStep->preCondition($this->quoteTransfer) === false) {
            return $this->createRedirectResponse($this->application->path($escapeRoute));
        }

        if ($currentStep->requireInput() === false) {
            $route = $this->executeWithoutInput($currentStep);
            return $this->createRedirectResponse($this->application->path($route));
        }

        $data = null;
        if ($formType !== null) {
            $form = $this->createForm($formType);

            if ($request->isMethod('POST')) {
                if ($form->isValid()) {
                    $data = $form->getData();
                    $route = $this->executeWithFormInput($currentStep, $data);
                    return $this->createRedirectResponse($this->application->path($route));
                } else {
                    // set error message
                }
            }
            return ['form' => $form->createView(), 'quoteTransfer' => $this->quoteTransfer];
        } else {
            $this->quoteTransfer = $currentStep->execute($this->quoteTransfer);
            $this->cartClient->storeQuoteToSession($this->quoteTransfer);
            return ['quoteTransfer' => $this->quoteTransfer];
        }
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
     * @return StepConfiguration|null
     */
    protected function getCurrentStepConfiguration()
    {
        $currentStepConfiguration = null;
        $isLastStep = true;
        // get where we are

        foreach ($this->steps as $routeName => $stepConfiguration) {
            if ($stepConfiguration->getStep()->postCondition($this->quoteTransfer) === false) {
                $this->currentRoute = $routeName;
                $currentStepConfiguration = $stepConfiguration;
                $isLastStep = false;
                break;
            }
        }

        if ($isLastStep) {
            $currentStepConfiguration = $stepConfiguration;
            $this->currentRoute = $routeName;
        }

        reset($this->steps);
        if ($currentStepConfiguration === null) {
            $currentStepConfiguration = current($this->steps);
            $this->currentRoute = key($this->steps);
        }

        return $currentStepConfiguration;
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
     * @param AbstractType $formType
     *
     * @return FormInterface
     */
    protected function createForm(AbstractType $formType)
    {
        return $this->application->createForm($formType);
    }

    /**
     * @param StepConfiguration $stepConfiguration
     *
     * @return string
     */
    protected function getEscapeRoute(StepConfiguration $stepConfiguration)
    {
        $escapeUrl = $stepConfiguration->getEscapeRoute();
        if ($escapeUrl === null) {
            $escapeUrl = $this->getPreviousRoute();
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
        $route = $this->getNextStepRoute($currentStep, $this->quoteTransfer);

        return $route;
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
        $route = $this->getNextStepRoute($currentStep, $this->quoteTransfer);

        return $route;
    }
}
