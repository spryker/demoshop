<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DynamicPricing\Communication\Plugin;

use Generated\Shared\Transfer\CartChangeTransfer;
use Spryker\Zed\Cart\Dependency\ItemExpanderPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * Class CustomerCoefficientPlugin
 * @package Pyz\Zed\CustomerCoefficient\Communication\Plugin
 *
 * @method \Pyz\Zed\DynamicPricing\Business\DynamicPricingFacadeInterface getFacade()
 */
class CustomerDynamicPricingPlugin extends AbstractPlugin implements ItemExpanderPluginInterface
{

    /**
     * @param \Generated\Shared\Transfer\CartChangeTransfer $cartChangeTransfer
     *
     * @return \Generated\Shared\Transfer\CartChangeTransfer
     */
    public function expandItems(CartChangeTransfer $cartChangeTransfer)
    {
        if($cartChangeTransfer->getQuote()->getCustomer()) {
            $pricingFactor = $cartChangeTransfer->getQuote()->getCustomer()->getPricingPercentage();
            foreach ($cartChangeTransfer->getItems() as $itemTransfer) {
                $unitGrossPrice = (int) floor($itemTransfer->getUnitGrossPrice() * $pricingFactor);
                $itemTransfer->setUnitGrossPrice($unitGrossPrice);
            }
        }

        return $cartChangeTransfer;
    }

}
