<?php

/**
 * Class Sao_Zed_Salesrule_Component_Facade
 *
 * @property Generated_Zed_Salesrule_Component_Factory $factory
 */
class Sao_Zed_Salesrule_Component_Facade extends ProjectA_Zed_Salesrule_Component_Facade
{


    /**
     * @return Sao_Zed_Salesrule_Component_Facade_Gui
     */
    public function getGuiFacade()
    {
        return $this->factory->getFacadeGui();
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order
     * @param ProjectA_Zed_Salesrule_Persistence_PacSalesrule $salesRule
     * @return Sao_Zed_Salesrule_Component_Model_Actions_FixedOriginals
     */
    public function getActionFixedOriginals(Sao_Shared_Sales_Transfer_Order $order, ProjectA_Zed_Salesrule_Persistence_PacSalesrule $salesRule)
    {
        return $this->factory->getModelActionsFixedOriginals($order, $salesRule);
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order
     * @param ProjectA_Zed_Salesrule_Persistence_PacSalesrule $salesRule
     * @return Sao_Zed_Salesrule_Component_Model_Actions_FixedPrints
     */
    public function getActionFixedPrints(Sao_Shared_Sales_Transfer_Order $order, ProjectA_Zed_Salesrule_Persistence_PacSalesrule $salesRule)
    {
        return $this->factory->getModelActionsFixedPrints($order, $salesRule);
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order
     * @param ProjectA_Zed_Salesrule_Persistence_PacSalesrule $salesRule
     * @return Sao_Zed_Salesrule_Component_Model_Actions_PercentOriginals
     */
    public function getActionPercentOriginals(Sao_Shared_Sales_Transfer_Order $order, ProjectA_Zed_Salesrule_Persistence_PacSalesrule $salesRule)
    {
        return $this->factory->getModelActionsPercentOriginals($order, $salesRule);
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order
     * @param ProjectA_Zed_Salesrule_Persistence_PacSalesrule $salesRule
     * @return Sao_Zed_Salesrule_Component_Model_Actions_PercentOriginals
     */
    public function getActionPercentPrints(Sao_Shared_Sales_Transfer_Order $order, ProjectA_Zed_Salesrule_Persistence_PacSalesrule $salesRule)
    {
        return $this->factory->getModelActionsPercentPrints($order, $salesRule);
    }

}
