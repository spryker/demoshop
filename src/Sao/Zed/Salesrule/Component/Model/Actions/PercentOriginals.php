<?php

/**
 * @property Sao_Zed_Cart_Component_Facade $facadeCart
 */
class Sao_Zed_Salesrule_Component_Model_Actions_PercentOriginals extends Sao_Zed_Salesrule_Component_Model_Actions_Percent
    implements ProjectA_Zed_Library_Dependency_Factory_Interface, ProjectA_Zed_Cart_Component_Dependency_Facade_Interface
{
    use ProjectA_Zed_Cart_Component_Dependency_Facade_Trait;



    /**
     * @return int
     */
    public function execute()
    {
        $totalDiscount = 0;
        $itemOptionDiscount = 0;

        foreach ($this->items as $item) {
            if (! $this->facadeCart->isOriginalProduct($item->getSku())) {
                continue;
            }
            /* @var Sao_Shared_Sales_Transfer_Order_Item $item */
            $itemDiscount = $this->getCalculatedDiscountAmount($item);

            if ($itemDiscount > 0) {
                $this->setDiscountAmount($item, $itemDiscount);
            } else {
                // if a coupon sales rule did not calculate a discount greater than 0, the coupon code should be removed
                if ($this->discountType == self::TYPE_COUPON_DISCOUNT) {
                    $this->order->setCouponCode(null);
                }
            }

            // ITEM OPTIONS
            foreach ($item->getOptions() as $option) {
                $itemOptionDiscount = $this->getCalculatedDiscountAmount($option);

                if ($itemOptionDiscount > 0) {
                    $this->setDiscountAmount($option, $itemOptionDiscount);
                }
            }

            $totalDiscount += $itemDiscount + $itemOptionDiscount;
        }

        return $totalDiscount;
    }

}
