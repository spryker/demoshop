<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cart;

use Pyz\Yves\Cart\Form\VoucherForm;
use Pyz\Yves\Cart\Grouper\CartItemGouper;
use Pyz\Yves\Cart\Handler\CartOperationHandler;
use Pyz\Yves\Cart\Handler\CartVoucherHandler;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Yves\Kernel\AbstractFactory;

class CartFactory extends AbstractFactory
{

    /**
     * @return \Spryker\Client\Calculation\CalculationClientInterface
     */
    public function getCalculationClient()
    {
        return $this->getProvidedDependency(CartDependencyProvider::CLIENT_CALCULATION);
    }

    /**
     * @return \Spryker\Client\Cart\CartClientInterface
     */
    public function getCartClient()
    {
        return $this->getProvidedDependency(CartDependencyProvider::CLIENT_CART);
    }

    /**
     * @return \Pyz\Yves\Cart\Handler\CartVoucherHandler
     */
    public function createCartVoucherHandler()
    {
        return new CartVoucherHandler($this->getCalculationClient(), $this->getCartClient(), $this->getFlashMessenger());
    }

    /**
     * @return \Pyz\Yves\Cart\Handler\CartOperationHandler
     */
    public function createCartOperationHandler()
    {
        return new CartOperationHandler($this->getCartClient(), $this->getLocale(), $this->getFlashMessenger());
    }

    /**
     * @return \Spryker\Yves\Application\Application
     */
    protected function createApplication()
    {
        return $this->getProvidedDependency(CartDependencyProvider::PLUGIN_APPLICATION);
    }

    /**
     * @return \Pyz\Yves\Application\Business\Model\FlashMessengerInterface
     */
    protected function getFlashMessenger()
    {
        return $this->createApplication()['flash_messenger'];
    }

    /**
     * @return string
     */
    protected function getLocale()
    {
        return $this->createApplication()['locale'];
    }

    /**
     * @return \Symfony\Component\Form\FormInterface
     */
    public function createVoucherForm()
    {
        return $this
            ->getProvidedDependency(ApplicationConstants::FORM_FACTORY)
            ->create($this->createVoucherFormType());
    }

    /**
     * @return \Symfony\Component\Form\AbstractType
     */
    protected function createVoucherFormType()
    {
        return new VoucherForm();
    }

    /**
     * @return \Pyz\Yves\Cart\Grouper\CartItemGouper
     */
    public function createCartItemGrouper()
    {
        return new CartItemGouper();
    }

}
