<?php


class Sao_Zed_Sales_Component_Model_Orderprocess_Command_Payment_SetCCisValid
    extends ProjectA_Zed_Sales_Component_Model_Orderprocess_CommandAbstract
    implements ProjectA_Zed_Sales_Component_Interface_OrderCommand
{

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     * @param ProjectA_Zed_Sales_Component_Interface_ContextCollection $context
     */
    public function __invoke(ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity, ProjectA_Zed_Sales_Component_Interface_ContextCollection $context)
    {
        $this->facadeSales->saveCCValidationResult($orderEntity, null, true);
        $this->addNote('marked credit card as valid', $orderEntity);
    }

}