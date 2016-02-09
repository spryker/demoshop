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
     * @return \Pyz\Yves\Checkout\Process\StepProcess
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
     * @return \Pyz\Yves\Checkout\Process\StepFactory
     */
    public function createStepFactory()
    {
        return new StepFactory();
    }

    /**
     * @return \Pyz\Yves\Checkout\Form\FormFactory
     */
    public function createCheckoutFormFactory()
    {
        return new FormFactory();
    }

    /**
     * @return \Spryker\Client\Cart\CartClientInterface
     */
    public function getCartClient()
    {
        return $this->getLocator()->cart()->client();
    }

    /**
     * @return \Symfony\Component\Routing\Generator\UrlGeneratorInterface
     */
    protected function getUrlGenerator()
    {
        return $this->getApplication()['url_generator'];
    }

    /**
     * @return \Spryker\Yves\Application\Application
     */
    protected function getApplication()
    {
        return (new Pimple())->getApplication();
    }

}
