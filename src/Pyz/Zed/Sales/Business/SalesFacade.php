<?php

namespace Pyz\Zed\Sales\Business;

use ProjectA\Zed\Sales\Business\SalesFacade as CoreSalesFacade;
use Pyz\Zed\Sales\Business\Model\Orderprocess\Finder;

class SalesFacade extends CoreSalesFacade
{

    /**
     * @param \ProjectA\Zed\Sales\Persistence\Propel\PacSalesOrder $order
     * @return \ProjectA_Zed_Sales_Business_Model_Orderprocess_Filter_MetaInfo
     */
    public function getFlaggedDemoItems(\ProjectA\Zed\Sales\Persistence\Propel\PacSalesOrder $order, $flag)
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
