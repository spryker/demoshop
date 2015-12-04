<?php


namespace Pyz\Zed\Cart\Business\Operator;

use Generated\Shared\Cart\ChangeInterface;
use Generated\Shared\Cart\CartInterface;
use SprykerFeature\Zed\Cart\Business\Operator\CouponCodeAddOperator as SprykerCouponCodeAddOperator;
use Pyz\Zed\Cart\Business\CouponMessageGenerator;

class CouponCodeAddOperator extends SprykerCouponCodeAddOperator
{

    /**
     * @param ChangeInterface $cartChange
     *
     * @return CartInterface
     */
    public function executeOperation(ChangeInterface $cartChange)
    {

        $oldCart = clone $cartChange->getCart();
        $cart = parent::executeOperation($cartChange);

        $couponMessageGenerator = new CouponMessageGenerator();

        $cart->setCouponIsSuccess(
            $couponMessageGenerator->isSuccess($oldCart, $cart)
        );

        $cart->setCouponMessage(
            $couponMessageGenerator->getMessage($oldCart, $cart)
        );

        return $cart;
    }

}
