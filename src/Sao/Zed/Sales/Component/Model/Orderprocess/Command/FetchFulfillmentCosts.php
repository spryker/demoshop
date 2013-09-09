<?php

class Sao_Zed_Sales_Component_Model_Orderprocess_Command_FetchFulfillmentCosts
    extends ProjectA_Zed_Sales_Component_Model_Orderprocess_CommandAbstract
        implements ProjectA_Zed_Sales_Component_Interface_OrderCommand,
                   Sao_Zed_Fulfillment_Component_Dependency_Facade_Interface,
                   ProjectA_Zed_Misc_Component_Dependency_Facade_Interface
{

    use Sao_Zed_Fulfillment_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Misc_Component_Dependency_Facade_Trait;

    const CONTEXT_KEY_FETCH_FULLFILLMENT_COSTS_MESSAGE = 'fetch_fulfillment_costs_message';

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     * @param ProjectA_Zed_Sales_Component_Interface_ContextCollection $context
     */
    public function __invoke (ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity, ProjectA_Zed_Sales_Component_Interface_ContextCollection $context)
    {
        /* @var Sao_Shared_Sales_Transfer_Order $transferOrder */
        $transferOrder = Generated\Shared\Library\TransferLoader::getSalesOrder();
        $transferOrder = ProjectA_Zed_Library_Copy::entityToTransfer($transferOrder, $orderEntity);
        $items = $context->getOrderItems();
        $transferItemCollection = Generated\Shared\Library\TransferLoader::getSalesOrderItemCollection();
        foreach ($items as $item) {
            $itemTransfer = Generated\Shared\Library\TransferLoader::getSalesOrderItem();
            $itemTransfer = ProjectA_Zed_Library_Copy::entityToTransfer($itemTransfer, $item);
            $transferItemCollection->add($itemTransfer);
        }
        $transferOrder->setItems($transferItemCollection);

        $shippingAddressEntity = $orderEntity->getShippingAddress();
        $countryIso2Code = $shippingAddressEntity->getCountry()->getIso2Code();
        /* @var Sao_Shared_Sales_Transfer_Order_Address $transferShippingAddress */
        $transferShippingAddress = Generated\Shared\Library\TransferLoader::getSalesOrderAddress();
        $transferShippingAddress = ProjectA_Zed_Library_Copy::entityToTransfer($transferShippingAddress, $shippingAddressEntity);
        $transferShippingAddress->setIso2Country($countryIso2Code);
        //add state if available
        if ($shippingAddressEntity->getSaoAddress()) {
            $transferShippingAddress->setRegion($shippingAddressEntity->getSaoAddress()->getRegion()->getShortName());
        }

        $transferOrder->setShippingAddress($transferShippingAddress);
        $transferOrder = $this->facadeFulfillment->determineFulfillmentCosts($transferOrder, $transferItemCollection);
        $result = $this->handleQuoteResult($transferOrder);

        if (true === $result['success']) {
            $messageString = 'Fetched fulfillment costs successfully';
            $this->facadeFulfillment->markQuotesForItemsAsDeleted($items);
            $this->facadeFulfillment->saveQuotesInTransferOrderToDatabase($transferOrder, $orderEntity);
            $this->addNote($messageString, $orderEntity, true);
            $context[self::CONTEXT_KEY_FETCH_FULLFILLMENT_COSTS_MESSAGE] = $messageString;
        } else {
            $messageString = 'Fetching fulfillment costs failed:<br />' . $this->createErrorMessage($result);
            $this->addNote($messageString, $orderEntity, false);
            $context[self::CONTEXT_KEY_FETCH_FULLFILLMENT_COSTS_MESSAGE] = $messageString;
        }
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $transferOrder
     * @return array
     */
    protected function handleQuoteResult(Sao_Shared_Sales_Transfer_Order $transferOrder)
    {
        $result = array('success' => true, 'error_messages' => array());
        $quoteCollection = $transferOrder->getQuotes();
        /* @var $quote Sao_Shared_Fulfillment_Transfer_Quote */
        foreach ($quoteCollection as $quote) {
            if (!$quote->isSuccess()) {
                $result['success'] = false;
                $result['error_messages'][] = $quote->getErrorMessage();
            }
        }
        return $result;
    }

    /**
     * @param array $result
     * @return string
     */
    protected function createErrorMessage(array $result)
    {
        $resultString = '';
        $errorMessages = $result['error_messages'];
        foreach($errorMessages as $message) {
            $resultString .= $message . '<br />';
        }
        return $resultString;
    }
}
