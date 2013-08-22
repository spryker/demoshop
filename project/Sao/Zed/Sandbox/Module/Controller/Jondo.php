<?php

class Sao_Zed_Sandbox_Module_Controller_Jondo extends ProjectA_Zed_Library_Controller_Action implements
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

    public function quoteAction()
    {
        $entityOrder = $this->facadeSales->getOrderBySalesOrderId(735);
        $order = $this->entityToTransfer($entityOrder);

        $transferItemCollection = Generated_Shared_Library_TransferLoader::getSalesOrderItemCollection();
        foreach ($entityOrder->getItems() as $item) {
            $itemTransfer = Generated_Shared_Library_TransferLoader::getSalesOrderItem();
            $itemTransfer = ProjectA_Zed_Library_Copy::entityToTransfer($itemTransfer, $item);
            $transferItemCollection->add($itemTransfer);
        }

        $time = microtime(true);

        $this->facadeFulfillment->determineFulfillmentCosts($order, $transferItemCollection);
        Zend_Debug::dump(sprintf('quote request took %.3f seconds', microtime(true) - $time));
        Zend_Debug::dump($order->getQuotes());

    }

    public function exportOrderAction()
    {
        $startTime = microtime(true);
        $orderEntity = $this->facadeSales->getOrderBySalesOrderId(9);
        $quotes = $orderEntity->getQuotes();

        foreach ($quotes as $quote) {
            if ($quote->getProvider()->getShortName() != 'jondo') {
                continue;
            }
            $result = $this->facadeFulfillment->appointShipping($quote);
            Zend_Debug::dump($result, '<h1>response for method "push_order" took ' . sprintf('order request took %.3f seconds', microtime(true) - $startTime) . '</h1>');
        }
    }

    public function testAction()
    {
        $entityOrder = $this->facadeSales->getOrderBySalesOrderId(9);
        $items = $entityOrder->getItems();
        $item = $items->getFirst();
        $quote = $this->facadeFulfillment->getQuoteByOrderItem($item);
        Zend_Debug::dump($quote);

        $filteredItems = $this->facadeSales->getFilterPrintableItems($items);

        foreach ($filteredItems as $exportableItem) {
            Zend_Debug::dump($exportableItem);
        }
    }

    protected function entityToTransfer(ProjectA_Zed_Sales_Persistence_PacSalesOrder $entity)
    {
        $transfer = new Sao_Shared_Sales_Transfer_Order();
        ProjectA_Zed_Library_Copy::entityToTransfer($transfer, $entity, Sao_Shared_Application_Transfer_EnrichmentRules::ORDER_ALL);
        $shippingIso2Country = $entity->getShippingAddress()->getCountry()->getIso2Code();
        $transfer->getShippingAddress()->setIso2Country($shippingIso2Country);

        return $transfer;
    }

}
