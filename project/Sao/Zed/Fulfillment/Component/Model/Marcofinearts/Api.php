<?php

class Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Api extends Sao_Zed_Fulfillment_Component_Model_Api_Abstract
{
    const PROVIDER_NAME = 'marcofinearts';

    const METHOD_PACKING_INFO = 'packingInfo';

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order
     * @param Traversable $items
     * @return array|Sao_Zed_Fulfillment_Component_Model_Api_Quote_Response[]
     */
    public function getFulfillmentCosts(Sao_Shared_Sales_Transfer_Order $order, Traversable $items)
    {
        $quoteRequest = $this->createQuoteRequest($order, $items);

        $quoteResponse = $this->factory->getModelMarcofineartsResponseShippingRate();
        $quoteResponse = $this->sendRequest(self::METHOD_QUOTE, $quoteRequest, $quoteResponse);

        $fulfillmentCostResponse = $this->createFulfillmentCostResponse($quoteResponse, $quoteRequest->getOrderData()->getShipping()->getCarrier());
        return array($fulfillmentCostResponse);
    }

    protected function createFulfillmentCostResponse(Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Response_ShippingRate $quoteResponse, $shippingAgentName)
    {
        $fulfillmentCostResponse = $this->factory->getModelApiQuoteResponse();
        if ($quoteResponse->isSuccess()) {
            /** @var $shippingRate Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Response_ShippingRate_Rate */
            $rates = $quoteResponse->getRate();
            foreach ($rates as $shippingRate) {
                $rate = $this->factory->getModelApiQuoteShippingRate();
                $rate->setShippingAgent($shippingAgentName);
                $rate->setMethod($shippingRate->getMethod());
                $rate->setPrice($shippingRate->getCost());
                $rate->setBaseFreight($shippingRate->getCost());
                $rate->setTax(0);
                $fulfillmentCostResponse->addRate($rate);
                $fulfillmentCostResponse->setSuccess(true);
            }
        } else {
            $fulfillmentCostResponse->setSuccess(false);
            $fulfillmentCostResponse->setMessage($quoteResponse->getMessage());
            $fulfillmentCostResponse->setCode($quoteResponse->getCode());
        }
        return $fulfillmentCostResponse;
    }

    /**
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote
     * @return mixed|Sao_Zed_Fulfillment_Component_Model_Api_Order_Response
     * @throws ErrorException
     */
    public function appointShipping(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote)
    {
        $orderRequest = $this->createOrderRequest($quote->getOrder(), $quote->getItems(), $quote);

        $orderResponse = $this->factory->getModelMarcofineartsResponsePushOrder();
        $orderResponse = $this->sendRequest(self::METHOD_ORDER, $orderRequest, $orderResponse);

        if ($orderResponse->isError()) {
            throw new ErrorException('Error submitting a print order to ' . self::PROVIDER_NAME . ': ' . $orderResponse->getMessage());
        }

        $result = $this->factory->getModelApiOrderResponse();
        $result->setPrintOrderId($orderResponse->getCode());
        $result->setInternalOrderId($orderRequest->getPoNumber());

        return $result;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order
     * @param Traversable $items
     * @return Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_ShippingRate
     */
    protected function createQuoteRequest(Sao_Shared_Sales_Transfer_Order $order, Traversable $items)
    {
        $shippingAddress = $this->factory->getModelMarcofineartsRequestShippingRateShippingAddress($order->getShippingAddress());
        $orderInfos      = $this->factory->getModelMarcofineartsRequestShippingRateOrderInfo($items);

        // TODO use real data here!
        $shippingData = [
            'carrier'     => 'FedEx',
            'packageType' => 'YOUR_PACKAGING'
        ];
        $shipping     = $this->factory->getModelMarcofineartsRequestShippingRateShipping($shippingData);

        $orderData = $this->factory->getModelMarcofineartsRequestShippingRateOrderData()
            ->setShippingAddress($shippingAddress)
            ->setOrderInfo($orderInfos)
            ->setShipping($shipping);

        $quoteRequest = $this->factory->getModelMarcofineartsRequestShippingRate()
            ->setOrderData($orderData);
        return $quoteRequest;
    }

    /**
     * @param string $method
     * @param Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_Abstract $request
     * @param Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Response_Abstract $response
     * @return Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Response_Abstract
     */
    protected function sendRequest($method, Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_Abstract $request, Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Response_Abstract $response)
    {
        $soapAction = '';
        switch ($method) {
            case self::METHOD_QUOTE:
                $soapAction = 'shipping_rate';
                break;
            case self::METHOD_ORDER:
                $soapAction = 'push_order';
                break;
            case self::METHOD_PACKING_INFO:
                $soapAction = 'package_info';
                break;
        }

        $soapClient = new Zend_Soap_Client($this->config->apiUrl);
        $startTime = microtime(true);
        $responseArray = $soapClient->__call($soapAction, [
            $this->config->username,
            $this->config->password,
            $this->config->secretkey,
            $request->getOrderData()->toArray(),
        ]);
        $duration = number_format(microtime(true) - $startTime, 4);

        $this->logRequest($method, ['request' => $request, 'raw request' => $this->formatXml($soapClient->getLastRequest())]);;

        $response->initFromArray($responseArray);
        $this->logResponse($method, ['duration' => $duration, 'response' => $response, 'raw response' => $this->formatXml($soapClient->getLastResponse())]);

        return $response;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $order
     * @param Traversable $items
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote
     * @return Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder
     */
    protected function createOrderRequest(ProjectA_Zed_Sales_Persistence_PacSalesOrder $order, Traversable $items, Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote)
    {
        /** @var $orderRequest Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder */
        $orderRequest = $this->factory->getModelMarcofineartsRequestPushOrder();
        $orderData    = $this->factory->getModelMarcofineartsRequestPushOrderOrderData($order);
        $orderData->setXid($quote->getInternalOrderNumber());

        $items = $order->getItems();
        /** @var Sao_Shared_Sales_Transfer_Order_Item $item */
        foreach ($items as $item) {
            /** @var Sao_Shared_Catalog_Transfer_Product $product */
            $product = $item->getProduct();
        }
        /* optional
        $orderData->setShipDeadline('???');
        $orderData->setIsgift('???');
        $orderData->setGiftTo('???');
        $orderData->setGiftFrom('???');
        $orderData->setMessage('???');
        $orderData->setTrackUrl('???');
        $orderData->setInvoice('???');
        */

        $orderBillingAddress = $order->getBillingAddress();
        $billingAddress      = $this->factory->getModelMarcofineartsRequestPushOrderBillingAddress($orderBillingAddress);
        $orderData->setBillingAddress($billingAddress);

        $orderShippingAddress = $order->getShippingAddress();
        $shippingAddress      = $this->factory->getModelMarcofineartsRequestPushOrderShippingAddress($orderShippingAddress);
        $orderData->setShippingAddress($shippingAddress);

        $orderInfo = $this->factory->getModelMarcofineartsRequestPushOrderOrderInfo($items);
        $orderData->setOrderInfo($orderInfo);

        $shipping = $this->factory->getModelMarcofineartsRequestPushOrderShipping();
        $shipping->setAccount('???');
        $shipping->setCarrier($quote->getShippingAgent());
        $shipping->setService($quote->getShippingProduct());
        $shipping->setPackaging('???');
        $shipping->setNotes('???');
        $shipping->setShippingCost($quote->getShippingPrice());
        $orderData->setShipping($shipping);

        $orderRequest->setOrderData($orderData);

        return $orderRequest;
    }

}
