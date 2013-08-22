<?php

class Sao_Zed_Sandbox_Module_Controller_Marcofinearts extends ProjectA_Zed_Library_Controller_Action implements
    ProjectA_Zed_Sales_Component_Dependency_Facade_Interface,
    Sao_Zed_Fulfillment_Component_Dependency_Facade_Interface
{
    use ProjectA_Zed_Sales_Component_Dependency_Facade_Trait;
    use Sao_Zed_Fulfillment_Component_Dependency_Facade_Trait;

    public function preDispatch()
    {
        if (ProjectA_Shared_Library_Environment::isNotDevelopment()) {
            throw new ProjectA_Zed_Library_Exception('Sandbox is for development only!');
        }
    }

    public function init()
    {
        $this->disableLayout();
    }

    public function shippingRateAction()
    {
        $startTime = microtime(true);
        $orderEntity = $this->facadeSales->getOrderBySalesOrderId(9);
        $orderTransfer = $this->entityToTransfer($orderEntity);
        $result = $this->facadeFulfillment->determineFulfillmentCosts($orderTransfer);
        Zend_Debug::dump($result, '<h1>Response for method "shipping_rate" took ' . sprintf('quote request took %.3f seconds', microtime(true) - $startTime) . '</h1>');
    }

    public function pushOrderAction()
    {
        $startTime = microtime(true);
        $orderEntity = $this->facadeSales->getOrderBySalesOrderId(9);
        $quotes = $orderEntity->getQuotes();

        foreach ($quotes as $quote) {
            if ($quote->getProvider()->getShortName() != 'marcofinearts') {
                continue;
            }
            $result = $this->facadeFulfillment->appointShipping($quote);
            Zend_Debug::dump($result, '<h1>response for method "push_order" took ' . sprintf('order request took %.3f seconds', microtime(true) - $startTime) . '</h1>');
        }
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $entity
     * @return Sao_Shared_Sales_Transfer_Order
     */
    protected function entityToTransfer(ProjectA_Zed_Sales_Persistence_PacSalesOrder $entity)
    {
        $transfer = new Sao_Shared_Sales_Transfer_Order();
        ProjectA_Zed_Library_Copy::entityToTransfer($transfer, $entity, Sao_Shared_Application_Transfer_EnrichmentRules::ORDER_ALL);
        $shippingIso2Country = $entity->getShippingAddress()->getCountry()->getIso2Code();
        $transfer->getShippingAddress()->setIso2Country($shippingIso2Country);

        return $transfer;
    }

}
