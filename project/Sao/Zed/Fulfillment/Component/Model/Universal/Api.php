<?php

class Sao_Zed_Fulfillment_Component_Model_Universal_Api extends Sao_Zed_Fulfillment_Component_Model_Api_Abstract implements Sao_Zed_Aws_Component_Dependency_Facade_Interface
{
    use Sao_Zed_Aws_Component_Dependency_Facade_Trait;

    const SNS_TOPIC_NAME = 'order-item-fulfill';
    const PROVIDER_NAME = 'universal';
    const ISO_COUNTRY_US = 'US';
    const US_SHIPPING_PRICE = 1000;
    const OTHER_SHIPPING_PRICE = 4000;

    /**
     * Shipping costs are hard coded for the soft launch
     *
     * @param Sao_Shared_Sales_Transfer_Order $order
     * @param Traversable $items
     * @return array|Sao_Zed_Fulfillment_Component_Model_Api_Quote_Response[]
     */
    public function getFulfillmentCosts(Sao_Shared_Sales_Transfer_Order $order, Traversable $items)
    {
        $quotes = [];
        foreach ($items as $item) {
            $this->logRequest(self::METHOD_QUOTE, ['item' => $item]);
            $response = $this->getQuoteResponse($order);
            $itemCollection = new Sao_Shared_Sales_Transfer_Order_Item_Collection();
            $itemCollection->add($item);
            $response->setItems($itemCollection);
            $this->logResponse(self::METHOD_QUOTE, ['response' => $response]);
            $quotes[] = $response;
        }

        return $quotes;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Quote_Response
     */
    protected function getQuoteResponse(Sao_Shared_Sales_Transfer_Order $order)
    {
        $rate = $this->factory->getModelApiQuoteShippingRate();
        $rate->setShippingAgent('UPS');
        $response = $this->factory->getModelApiQuoteResponse();

        if ($order->getShippingAddress()->getIso2Country() == self::ISO_COUNTRY_US) {
            $rate->setPrice(self::US_SHIPPING_PRICE);
            $rate->setBaseFreight(self::US_SHIPPING_PRICE);
        } else {
            $rate->setPrice(self::OTHER_SHIPPING_PRICE);
            $rate->setBaseFreight(self::OTHER_SHIPPING_PRICE);
        }
        $rate->setTax(0);
        $response->setSuccess(true);
        $response->setQuoteId(mt_rand(10000, 99999) . mt_rand(10000, 99999));
        $response->addRate($rate);

        return $response;
    }

    /**
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote
     * @return mixed
     */
    public function appointShipping(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote)
    {
        $snsResponse = '';
        $shippingAddress = $quote->getOrder()->getShippingAddress();

        /* @var ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $item */
        foreach ($quote->getItems() as $item) {
            $message = new stdClass();
            $message->event = 'order:item:fulfill';
            $date = Zend_Date::now();
            $message->timestamp = $date->toString(Zend_Date::ISO_8601);
            $message->order_id = $quote->getOrder()->getIncrementId();
            $message->order_item_id = $item->getPrimaryKey();
            $message->impression = $item->getSaoSalesOrderItem()->getImpression();
            $message->shipping_name = $shippingAddress->getFirstName() . ' ' . $shippingAddress->getLastName();
            $message->shipping_address1 = $shippingAddress->getAddress1();
            $message->shipping_address2 = $shippingAddress->getAddress2();
            $message->shipping_postal_code = $shippingAddress->getZipCode();
            $message->shipping_country = $shippingAddress->getCountry()->getIso2Code();

            $saoShippingAddress = $shippingAddress->getSaoAddress() ? $shippingAddress->getSaoAddress() : null;

            $region = '';
            if ($saoShippingAddress) {
                $region = $saoShippingAddress->getRegion()->getShortName();
            }
            $message->shipping_region = $region ? $region : '';
            $message->shipping_phone = $shippingAddress->getPhone();

            $this->logRequest(self::METHOD_ORDER, ['request' => $message]);
            $snsResponse = $this->facadeAws->publishSnsMessage($this->getTopicName(), json_encode($message));
            $this->logRequest(self::METHOD_ORDER, ['response' => $snsResponse]);
        }
        $orderResponse = $this->factory->getModelApiOrderResponse();
        $orderResponse->setSuccess(true);
        $orderResponse->setCode($snsResponse);
        $orderResponse->setPrintOrderId(substr($snsResponse, 0, 20)); // hack because the DB field only provides 20 characters
        $orderResponse->setPrintProvider(self::PROVIDER_NAME);

        return $orderResponse;
    }

    /**
     * @return string
     */
    protected function getTopicName()
    {
        return self::SNS_TOPIC_NAME;
    }

}
