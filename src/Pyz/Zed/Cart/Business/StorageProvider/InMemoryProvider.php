<?php

namespace Pyz\Zed\Cart\Business\StorageProvider;

use SprykerFeature\Zed\Cart\Business\StorageProvider\InMemoryProvider as SprykerInMemoryProvider;
use Generated\Shared\Cart\ChangeInterface;
use Generated\Shared\Cart\CartInterface;
use Pyz\SprykerBugfixInterface;
use Pyz\Zed\Cart\Business\CouponMessageGenerator;

class InMemoryProvider extends SprykerInMemoryProvider implements SprykerBugfixInterface
{
    /**
     * @param CartInterface $cart
     * @param ChangeInterface $change
     *
     * @return CartInterface
     */
    public function addCouponCode(CartInterface $cart, ChangeInterface $change)
    {
        $oldCart = clone $cart;

        $cart->addCouponCode($change->getCouponCode());

        $couponMessageGenerator = new CouponMessageGenerator();

        $cart->setCouponMessage(
            $couponMessageGenerator->getMessage($oldCart, $cart)
        );

        return $cart;

        // @Todo: replace with this once coupon error messages are fixed by Spryker
        //return $cart->addCouponCode($change->getCouponCode());
    }
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
    /**
     * @param CartInterface $cart
     *
     * @return CartInterface
     */
    public function clearCouponCodes(CartInterface $cart)
    {
        return $cart->setCouponCodes([]);
    }

    /**
     * @param CartInterface $cart
     * @param ChangeInterface $change
     *
     * @return CartInterface
     */
    public function addExpense(CartInterface $cart, ChangeInterface $change)
    {
        $expenses = new \ArrayObject();
        foreach ($change->getExpenses() as $expenseToAdd) {
            foreach ($cart->getExpenses() as $cartExpense) {
                if ($cartExpense->getName() != $expenseToAdd->getName()) {
                    $expenses[] = $cartExpense;
                }
            }
            $expenses[] = $expenseToAdd;
            $cart->setExpenses($expenses);
        }

        return $cart;
    }

}
