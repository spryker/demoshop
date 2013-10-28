<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Guard\Rule;

use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;
use Pyz\Zed\Sales\Component\SalesFacade;

class AreAllItemsInTheFlaggedTestState extends \ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule implements
    \Generated\Zed\Sales\Component\Dependency\SalesFacadeInterface
{

    use \Generated\Zed\Sales\Component\Dependency\SalesFacadeTrait;

    /**
     *
     * @see \ProjectA_Zed_Library_DataStructure_Named_Interface::getName()
     */
    public function getName()
    {
        return Orderprocess::RULE_DEMO_ALL_ITEMS_ARE_IN_THE_FLAGGED_TEST_STATE;
    }

    /**
     * @param \ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItem
     * @param \ProjectA_Zed_Library_StateMachine_Context $context
     * @return bool
     * @see \ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule::check()
     */
    protected function check($orderItem, \ProjectA_Zed_Library_StateMachine_Context $context)
    {
        /* @var SalesFacade $facade */
        $facade = $this->facadeSales;
        $items = $facade->getFlaggedDemoItems($orderItem->getOrder());
        $amountIfFlaggedItems = iterator_count($items);

        if ($amountIfFlaggedItems == $orderItem->getOrder()->getItems()->count()) {
            return true;
        }

        return false;
    }
}
