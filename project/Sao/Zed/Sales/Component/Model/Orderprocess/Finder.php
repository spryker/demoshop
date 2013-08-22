<?php

/**
 * @author otischlinger
 *
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Finder extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Finder
    implements ProjectA_Zed_Library_Dependency_Factory_Interface, ProjectA_Zed_Sales_Component_Interface_StateInfoConstant,
               Sao_Zed_Sales_Component_Interface_OrderprocessConstant
{

    /**
     *
     * @param Iterator $orderItems
     * @return Iterator
     */
    public function getFilterPrintableOrderItems(Iterator $orderItems)
    {
        $factory              = $this->getStatemachineFactory();
        $currentState         = $this->factory->getModelOrderprocessStateMachineCurrentState();
        $metaInfoConditionMap = array(
            self::FLAG_PRINTABLE => true
        );
        return $this->factory->getModelOrderprocessFilterMetaInfo($orderItems, $factory, $currentState, $metaInfoConditionMap);
    }

    /**
     *
     * @param Iterator $orderItems
     * @return Iterator
     */
    public function getNonHiddenOrderItems(Iterator $orderItems)
    {
        $factory              = $this->getStatemachineFactory();
        $currentState         = $this->factory->getModelOrderprocessStateMachineCurrentState();
        $metaInfoConditionMap = array(self::FLAG_HIDDEN_FROM_USER => true);
        return $this->factory->getModelOrderprocessFilterMetaInfoNot($orderItems, $factory, $currentState, $metaInfoConditionMap);
    }
}
