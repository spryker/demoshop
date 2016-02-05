<?php

namespace Pyz\Yves\Checkout;

use Pyz\Yves\Application\Plugin\Pimple;
use Pyz\Yves\Checkout\Form\FormFactory;
use Pyz\Yves\Checkout\Process\StepFactory;
use Pyz\Yves\Checkout\Process\StepProcess;
use Spryker\Yves\Application\Application;
use Spryker\Yves\Kernel\AbstractFactory;
use Spryker\Client\Cart\CartClientInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class CheckoutFactory extends AbstractFactory
{

    /**
     * @return StepProcess
     */
    public function createCheckoutProcess()
    {
        return new StepProcess(
            $this->createStepFactory()->createSteps(),
            $this->getUrlGenerator(),
            $this->getCartClient()
        );
    }

    /**
     * @return StepFactory
     */
    public function createStepFactory()
    {
        return new StepFactory();
    }

    /**
     * @return FormFactory
     */
    public function createFormFactory()
    {
        return new FormFactory();
    }

    /**
     * @return CartClientInterface
     */
    public function getCartClient()
    {
        return $this->getLocator()->cart()->client();
    }

    /**
     * @return UrlGeneratorInterface
     */
    protected function getUrlGenerator()
    {
        return $this->getApplication()['url_generator'];
    }

    /**
     * @return Application
     */
    protected function getApplication()
    {
        return (new Pimple())->getApplication();
    }

}
