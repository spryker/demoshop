<?php

/**
 * @author jstick
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_PrintFileApproved extends ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule implements
    Sao_Zed_Sales_Component_Interface_OrderprocessConstant,
    ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Catalog_Component_Dependency_Facade_Trait;

    /**
     * @see ProjectA_Zed_Library_DataStructure_Named_Interface::getName()
     */
    public function getName()
    {
        return self::RULE_PRINT_FILE_APPROVED;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItem
     * @param ProjectA_Zed_Library_StateMachine_Context $context
     * @return bool
     */
    protected function check($orderItem, ProjectA_Zed_Library_StateMachine_Context $context)
    {
        $productEntity = $this->facadeCatalog->getProductBySku($orderItem->getSku());
        $product = $this->facadeCatalog->getProduct($productEntity);

        return !empty($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_VERIFIED_USER_ID]);
    }

}
