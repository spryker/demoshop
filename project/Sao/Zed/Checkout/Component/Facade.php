<?php

class Sao_Zed_Checkout_Component_Facade extends ProjectA_Zed_Checkout_Component_Facade
{

    /**
     * @var Sao_Zed_Checkout_Component_Factory
     */
    protected $factory;

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order
     * @return bool
     */
    public function isManualCheckout(Sao_Shared_Sales_Transfer_Order $order)
    {
        return $this->factory->getModelSelector()->isManualCheckout($order);
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $transferOrder
     * @return ProjectA_Zed_Library_Component_Model_Result
     */
    public function saveOrder(Sao_Shared_Sales_Transfer_Order $transferOrder)
    {
        return $this->factory->getModelWorkflowDispatcher()->dispatch($transferOrder)->run();
    }

}
