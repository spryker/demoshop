<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout;

use Pyz\Yves\Cart\Handler\CodeHandler;
use Pyz\Yves\Checkout\Form\FormFactory;
use Pyz\Yves\Checkout\Process\StepFactory;
use Spryker\Yves\Kernel\AbstractFactory;

class CheckoutFactory extends AbstractFactory
{
    /**
     * @return \Spryker\Yves\StepEngine\Process\StepEngineInterface
     */
    public function createCheckoutProcess()
    {
        return $this->createStepFactory()->createStepEngine(
            $this->createStepFactory()->createStepCollection()
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
     * @return \Pyz\Yves\Cart\Handler\CodeHandler
     */
    public function createVoucherHandler()
    {
        return new CodeHandler(
            $this->getCalculationClient(),
            $this->getCartClient(),
            $this->getFlashMessenger(),
            $this->getCodeHandlerPlugins()
        );
    }

    /**
     * @return \Pyz\Yves\Cart\Plugin\CodeHandlerInterface[]
     */
    protected function getCodeHandlerPlugins()
    {
        return $this->getProvidedDependency(CheckoutDependencyProvider::CODE_HANDLER_PLUGINS);
    }

    /**
     * @return \Symfony\Component\Routing\Generator\UrlGeneratorInterface
     */
    protected function getUrlGenerator()
    {
        return $this->getApplication()['url_generator'];
    }

    /**
     * @return \Spryker\Yves\Kernel\Application
     */
    protected function getApplication()
    {
        return $this->getProvidedDependency(CheckoutDependencyProvider::PLUGIN_APPLICATION);
    }

    /**
     * @return \Spryker\Client\Calculation\CalculationClientInterface
     */
    protected function getCalculationClient()
    {
        return $this->getProvidedDependency(CheckoutDependencyProvider::CLIENT_CALCULATION);
    }

    /**
     * @return \Spryker\Client\Cart\CartClientInterface
     */
    protected function getCartClient()
    {
        return $this->getProvidedDependency(CheckoutDependencyProvider::CLIENT_CART);
    }

    /**
     * @return \Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface
     */
    protected function getFlashMessenger()
    {
        return $this->getApplication()['flash_messenger'];
    }
}
