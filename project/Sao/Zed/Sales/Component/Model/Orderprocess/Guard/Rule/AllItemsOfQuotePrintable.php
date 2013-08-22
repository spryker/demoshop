<?php

/**
 * @author Daniel Seif <daniel.seif@project-a.com>, otischlinger
 * @property Sao_Zed_Sales_Component_Facade $facadeSales
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_AllItemsOfQuotePrintable extends ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule
    implements Sao_Zed_Sales_Component_Interface_OrderprocessConstant, ProjectA_Zed_Sales_Component_Dependency_Facade_Interface,
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
        return self::RULE_ALL_ITEMS_OF_QUOTE_PRINTABLE;
    }

    /**
     * @param object $orderItem
     * @param ProjectA_Zed_Library_StateMachine_Context $context
     * @return bool
     */
    protected function check($orderItem, ProjectA_Zed_Library_StateMachine_Context $context)
    {
        $quote      = $this->facadeFulfillment->getQuoteByOrderItem($orderItem);
        $quoteItems = $quote->getItems();
        $filter     = $this->facadeSales->getFilterPrintableItems($quoteItems);
        return (count($quoteItems) == iterator_count($filter));
    }
}
