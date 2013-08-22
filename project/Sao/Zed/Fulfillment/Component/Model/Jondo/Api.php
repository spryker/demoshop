<?php

class Sao_Zed_Fulfillment_Component_Model_Jondo_Api extends Sao_Zed_Fulfillment_Component_Model_Api_Abstract implements
    ProjectA_Zed_Misc_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Misc_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Catalog_Component_Dependency_Facade_Trait;

    const PROVIDER_NAME = 'jondo';

    /**
     * @var Zend_Http_Client
     */
    protected $client;

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order
     * @param Traversable $items
     * @return array|Sao_Zed_Fulfillment_Component_Model_Api_Quote_Response[]
     */
    public function getFulfillmentCosts(Sao_Shared_Sales_Transfer_Order $order, Traversable $items)
    {
        $quoteRequest = $this->createQuoteRequest($order->getShippingAddress(), $items);
        $quoteResponse = $this->sendRequest(self::METHOD_QUOTE, $quoteRequest, $this->factory->getModelJondoResponseQuote());
        $quotes[] = $this->createFulfillmentCostResponse($quoteResponse, $items);

        return $quotes;
    }

    /**
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Order_Response
     */
    public function appointShipping(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote)
    {
        $orderRequest = $this->createOrderRequest($quote->getOrder(), $quote->getItems(), $quote);
        $orderResponse = $this->sendRequest(self::METHOD_ORDER, $orderRequest, $this->factory->getModelJondoResponseOrder());
        $appointShippingResponse = $this->buildAppointShippingResponse($orderResponse);

        return $appointShippingResponse;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Address $shippingAddress
     * @param Traversable $items
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Quote
     */
    protected function createQuoteRequest(Sao_Shared_Sales_Transfer_Order_Address $shippingAddress, Traversable $items)
    {
        $quoteRequest = $this->factory->getModelJondoRequestQuote();
        $this->applyApiCredentialsToMessage($quoteRequest);
        $this->applyShippingAddressToRequest($quoteRequest, $shippingAddress);
        $this->addItemsToRequestGroupedByJondoProductId($quoteRequest, $items);

        $quoteRequest->setRefNumber(uniqid('request.', true));

        return $quoteRequest;
    }

    protected function createFulfillmentCostResponse(Sao_Zed_Fulfillment_Component_Model_Jondo_Response_Quote $quoteResponse, Traversable $items)
    {
        $fulfillmentCostResponse = $this->factory->getModelApiQuoteResponse();

        $itemCollection = new Sao_Shared_Sales_Transfer_Order_Item_Collection();
        foreach ($items as $item) {
            $itemCollection->add($item);
        }
        $fulfillmentCostResponse->setItems($itemCollection);

        if ($quoteResponse->isSuccess()) {
            $fulfillmentCostResponse->setQuoteId($quoteResponse->getQuoteId());

            /** @var $shipping Sao_Zed_Fulfillment_Component_Model_Jondo_Shipping_Abstract */
            foreach ($quoteResponse->getShipping() as $shipping) {
                $shippingAgent = $shipping->getAgentName();
                /** @var $responseRate Sao_Zed_Fulfillment_Component_Model_Jondo_Shipping_Rate */
                foreach ($shipping->getAvailableRates() as $responseRate) {
                    if ($responseRate->getTotal() > 0) {
                        $rate = $this->factory->getModelApiQuoteShippingRate();
                        $rate->setBaseFreight($responseRate->getBaseFreight());
                        $rate->setShippingAgent($shippingAgent);
                        $rate->setMethod($responseRate->getName());
                        $rate->setPrice($responseRate->getTotal());
                        $rate->setTax($responseRate->getTax());
                        $fulfillmentCostResponse->addRate($rate);
                        $fulfillmentCostResponse->setSuccess(true);
                    }
                }
            }
        } else {
            $fulfillmentCostResponse->setSuccess(false);
            $fulfillmentCostResponse->setMessage($quoteResponse->getMessage());
            $fulfillmentCostResponse->setCode($quoteResponse->getCode());
        }

        return $fulfillmentCostResponse;
    }

    /**
     * @param $action
     * @param Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Abstract $request
     * @param Sao_Zed_Fulfillment_Component_Model_Jondo_Response_Abstract $response
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Response_Abstract
     * @throws ErrorException
     */
    protected function sendRequest($action, Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Abstract $request, Sao_Zed_Fulfillment_Component_Model_Jondo_Response_Abstract $response)
    {
        $uri = '';
        if ($action == self::METHOD_QUOTE) {
            $uri = $this->getConfig()->dpqApiUrl;
        } elseif ($action == self::METHOD_ORDER) {
            $uri = $this->getConfig()->cofApiUrl;
        }

        $requestXml = $request->buildRequestXml();

        $this->logRequest($action, ['request' => $request, 'raw request' => $this->formatXml($requestXml)]);

        $startTime = microtime(true);
        $responseXml = $this->sendXmlRequest($requestXml, $uri);
        $duration = number_format(microtime(true) - $startTime, 4);

        if (substr($responseXml, 0, 5) != '<?xml') {
            $this->logResponse($action, ['duration' => $duration, 'response' => $response, 'raw response' => $this->formatRaw($responseXml)]);
            throw new ErrorException('Received no xml from Jondo');
        }

        $response->parseResponseXml($responseXml);

        $this->logResponse($action, ['duration' => $duration, 'response' => $response, 'raw response' => $this->formatXml($responseXml)]);

        return $response;
    }

    /**
     * @param $requestXml
     * @param $uri
     * @return string
     */
    protected function sendXmlRequest($requestXml, $uri)
    {
        $client = $this->getClient($uri);
        $client->setParameterPost('xml', $requestXml);

        $response = $this->client->request();

        $responseXmlRaw = $response->getBody();
        $responseXml = trim(html_entity_decode($responseXmlRaw));

        return $responseXml;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $order
     * @param Traversable $items
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Order
     */
    protected function createOrderRequest(ProjectA_Zed_Sales_Persistence_PacSalesOrder $order, Traversable $items, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote)
    {
        $shippingAddress = $order->getShippingAddress();

        $transferShippingAddress = new Sao_Shared_Sales_Transfer_Order_Address();
        ProjectA_Zed_Library_Copy::entityToTransfer($transferShippingAddress, $shippingAddress);
        $transferShippingAddress->setIso2Country($shippingAddress->getCountry()->getIso2Code());

        $transferItems = new Sao_Shared_Sales_Transfer_Order_Item_Collection();
        ProjectA_Zed_Library_Copy::entityCollectionToTransferCollection($transferItems, $items, Sao_Shared_Application_Transfer_EnrichmentRules::ORDER_ITEM);


        /** @var $orderRequest Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Order */
        $orderRequest = $this->factory->getModelJondoRequestOrder();
        $this->applyApiCredentialsToMessage($orderRequest);
        $this->applyShippingAddressToRequest($orderRequest, $transferShippingAddress);
        $this->addItemsToRequest($orderRequest, $transferItems);
        $this->addBrandingToRequest($orderRequest, $quote);

        $orderRequest->setPhoneNumber($this->factory->getModelFinder()->getPhoneNumberByAddress($shippingAddress));
        $orderRequest->setFirstName($shippingAddress->getFirstName());
        $orderRequest->setLastName($shippingAddress->getLastName());
        $orderRequest->setState($this->factory->getModelFinder()->getStateByAddress($shippingAddress));
        $orderRequest->setShippingType($quote->getShippingProduct());
        $orderRequest->setQuoteId($quote->getQuoteId());
        $orderRequest->setPoNumber($quote->getOrder()->getIncrementId() . '-' . $quote->getQuoteId());

        if ($this->config->testMode) {
            $orderRequest->setPoNumber($quote->getOrder()->getIncrementId() . '-' . uniqid());
        }

        $orderRequest->setTestMode($this->config->testMode);
        return $orderRequest;
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Jondo_Message_Abstract $message
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Message_Abstract
     */
    protected function applyApiCredentialsToMessage(Sao_Zed_Fulfillment_Component_Model_Jondo_Message_Abstract $message)
    {
        $message->setUserId($this->config->userId);
        $message->setApiKey($this->config->userKey);
        return $message;
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Abstract $request
     * @param Sao_Shared_Sales_Transfer_Order_Address $shippingAddress
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Abstract
     */
    protected function applyShippingAddressToRequest(Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Abstract $request, Sao_Shared_Sales_Transfer_Order_Address $shippingAddress)
    {
        $request->setAddress($shippingAddress->getAddress1());
        $request->setCity($shippingAddress->getCity());
        $request->setZip($shippingAddress->getZipCode());
        $request->setCountry($shippingAddress->getIso2Country());
        $request->setState($shippingAddress->getRegion());
        return $request;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Item $item
     * @return null|Sao_Shared_Sales_Transfer_Order_Item_Option
     */
    protected function extractWrapOptionFromItem(Sao_Shared_Sales_Transfer_Order_Item $item)
    {

        /* @var Sao_Shared_Sales_Transfer_Order_Item_Option $option */
        foreach ($item->getOptions() as $option) {
            $catalogOption = $this->facadeCatalog->getProductOptionByIdentifier($option->getIdentifier());
            if ($catalogOption->getOptionType()->getName() === ProjectA_Shared_Library_Catalog_Interface_ProductOptionTypeConstant::OPTION_TYPE_WRAP) {
                return $option;
            }
        }

        return null;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Item $item
     * @param bool $includeImageLocation
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Item
     */
    protected function createQuoteItemFromSalesOrderItem(Sao_Shared_Sales_Transfer_Order_Item $item, $includeImageLocation = true)
    {
        $productCode = $this->factory->getModelFinder()->getFulfillmentCenterProductIdByItem($item);

        $quoteItem = new Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Item(
            $productCode,
            $item->getQuantity()
        );

        if ($includeImageLocation == true) {

            $urlConfig = ProjectA_Shared_Library_Config::get('url');

            $url[] = 'http://';
            $url[] = $urlConfig->legacy;
            $url[] = '/image/print/sku/';
            $url[] = $item->getSku();

            $wrapOption = $this->extractWrapOptionFromItem($item);
            if ($wrapOption) {
                $url[] = '/wrap_id/' . substr($wrapOption->getIdentifier(), 1);
            }

            $imageLocation = join('', $url);

            $quoteItem->setImageLocation($imageLocation);
        }

        return $quoteItem;
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Abstract $request
     * @param Traversable $items
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Abstract
     */
    protected function addItemsToRequest(Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Abstract $request, Traversable $items)
    {
        /** @var $item Sao_Shared_Sales_Transfer_Order_Item */
        foreach ($items as $item) {
            $quoteItem = $this->createQuoteItemFromSalesOrderItem($item, true);
            $request->addItem($quoteItem);
        }
        return $request;
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Abstract $request
     * @param Traversable $items
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Abstract
     */
    protected function addItemsToRequestGroupedByJondoProductId(Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Abstract $request, Traversable $items)
    {
        $groupedItems = [];
        /** @var $item Sao_Shared_Sales_Transfer_Order_Item */
        foreach ($items as $item) {
            $quoteItem = $this->createQuoteItemFromSalesOrderItem($item, false);
            $code = $quoteItem->getCode();

            if (!isset($groupedItems[$code])) {
                $groupedItems[$code] = $quoteItem;
            } else {
                $quoteItem = $groupedItems[$code];
                $quoteItem->setQuantity($quoteItem->getQuantity() + $item->getQuantity());
            }
        }

        foreach ($groupedItems as $gi) {
            $request->addItem($gi);
        }
        return $request;
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Order $request
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Order
     */
    protected function addBrandingToRequest(Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Order $request, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote)
    {
        $packingSlip = new Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_KingSlip();
        $packingSlip->setElement('frontImage', $quote->getPackingSlipUrlFront());
        $packingSlip->setElement('backImage', $quote->getPackingSlipUrlBack());

        $insertCard = new Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_InsertCard();
        $insertCard->setElement('outsideImage', null);
        $insertCard->setElement('insideImage', null);

        $sticker = new Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_Sticker();
        $sticker->setElement('frontImage', $this->config->services->branding->sticker->frontImage);

        $request->addService($packingSlip);
        $request->addService($insertCard);
        $request->addService($sticker);

        return $request;
    }

    /**
     * @param string $uri
     * @return Zend_Http_Client
     */
    protected function getClient($uri)
    {
        if (false === $this->client instanceof Zend_Http_Client) {
            $config = array(
                'adapter'     => 'Zend_Http_Client_Adapter_Curl',
                'curloptions' => array(
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_SSL_VERIFYHOST => false
                )
            );
            $this->client = new Zend_Http_Client($uri, $config);
            $this->client->setMethod(Zend_Http_Client::POST);
        }
        return $this->client;
    }

    /**
     * @param $orderResponse
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Order_Response
     */
    protected function buildAppointShippingResponse(Sao_Zed_Fulfillment_Component_Model_Jondo_Response_Order $orderResponse)
    {
        $appointShippingResponse = $this->factory->getModelApiOrderResponse();
        $appointShippingResponse->setSuccess($orderResponse->isSuccess())
            ->setCode($orderResponse->getCode())
            ->setMessage($orderResponse->getMessage());

        if ($orderResponse->isSuccess()) {
            $appointShippingResponse->setInternalOrderId('');
            $appointShippingResponse->setPrintOrderId($orderResponse->getCode());
            $appointShippingResponse->setPrintProvider(self::getName());
        }

        return $appointShippingResponse;
    }

}
