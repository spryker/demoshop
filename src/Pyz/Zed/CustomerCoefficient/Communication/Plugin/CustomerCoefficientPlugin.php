<?php
/**
 * Created by PhpStorm.
 * User: theodorosliokos
 * Date: 25.09.17
 * Time: 13:50
 */

namespace Pyz\Zed\CustomerCoefficient\Communication\Plugin;

use Generated\Shared\Transfer\CartChangeTransfer;
use Spryker\Zed\Cart\Dependency\ItemExpanderPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

class CustomerCoefficientPlugin extends AbstractPlugin implements ItemExpanderPluginInterface
{
    const COEFFICIENT = 0.8075;

    /**
     * @param CartChangeTransfer $cartChangeTransfer
     * @return CartChangeTransfer
     */
    public function expandItems(CartChangeTransfer $cartChangeTransfer)
    {
        foreach($cartChangeTransfer->getItems() as $itemTransfer) {
            $itemTransfer->setUnitGrossPrice($itemTransfer->getUnitGrossPrice() * self::COEFFICIENT);
        }

        return $cartChangeTransfer;
    }
}