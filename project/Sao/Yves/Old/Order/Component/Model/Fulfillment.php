<?php
class Sao_Yves_Order_Component_Model_Fulfillment
{
    public static function getShippingEstimateForItem(Sao_Shared_Sales_Transfer_Order_Item $item)
    {
        $edition = $item->getProduct()->getProductCategory();

        switch ($edition) {
            case 'original':
                return '11 - 14';
                break;

            case 'limited edition':
                return '5 - 7';
                break;

            case 'open edition':
                if ($item->getOptions()->count()) {
                    return '5 - 7';
                }
                break;
        }

        return '3 - 5';
    }
}