<?php

class Sao_Zed_Checkout_Component_Model_Workflow_Task_SaveOrder extends ProjectA_Zed_Checkout_Component_Model_Workflow_Task_Abstract implements
    ProjectA_Zed_Sales_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Sales_Component_Dependency_Facade_Trait;

    /**
     * @param ProjectA_Shared_Sales_Transfer_Order $transferOrder
     * @param ProjectA_Zed_Checkout_Component_Model_Workflow_Context $context
     */
    public function __invoke(ProjectA_Shared_Sales_Transfer_Order $transferOrder, ProjectA_Zed_Checkout_Component_Model_Workflow_Context $context)
    {
        $result = $this->facadeSales->saveOrder($transferOrder);
        if (!$result->isSuccess()) {
            $this->addError(ProjectA_Shared_Library_Messages::CHECKOUT_ERROR_ORDER_NOT_SAVED);

            // removed this so the propel validation errors do not get pushed to the frontend
            // $this->addErrors($result->getErrors());
            $this->logErrorsToLumberjack($transferOrder, $result);
        } else {
            /* @var ProjectA_Zed_Sales_Persistence_PacSalesOrder $entity */
            $entity = $result->getEntity();
            $context->setOrderEntity($entity);
            $transferOrder->setIdSalesOrder($entity->getIdSalesOrder());
            $transferOrder->setIncrementId($entity->getIncrementId());
        }
    }

    protected function logErrorsToLumberjack(Sao_Shared_Sales_Transfer_Order $orderTransfer, ProjectA_Zed_Library_Component_Model_Result $result)
    {
        $lj = ProjectA_Shared_Lumberjack_Code_Lumberjack::getInstance();
        $lj->addField('entity', $result->getEntity());
        $lj->addField('transfer', $orderTransfer);
        $lj->send('order-save-error', 'error while saving order entity', 'error');
    }

}
