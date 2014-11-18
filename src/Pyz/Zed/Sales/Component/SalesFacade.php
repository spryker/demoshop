<?php

namespace Pyz\Zed\Sales\Component;

use ProjectA\Zed\Sales\Component\SalesFacade as CoreSalesFacade;
use Pyz\Zed\Sales\Component\Model\Orderprocess\Finder;

class SalesFacade extends CoreSalesFacade
{

    /**
     * @param \ProjectA_Zed_Sales_Persistence_PacSalesOrder $order
     * @return \ProjectA_Zed_Sales_Component_Model_Orderprocess_Filter_MetaInfo
     */
    public function getFlaggedDemoItems(\ProjectA_Zed_Sales_Persistence_PacSalesOrder $order, $flag)
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
