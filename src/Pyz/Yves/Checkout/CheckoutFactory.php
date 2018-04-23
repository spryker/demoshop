<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout;

use Pyz\Yves\Cart\Handler\CodeHandler;
use Pyz\Yves\Checkout\Form\FormFactory;
use Pyz\Yves\Checkout\Process\OfferStepFactory;
use Pyz\Yves\Checkout\Process\StepFactory;
use Spryker\Client\Calculation\CalculationClientInterface;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Yves\Checkout\CheckoutFactory as SprykerCheckoutFactory;
use Spryker\Yves\Kernel\Application;
use Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface;
use Spryker\Yves\StepEngine\Process\StepEngineInterface;

class CheckoutFactory extends SprykerCheckoutFactory
{
    /**
     * @return \Spryker\Yves\StepEngine\Process\StepEngineInterface
     */
    public function createCheckoutProcess(): StepEngineInterface
    {
        return $this->createStepFactory()->createStepEngine(
            $this->createStepFactory()->createStepCollection()
        );
    }

    /**
     * @return \Spryker\Yves\StepEngine\Process\StepEngineInterface
     */
    public function createOfferCheckoutProcess(): StepEngineInterface
    {
        return $this->createOfferStepFactory()->createStepEngine(
            $this->createOfferStepFactory()->createStepCollection()
        );
    }

    /**
     * @return \Pyz\Yves\Checkout\Process\StepFactory
     */
    public function createStepFactory(): StepFactory
    {
        return new StepFactory();
    }

    /**
     * @return \Pyz\Yves\Checkout\Process\OfferStepFactory
     */
    public function createOfferStepFactory(): OfferStepFactory
    {
        return new OfferStepFactory();
    }

    /**
     * @return \Pyz\Yves\Checkout\Form\FormFactory
     */
    public function createCheckoutFormFactory(): FormFactory
    {
        return new FormFactory();
    }

    /**
     * @return \Pyz\Yves\Cart\Handler\CodeHandler
     */
    public function createVoucherHandler(): CodeHandler
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
    protected function getCodeHandlerPlugins(): array
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
    protected function getApplication(): Application
    {
        return $this->getProvidedDependency(CheckoutDependencyProvider::PLUGIN_APPLICATION);
    }

    /**
     * @return \Spryker\Client\Calculation\CalculationClientInterface
     */
    protected function getCalculationClient(): CalculationClientInterface
    {
        return $this->getProvidedDependency(CheckoutDependencyProvider::CLIENT_CALCULATION);
    }

    /**
     * @return \Spryker\Client\Cart\CartClientInterface
     */
    protected function getCartClient(): CartClientInterface
    {
        return $this->getProvidedDependency(CheckoutDependencyProvider::CLIENT_CART);
    }

    /**
     * @return \Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface
     */
    protected function getFlashMessenger(): FlashMessengerInterface
    {
        return $this->getApplication()['flash_messenger'];
    }
}
