<?php

namespace  Pyz\Zed\Sales\Component\Model\Orderprocess;

use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;
use Generated\Zed\Sales\Component\SalesFactory;

/**
 * @property SalesFactory $factory
 */
class Finder extends \ProjectA_Zed_Sales_Component_Model_Orderprocess_Finder implements Orderprocess
{

    /**
     * @param \ProjectA_Zed_Sales_Persistence_PacSalesOrder $order
     * @return \ProjectA_Zed_Sales_Component_Model_Orderprocess_Filter_MetaInfo
     */
    public function getFlaggedDemoItems(\ProjectA_Zed_Sales_Persistence_PacSalesOrder $order)
    {
        $orderItems = $order->getItems()->getIterator();
        $factory = $this->getStatemachineFactory();
        $currentState = $this->factory->createModelOrderprocessStateMachineCurrentState();
        $metaInfoConditionMap = array(self::FLAG_DEMO_TEST_FLAG => true);
        return $this->factory->createModelOrderprocessFilterMetaInfo($orderItems, $factory, $currentState, $metaInfoConditionMap);
    }
}
