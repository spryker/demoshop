<?php

class Sao_Zed_Fulfillment_Component_Model_Quote implements ProjectA_Zed_Library_Dependency_Factory_Interface
{

    use ProjectA_Zed_Library_Dependency_Factory_Trait;



    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $item
     * @return Sao_Zed_Fulfillment_Persistence_FulfillmentQuote
     */
    public function getQuoteByOrderItem(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $item)
    {
        $quote = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery::create()
            ->useQuoteItemQuery()
            ->filterByItem($item)
            ->endUse()
            ->findOne();

        return $quote;
    }

    /**
     * @param PropelObjectCollection $items
     * @return PropelObjectCollection
     */
    public function getQuotesByOrderItems(PropelObjectCollection $items)
    {
        $quotes = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery::create()
            ->useQuoteItemQuery()
            ->filterByItem($items)
            ->endUse()
            ->distinct()
            ->find();

        return $quotes;
    }

    /**
     * The quoteId is not globally unique but only per order.
     *
     * @param $incrementId
     * @param $quoteId
     * @return mixed
     */
    public function getOrdersQuoteById($incrementId, $quoteId)
    {
        $quote = (new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery())
            ->useOrderQuery()
            ->filterByIncrementId($incrementId)
            ->endUse()
            ->findOneBy('quoteId', $quoteId);
        return $quote;
    }

    /**
     * @param Sao_Shared_Fulfillment_Transfer_Quote $transferQuote
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $entitySalesOrder
     *
     * @return Sao_Zed_Fulfillment_Persistence_FulfillmentQuote
     */
    public function saveQuoteToDatabase(Sao_Shared_Fulfillment_Transfer_Quote $transferQuote, ProjectA_Zed_Sales_Persistence_PacSalesOrder $entitySalesOrder)
    {
        $entityAgent = $this->factory->getModelTracking()->getShippingAgentByInternalName($transferQuote->getShippingAgent());
        $entityProvider = $this->factory->getModelProvider()->getProviderEntityByShortName($transferQuote->getProvider());

        $entity = Generated_Zed_EntityLoader::getSaoFulfillmentQuote();
        $entity->fromArray($transferQuote->toArray());
        $entity->setOrder($entitySalesOrder);
        $entity->setProvider($entityProvider);
        $entity->setShippingAgent($entityAgent);

        $entitySalesOrder->addQuote($entity);

        return $entity;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $transferOrder
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $entitySalesOrder
     */
    public function saveQuotesInTransferOrderToDatabase(Sao_Shared_Sales_Transfer_Order $transferOrder, ProjectA_Zed_Sales_Persistence_PacSalesOrder $entitySalesOrder)
    {
        $collectionQuote = $transferOrder->getQuotes();

        /** @var $transferQuote Sao_Shared_Fulfillment_Transfer_Quote */
        foreach ($collectionQuote as $transferQuote) {
            if ($transferQuote->isSuccess()) {
                $entityQuote = $this->saveQuoteToDatabase($transferQuote, $entitySalesOrder);
                $this->allocateItems($transferOrder, $entityQuote, $transferQuote->getUniqueQuoteKey());
            }
        }
        $entitySalesOrder->save();
    }

    /**
     * @param array $orderItems
     */
    public function markQuotesForItemsAsDeleted(array $orderItems)
    {
        /* @var $orderItem ProjectA_Zed_Sales_Persistence_PacSalesOrderItem */
        foreach ($orderItems as $orderItem) {
            /* @var $quote Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote */
            foreach ($orderItem->getQuotes() as $quote) {
                $quote->setIsDeleted(true);
                $quote->save();
            }
        }
    }

    /**
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote
     * @return bool
     */
    public function checkIfPackagingSlipIsNeeded(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote)
    {
        return ! (bool)$quote->getPackingSlipUrlFront();
    }

    /**
     * @param $url
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote
     */
    public function storePackingSlipUrlFrontForQuote($url, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote)
    {
        $quote->setPackingSlipUrlFront($url);
        $quote->save();
    }

    /**
     * @param $url
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote
     */
    public function storePackingSlipUrlBackForQuote($url, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote)
    {
        $quote->setPackingSlipUrlBack($url);
        $quote->save();
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $transferOrder
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $entityQuote
     * @param string $quoteKey
     */
    protected function allocateItems(Sao_Shared_Sales_Transfer_Order $transferOrder, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $entityQuote, $quoteKey)
    {
        /** @var $transferItem Sao_Shared_Sales_Transfer_Order_Item */
        foreach ($transferOrder->getItems() as $transferItem) {
            if ($transferItem->getUniqueQuoteKey() === $quoteKey) {
                $this->allocateItem($transferItem, $entityQuote);
            }
        }
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Item $transferItem
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $entityQuote
     */
    protected function allocateItem(Sao_Shared_Sales_Transfer_Order_Item $transferItem, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $entityQuote)
    {
        $entityQuoteItem = Generated_Zed_EntityLoader::getSaoFulfillmentQuoteItem();
        $entityQuoteItem->setFkSalesOrderItem($transferItem->getIdSalesOrderItem());
        $entityQuote->addQuoteItem($entityQuoteItem);
    }

}
