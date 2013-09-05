<?php

class Sao_Shared_Sales_Transfer_Order_Item_Collection extends ProjectA_Shared_Sales_Transfer_Order_Item_Collection
{
    public function aggregateQuantities()
    {
        $sum = 0;
        /** @var $item Sao_Shared_Sales_Transfer_Order_Item */
        foreach ($this AS $item) {
            $sum += $item->getQuantity();
        }

        return $sum;
    }
}
