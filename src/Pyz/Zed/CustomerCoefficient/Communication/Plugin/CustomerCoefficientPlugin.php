<?php
/**
 * Created by PhpStorm.
 * User: theodorosliokos
 * Date: 25.09.17
 * Time: 13:50
 */

namespace Pyz\Zed\CustomerCoefficient\Communication\Plugin;

use Generated\Shared\Transfer\CartChangeTransfer;
use Pyz\Zed\CustomerCoefficient\Business\CustomerCoefficientFacade;
use Spryker\Zed\Cart\Dependency\ItemExpanderPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * Class CustomerCoefficientPlugin
 * @package Pyz\Zed\CustomerCoefficient\Communication\Plugin
 *
 * @method CustomerCoefficientFacade getFacade()
 */
class CustomerCoefficientPlugin extends AbstractPlugin implements ItemExpanderPluginInterface
{
    /**
     * @param CartChangeTransfer $cartChangeTransfer
     * @return CartChangeTransfer
     */
    public function expandItems(CartChangeTransfer $cartChangeTransfer)
    {
        $customerCoefficient = $this->getCustomerCoefficient($cartChangeTransfer);
        foreach($cartChangeTransfer->getItems() as $itemTransfer) {
            $itemTransfer->setUnitGrossPrice(round($itemTransfer->getUnitGrossPrice() * $customerCoefficient));
        }

        return $cartChangeTransfer;
    }

    /**
     * @param CartChangeTransfer $cartChangeTransfer
     * @return float
     */
    private function getCustomerCoefficient(CartChangeTransfer $cartChangeTransfer)
    {
        $customerTransfer = $cartChangeTransfer->getQuote()->getCustomer();

        return $this->getFacade()->getCustomerCoefficient($customerTransfer);
    }
}