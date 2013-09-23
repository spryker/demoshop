<?php

class Pyz_Zed_Calculation_Component_Model_Calculators_TotalDiscountOnItem extends ProjectA_Zed_Calculation_Component_Model_Calculators_Abstract implements ProjectA_Zed_Calculation_Component_Interface_Calculator
{
    /**
     * @param ProjectA\Shared\Sales\Transfer\Order $order
     */
    public function recalculate(ProjectA\Shared\Sales\Transfer\Order $order)
    {
        /* @var $item Pyz_Shared_Sales_Transfer_Order_Item */
        foreach ($order->getItems() as $item) {
            $sum = 0;

            $sum += $this->getDiscountSum($item->getDiscounts());
            foreach ($item->getOptions() AS $option) {
                $sum += $this->getDiscountSum($option->getDiscounts());
            }

            $item->setTotalDiscountOnItem($sum);
        }
    }

    /**
     * @param Pyz_Shared_Sales_Transfer_Discount_Collection $collection
     * @return int
     */
    public function getDiscountSum($collection)
    {
        $sum = 0;
        foreach ($collection AS $discount) {
            $sum += $discount->getAmount();
        }
        return $sum;
    }

}
