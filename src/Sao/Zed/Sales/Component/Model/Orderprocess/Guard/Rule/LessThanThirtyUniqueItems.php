<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_LessThanThirtyUniqueItems extends ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule implements
    Sao_Zed_Sales_Component_Interface_OrderprocessConstant,
    ProjectA_Zed_Sales_Component_Dependency_Facade_Interface,
    Sao_Zed_Fulfillment_Component_Dependency_Facade_Interface
{
    use ProjectA_Zed_Sales_Component_Dependency_Facade_Trait;
    use Sao_Zed_Fulfillment_Component_Dependency_Facade_Trait;

    /**
     * @see ProjectA_Zed_Library_DataStructure_Named_Interface::getName()
     * @return string
     */
    public function getName()
    {
        return self::RULE_LESS_THAN_THIRTY_UNIQUE_ITEMS_IN_QUOTE;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItem
     * @param ProjectA_Zed_Library_StateMachine_Context $context
     * @return bool
     */
    protected function check($orderItem, ProjectA_Zed_Library_StateMachine_Context $context)
    {
        $quote      = $this->facadeFulfillment->getQuoteByOrderItem($orderItem);
        $quoteItems = $quote->getItems();
        $items = [];
        foreach ($quoteItems as $item) {
            $items[$this->facadeSales->getFacadeItem()->generateUniqueIdentifierForItem($item)] = $item;
        }
        return (count($items) <= 29);
    }
}
