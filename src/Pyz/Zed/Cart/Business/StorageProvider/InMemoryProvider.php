<?php

namespace Pyz\Zed\Cart\Business\StorageProvider;

use SprykerFeature\Zed\Cart\Business\StorageProvider\InMemoryProvider as SprykerInMemoryProvider;
use Generated\Shared\Cart\ChangeInterface;
use Generated\Shared\Cart\CartInterface;

class InMemoryProvider extends SprykerInMemoryProvider
//@TODO: implement spryker debug interface
{
    /**
     * @param CartInterface $cart
     * @param ChangeInterface $change
     *
     * @return CartInterface
     */
    public function removeCouponCode(CartInterface $cart, ChangeInterface $change)
    {
        $couponCodes = [];
        foreach ($cart->getCouponCodes() as $couponCode) {
            if ($couponCode !== $change->getCouponCode()) {
                $couponCodes[] = $couponCode;
            }
        }

        return $cart->setCouponCodes($couponCodes);
    }

}