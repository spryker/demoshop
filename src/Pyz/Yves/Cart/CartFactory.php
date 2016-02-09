<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Cart;

use Pyz\Yves\Cart\Handler\CartOperationHandler;
use Spryker\Client\Calculation\CalculationClientInterface;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Yves\Kernel\AbstractFactory;
use Pyz\Yves\Cart\Handler\CartVoucherHandler;
use Spryker\Yves\Application\Application;
use Pyz\Yves\Application\Plugin\Pimple;

class CartFactory extends AbstractFactory
{
    /**
     * @return \Spryker\Client\Calculation\CalculationClientInterface
     */
    public function getCalculationClient()
    {
       return $this->getLocator()->calculation()->client();
    }

    /**
     * @return \Spryker\Client\Cart\CartClientInterface
     */
    public function getCartClient()
    {
        return $this->getLocator()->cart()->client();
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
        return (new Pimple())->getApplication();
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
}
