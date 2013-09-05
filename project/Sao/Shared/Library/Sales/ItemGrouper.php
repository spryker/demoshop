<?php
use Generated\Shared\Library\TransferLoader;

/**
 * Class Sao_Shared_Library_Sales_ItemGrouper
 */
class Sao_Shared_Library_Sales_ItemGrouper extends ProjectA_Shared_Library_Sales_ItemGrouper
{

    /**
     * @see ProjectA_Shared_Library_Sales_ItemGrouper::groupItemsByUniqueId
     */
    public static function groupItemsByUniqueId(Sao_Shared_Sales_Transfer_Order_Item_Collection $items)
    {
        $index = array();

        /* @var $item Sao_Shared_Sales_Transfer_Order_Item */
        foreach ($items as $item) {
            //increase quantity
            if (isset($index[$item->getUniqueIdentifier()])) {
                $qty = $index[$item->getUniqueIdentifier()]->getQuantity();
                $index[$item->getUniqueIdentifier()]->setQuantity($qty + 1);

                // If the item collection contains a product as merged and also as not-merged, it will be shown as
                // not-merged
                if (!$item->getIsMerged()) {
                    $index[$item->getUniqueIdentifier()]->setIsMerged(false);
                }

                //add item
            } else {
                $index[$item->getUniqueIdentifier()] = $item;
            }
        }

        $newCollection = TransferLoader::getSalesOrderItemCollection();
        foreach ($index as $item) {
            $newCollection->add($item);
        }
        return $newCollection;
    }
}
