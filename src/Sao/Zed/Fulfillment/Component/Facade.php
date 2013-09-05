<?php

class Sao_Zed_Fulfillment_Component_Facade extends ProjectA_Zed_Library_Component_Model_FacadeAbstract
{



    /**
     * @param $trackingNumber
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quoteEntity
     * @throws ErrorException
     * @return bool
     */
    public function saveTrackingNumberForQuote($trackingNumber, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quoteEntity)
    {
        return $this->factory->getModelTracking()->saveTrackingNumberForQuote($trackingNumber, $quoteEntity);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function handleTrackingResponeJondo(array $data)
    {
        return $this->factory->getModelTracking()->handleTrackingResponeJondo($data);
    }

    /**
     * @param null $xml
     * @return bool
     */
    public function handleTrackingResponeSba($xml = null)
    {
        return $this->factory->getModelTracking()->handleTrackingResponeSba($xml);
    }

    /**
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking $trackingEntity
     * @return string
     */
    public function getUrlForTrackingEntry(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking $trackingEntity)
    {
        return $this->factory->getModelTracking()->getTrackingUrlFromEntry($trackingEntity);
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $orderTransfer
     * @param Sao_Shared_Sales_Transfer_Order_Item_Collection $itemTransferCollection
     * @return Sao_Shared_Sales_Transfer_Order
     */
    public function determineFulfillmentCosts(Sao_Shared_Sales_Transfer_Order $orderTransfer, Sao_Shared_Sales_Transfer_Order_Item_Collection $itemTransferCollection)
    {
        return $this->factory->getModelSpooler()->requestQuotes($orderTransfer, $itemTransferCollection);
    }

    /**
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote
     * @return boolean
     */
    public function appointShipping(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote)
    {
        return $this->factory->getModelSpooler()->appointShipping($quote);
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $item
     * @return Sao_Zed_Fulfillment_Persistence_FulfillmentQuote
     */
    public function getQuoteByOrderItem(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $item)
    {
        return $this->factory->getModelQuote()->getQuoteByOrderItem($item);
    }

    /**
     * @param PropelObjectCollection $items
     * @return Sao_Zed_Fulfillment_Persistence_FulfillmentQuote
     */
    public function getQuotesByOrderItems(PropelObjectCollection $items)
    {
        return $this->factory->getModelQuote()->getQuotesByOrderItems($items);
    }

    /**
     * @param $url
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote
     */
    public function storePackingSlipUrlFrontForQuote($url, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote)
    {
        $this->factory->getModelQuote()->storePackingSlipUrlFrontForQuote($url, $quote);
    }

    /**
     * @param $url
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote
     */
    public function storePackingSlipUrlBackForQuote($url, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote)
    {
        $this->factory->getModelQuote()->storePackingSlipUrlBackForQuote($url, $quote);
    }

    /**
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote
     * @return bool
     */
    public function checkIfPackagingSlipIsNeeded(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote)
    {
        return $this->factory->getModelQuote()->checkIfPackagingSlipIsNeeded($quote);
    }

    /**
     * this method expects to find idSalesOrderItem in the transferItems as its usually prepared by the task after order save
     *
     * @param Sao_Shared_Sales_Transfer_Order $transferOrder
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $entityOrder
     */
    public function saveQuotesInTransferOrderToDatabase(Sao_Shared_Sales_Transfer_Order $transferOrder, ProjectA_Zed_Sales_Persistence_PacSalesOrder $entityOrder)
    {
        $this->factory->getModelQuote()->saveQuotesInTransferOrderToDatabase($transferOrder, $entityOrder);
    }

    /**
     * To prevent that a provider get multiple quotes for one item in appointShipping, delete "old" quotes for items
     * where a second requestQuote happened. This happens after "artwork availability check"
     *
     * @param array $orderItems
     */
    public function markQuotesForItemsAsDeleted(array $orderItems)
    {
        $this->factory->getModelQuote()->markQuotesForItemsAsDeleted($orderItems);
    }

    /**
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote
     * @param $validStatusHistoryCodes
     * @return bool
     */
    public function hasReceivedInfoByStatusHistoryCodes(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote, $validStatusHistoryCodes)
    {
        return $this->factory->getModelTracking()
                             ->hasReceivedInfoByStatusHistoryCodes($quote, $validStatusHistoryCodes);
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Item $item
     * @return Sao_Zed_Fulfillment_Persistence_FulfillmentPrintProduct
     */
    public function getFulfillmentCenterProductByItem(Sao_Shared_Sales_Transfer_Order_Item $item)
    {
        return $this->factory->getModelFinder()->getFulfillmentCenterProductByItem($item);
    }
}
