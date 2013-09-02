<?php

class Sao_Zed_Salesrule_Component_Model_Actions_Fixed extends ProjectA_Zed_Salesrule_Component_Model_Actions_Fixed
    implements ProjectA_Zed_Library_Dependency_Factory_Interface
{

    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /**
     * @var Generated_Zed_Salesrule_Component_Factory
     */
    protected $factory;

    /**
     * @see ProjectA_Zed_Salesrule_Component_Model_Actions_Abstract::getDiscount
     */
    protected function getDiscount($amount)
    {
        $discount = parent::getDiscount($amount);
        $this->factory->getModelSalesruleCostDistribution()->appendCostDistribution($this->salesrule, $discount);
        return $discount;
    }

    /**
     * @return int
     */
    public function execute()
    {
        $totalDiscount = 0;
        $itemOptionDiscount = 0;

        /* @var Sao_Shared_Sales_Transfer_Order_Item $item */
        foreach ($this->items as $item) {
            $itemDiscount = $this->getCalculatedDiscountAmount($item);

            if ($itemDiscount > 0) {
                $this->setDiscountAmount($item, $itemDiscount);
            } else {
                // if a coupon salesrule did not calculate a discount greater than 0, the coupon code should be removed
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

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Item|Sao_Shared_Sales_Transfer_Expense $element
     * @return float
     */
    protected function calculateDiscountDistribution($element)
    {
        $subtotalWithoutItemExpenses = $this->order->getTotals()->getSubtotalWithoutItemExpenses();
        $percentage = $element->getGrossPrice() / $subtotalWithoutItemExpenses;

        $discountAmount = $this->roundingError + $this->getSalesrule()->getAmount() * $percentage;
        $discountAmountRounded = round($discountAmount, 2);
        $this->roundingError = $discountAmount - $discountAmountRounded;
        $result = $discountAmountRounded * 100;
        return $result;
    }

}
