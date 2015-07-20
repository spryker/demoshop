<?php

namespace Pyz\Yves\Cart\Communication\Controller;

use Generated\Shared\Transfer\CartItemTransfer;
use Generated\Shared\Transfer\ProductOptionTransfer;

trait CreateCartItemTrait
{

    /**
     * @param string $sku
     * @param int $quantity
     * @param array $optionValueUsageIds
     * @param string $localeCode
     *
     * @return CartItemTransfer
     */
    public function createCartItemTransfer($sku, $quantity, $optionValueUsageIds = [], $localeCode = null)
    {
        $cartItemTransfer = new CartItemTransfer();

        $cartItemTransfer->setId($sku);
        $cartItemTransfer->setSku($sku);
        $cartItemTransfer->setQuantity($quantity);

        foreach ($optionValueUsageIds as $idOptionValueUsage) {
            $productOptionTransfer = (new ProductOptionTransfer)
                ->setIdOptionValueUsage($idOptionValueUsage)
                ->setLocalCode($localeCode);
            $cartItemTransfer->addProductOption($productOptionTransfer);
        }

        return $cartItemTransfer;
    }
}
