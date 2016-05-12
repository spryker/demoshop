<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout;

use Pyz\Yves\Checkout\Form\FormFactory;
use Pyz\Yves\Checkout\Plugin\Provider\CheckoutControllerProvider;
use Pyz\Yves\Checkout\Process\StepFactory;
use Spryker\Yves\CheckoutStepEngine\Process\StepProcess;
use Spryker\Yves\Kernel\AbstractFactory;

class CheckoutFactory extends AbstractFactory
{

    /**
     * @return \Spryker\Yves\CheckoutStepEngine\Process\StepProcess
     */
    public function createCheckoutProcess()
    {
        return new StepProcess(
            $this->createStepFactory()->createSteps(),
            $this->getUrlGenerator(),
            $this->getCartClient(),
            CheckoutControllerProvider::CHECKOUT_ERROR
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
        return $this->getProvidedDependency(CheckoutDependencyProvider::CLIENT_CART);
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
        return $this->getProvidedDependency(CheckoutDependencyProvider::PLUGIN_APPLICATION);
    }

}
