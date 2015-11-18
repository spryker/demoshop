<?php

namespace Pyz\Zed\Cart\Business\StorageProvider;

use SprykerFeature\Zed\Cart\Business\StorageProvider\InMemoryProvider as SprykerInMemoryProvider;
use Generated\Shared\Cart\ChangeInterface;
use Generated\Shared\Cart\CartInterface;
use Pyz\SprykerBugfixInterface;

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
        return $cart->addCouponCode($change->getCouponCode());
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
