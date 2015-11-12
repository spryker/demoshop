<?php

namespace Pyz\Zed\Cart\Business\Operator;

use Generated\Shared\Cart\CartInterface;
use Generated\Shared\Cart\ChangeInterface;
use SprykerFeature\Shared\Cart\Messages\Messages;
use SprykerFeature\Zed\Cart\Business\Operator\AbstractOperator;

class ExpenseAddOperator extends AbstractOperator
{
    /**
     * @param CartInterface $cart
     * @param ChangeInterface $change
     *
     * @return CartInterface
     */
    protected function changeCart(CartInterface $cart, ChangeInterface $change)
    {
        $this->storageProvider->addExpense($cart, $change);

        return $this->getGroupedCartItems($cart);
    }

    /**
     * @return string
     */
    protected function createSuccessMessage()
    {
        return Messages::COUPON_CODE_ADD_SUCCESS;
    }
}
