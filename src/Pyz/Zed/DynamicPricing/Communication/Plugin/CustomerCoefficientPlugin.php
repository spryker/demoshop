<?php
/**
 * Created by PhpStorm.
 * User: theodorosliokos
 * Date: 25.09.17
 * Time: 13:50
 */

namespace Pyz\Zed\DynamicPricing\Communication\Plugin;

use Generated\Shared\Transfer\CartChangeTransfer;
use Pyz\Zed\DynamicPricing\Business\DynamicPricingFacadeInterface;
use Spryker\Zed\Cart\Dependency\ItemExpanderPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * Class CustomerCoefficientPlugin
 * @package Pyz\Zed\CustomerCoefficient\Communication\Plugin
 *
 * @method DynamicPricingFacadeInterface getFacade()
 */
class CustomerCoefficientPlugin extends AbstractPlugin implements ItemExpanderPluginInterface
{
    /**
     * @param CartChangeTransfer $cartChangeTransfer
     * @return CartChangeTransfer
     */
    public function expandItems(CartChangeTransfer $cartChangeTransfer)
    {
        $pricingFactor = $cartChangeTransfer->getQuote()->getCustomer()->getPricingPercentage();
        foreach($cartChangeTransfer->getItems() as $itemTransfer) {
            $unitGrossPrice = (int) floor($itemTransfer->getUnitGrossPrice() * $pricingFactor);
            $itemTransfer->setUnitGrossPrice($unitGrossPrice);
        }

        return $cartChangeTransfer;
    }
}