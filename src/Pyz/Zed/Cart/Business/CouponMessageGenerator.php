<?php

namespace Pyz\Zed\Cart\Business;

use Pyz\SprykerBugfixInterface;
use Generated\Shared\Cart\CartInterface;

/**
 * Class that generates success or error messages by comparing two cart transfers
 * Is a bugfix that will be removed in future when the feature will be implemented by Spryker
 *
 * Class CartMessageGenerator
 */
class CouponMessageGenerator implements SprykerBugfixInterface
{
    const COUPON_ERROR_MSG = 'coupon.error_msg';
    const COUPON_SUCCESS_MSG = 'coupon.success_msg';

    /**
     * @param CartInterface $oldCart
     * @param CartInterface $newCart
     * @return bool
     */
    public function isSuccess(CartInterface $oldCart, CartInterface $newCart)
    {
        if($newCart->getTotals()->getGrandTotalWithDiscounts()
            < $oldCart->getTotals()->getGrandTotalWithDiscounts())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * @param CartInterface $oldCart
     * @param CartInterface $newCart
     * @return string
     */
    public function getMessage(CartInterface $oldCart, CartInterface $newCart)
    {
        $message = self::COUPON_ERROR_MSG;

        if($this->isSuccess($oldCart, $newCart) === false)
        {
            //a discount was added so the coupon should be valid
            $message = self::COUPON_SUCCESS_MSG;
        }

        return $message;
    }
}
