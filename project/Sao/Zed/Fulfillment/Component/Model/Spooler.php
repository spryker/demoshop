<?php

use ProjectA\Shared\Library\Error\ErrorLogger;

class Sao_Zed_Fulfillment_Component_Model_Spooler implements
    Sao_Zed_Fulfillment_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Library_Dependency_Factory_Interface,
    Sao_Zed_Catalog_Component_Interface_ProductAttributeConstant
{

    use Sao_Zed_Fulfillment_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Library_Dependency_Factory_Trait;



    /** @var ProjectA_Zed_Library_DataStructure_Named_Map */
    protected $providers;

    /**
     * @param Sao_Shared_Sales_Transfer_Order $orderTransfer
     * @param Sao_Shared_Sales_Transfer_Order_Item_Collection $itemTransferCollection
     * @return Sao_Shared_Sales_Transfer_Order
     */
    public function requestQuotes(Sao_Shared_Sales_Transfer_Order $orderTransfer, Sao_Shared_Sales_Transfer_Order_Item_Collection $itemTransferCollection)
    {
        $orderTransfer->setQuotes(Generated_Shared_Library_TransferLoader::getFulfillmentQuoteCollection());

        $itemsForProviders = $this->distributeItemsToProviders($itemTransferCollection);
        foreach ($itemsForProviders as $providerName => $providerItems) {
            try {
                $orderTransfer = $this->addQuotes($orderTransfer, $providerName, $providerItems);
            } catch (Exception $e) {
                ErrorLogger::log($e);
            }
        }

        return $orderTransfer;
    }

    /**
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote
     * @return boolean
     */
    public function appointShipping(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote)
    {
        $startTime = microtime(true);

        $providerName = $quote->getProvider()->getShortName();
        $providerApi = $this->getProviderApiByName($providerName);
        $orderResponse = $providerApi->appointShipping($quote);

        $lumberjack = ProjectA_Shared_Lumberjack_Code_Lumberjack::getInstance();
        $lumberjack->addField('order', $orderResponse);
        $lumberjack->addField('duration', number_format(microtime(true) - $startTime, 4));
        $lumberjack->send(ProjectA_Shared_Lumberjack_Code_Log_Types::FULFILLMENT, 'Export Response', $providerName);

        $quote->setProviderOrderNumber($orderResponse->getPrintOrderId())
            ->setOrderTimestamp(new DateTime())
            ->setInternalOrderNumber($orderResponse->getInternalOrderId())
            ->save();

        return true;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Item_Collection $itemTransferCollection
     * @return SplObjectStorage[]
     */
    protected function distributeItemsToProviders(Sao_Shared_Sales_Transfer_Order_Item_Collection $itemTransferCollection)
    {
        /** @var $itemsForProviders SplObjectStorage[] */
        $itemsForProviders = [];
        /** @var $item Sao_Shared_Sales_Transfer_Order_Item */
        foreach ($itemTransferCollection as $item) {
            $providerName = $this->factory->getModelFinder()->getFulfillmentProviderNameBySku($item->getSku());

            if (empty($providerName)) {
                // @TODO log?
                continue;
            }

            if (!isset($itemsForProviders[$providerName])) {
                $itemsForProviders[$providerName] = new SplObjectStorage();
            }
            $itemsForProviders[$providerName]->attach($item);
        }

        return $itemsForProviders;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order
     * @param $providerName
     * @param Traversable $providerItems
     * @return Sao_Shared_Sales_Transfer_Order
     */
    protected function addQuotes(Sao_Shared_Sales_Transfer_Order $order, $providerName, Traversable $providerItems)
    {
        $providerApi = $this->getProviderApiByName($providerName);
        $this->addUniqueIds($providerItems);

        $quotes = $providerApi->getFulfillmentCosts($order, $providerItems);
        foreach ($quotes as $quote) {
            $quoteTransfer = $this->quoteResponseToTransferQuote($quote, $providerName);
            $order->addQuote($quoteTransfer);
        }

        return $order;
    }

    protected function addUniqueIds(Traversable $items)
    {
        /** @var $item Sao_Shared_Sales_Transfer_Order_Item */
        foreach ($items as $item) {
            $item->setUniqueItemId($this->getUniqueItemId($item));
        }
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Api_Quote_Response $quoteResponse
     * @param string $providerName
     * @return Sao_Shared_Fulfillment_Transfer_Quote
     */
    protected function quoteResponseToTransferQuote(Sao_Zed_Fulfillment_Component_Model_Api_Quote_Response $quoteResponse, $providerName)
    {
        $lowestRate = $this->getLowestRate($quoteResponse);
        $items = $quoteResponse->getItems();

        $quote = Generated_Shared_Library_TransferLoader::getFulfillmentQuote()
            ->setProvider($providerName)
            ->setActive(true)
            ->setSuccess($quoteResponse->isSuccess())
            ->setQuoteId($quoteResponse->getQuoteId())
            ->setUniqueQuoteKey($quoteResponse->getUniqueQuoteKey());
        if($lowestRate) {
            $quote->setShippingPrice($lowestRate->getPrice())
            ->setShippingProduct($lowestRate->getMethod())
            ->setShippingAgent($lowestRate->getShippingAgent())
            ->setShippingFreight($lowestRate->getBaseFreight())
            ->setShippingTaxDuties($lowestRate->getTax())
            ->setOrderItems($items);
        }
        $quote->setErrorMessage($quoteResponse->getCode() . ' : ' . $quoteResponse->getMessage());

        return $quote;
    }

    /**
     * @return ProjectA_Zed_Library_DataStructure_Named_Map
     */
    protected function getProviders()
    {
        if (!$this->providers) {
            $this->providers = $this->factory->getSettings()->getProviderApis();
            foreach ($this->providers as $providerName => $providerApi) {
                $providerConfig = $this->factory->getSettings()->getConfigForProvider($providerName);
                $providerApi->setConfig($providerConfig);
            }
        }
        return $this->providers;
    }

    /**
     * @param $name
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Abstract
     * @throws ErrorException
     */
    protected function getProviderApiByName($name)
    {
        $providerApiMap = $this->getProviders();
        if (!$providerApiMap->has($name)) {
            throw new ErrorException('Unknown Printer Provider [' . $name . ']');
        }
        return $providerApiMap->get($name);
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Api_Quote_Response $quoteResponse
     * @return mixed
     */
    protected function getLowestRate(Sao_Zed_Fulfillment_Component_Model_Api_Quote_Response $quoteResponse)
    {
        $rates = $quoteResponse->getRates();
        usort($rates, function (Sao_Zed_Fulfillment_Component_Model_Api_Quote_ShippingRate$a, Sao_Zed_Fulfillment_Component_Model_Api_Quote_ShippingRate $b)
            {
                return $a->getPrice() < $b->getPrice() ? -1 : 1;
            });
        return array_shift($rates);
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Item $item
     * @return string
     */
    protected function getUniqueItemId(Sao_Shared_Sales_Transfer_Order_Item $item)
    {
        return uniqid($item->getSku() . '.' . $item->getUniqueIdentifier(), true);
    }

}
