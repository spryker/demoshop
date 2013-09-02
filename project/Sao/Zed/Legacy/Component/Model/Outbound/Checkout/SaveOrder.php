<?php

/**
 * Class Sao_Zed_Legacy_Component_Model_Outbound_Checkout_SaveOrder
 */
class Sao_Zed_Legacy_Component_Model_Outbound_Checkout_SaveOrder
    implements ProjectA_Zed_Library_Dependency_Factory_Interface
{
    /**
     * @var Generated_Zed_Legacy_Component_Factory
     */
    protected $factory;

    /**
     * @param ProjectA_Zed_Library_Component_Interface_FactoryInterface $factory
     */
    public function setFactory(ProjectA_Zed_Library_Component_Interface_FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $transferOrder
     *
     * @return ProjectA_Zed_Library_Component_Model_Result
     */
    public function saveOrder(Sao_Shared_Sales_Transfer_Order $transferOrder)
    {
//        $connection = Propel::getConnection();
//        $connection->beginTransaction();

//        // aggregate-data
//        $userId = $this->factory->getModelShareSessionUser()->getId();

        $order = $this->factory->getModelOutboundSalesOrder()->saveOrder($transferOrder);

//        $connection->commit();

        return new ProjectA_Zed_Library_Component_Model_Result($order);
    }
}
