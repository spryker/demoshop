<?php

namespace Pyz\Zed\Sales\Business;

use SprykerFeature\Zed\Sales\Business\SalesFacade as CoreSalesFacade;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrder;
use Pyz\Zed\Sales\Business\Model\Orderprocess\Finder;

class SalesFacade extends CoreSalesFacade
{

    /**
     * @param SpySalesOrder $order
     * @return \SprykerFeature_Zed_Sales_Business_Model_Orderprocess_Filter_MetaInfo
     */
    public function getFlaggedDemoItems(SpySalesOrder $order, $flag)
    {
        /* @var Finder $finder */
        $finder = $this->factory->createModelOrderprocessFinder();
        return $finder->getItemsByFlag($order, $flag);
    }

    /**
     * @param string $sku
     * @return \Iterator|null
     */
    public function getReservedOrderItemsForSku($sku)
    {
        return null;
    }


}
