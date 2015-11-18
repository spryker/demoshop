<?php

namespace Pyz\Zed\Cart\Business;

use Pyz\SprykerBugfixInterface;
use Generated\Shared\Cart\CartInterface;
use Generated\Shared\Transfer\DiscountTransfer;

/**
 * Class that generates success or error messages by comparing two cart transfers
 * Is a bugfix that will be removed in future when the feature will be implemented by Spryker
 *
 * Class CartMessageGenerator
 */
class CouponMessageGenerator implements SprykerBugfixInterface
{
    const COUPON_ERROR_MSG = 'cart.error_msg';
    const COUPON_SUCCESS_MSG = 'cart.success_msg';

    /**
     * @param CartInterface $oldCart
     * @param CartInterface $newCart
     * @return string
     */
    public function getMessage(CartInterface $oldCart, CartInterface $newCart)
    {
        $message = self::COUPON_ERROR_MSG;

        /** @var DiscountTransfer $discounts */
        if(count($newCart->getDiscounts()) > count($oldCart->getDiscounts()))
        {
            //a discount was added so the coupon should be valid
            $message = self::COUPON_SUCCESS_MSG;
        }

        return $message;
    }
}