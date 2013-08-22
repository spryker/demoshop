<?php

class Sao_Zed_Fulfillment_Component_Model_Sba_Api extends Sao_Zed_Fulfillment_Component_Model_Api_Abstract
{

    const PROVIDER_NAME = 'sba';

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order
     * @param Traversable $items
     * @return array|Sao_Zed_Fulfillment_Component_Model_Api_Quote_Response[]
     */
    public function getFulfillmentCosts(Sao_Shared_Sales_Transfer_Order $order, Traversable $items)
    {
        $quotes = [];
        /** @var $item Sao_Shared_Sales_Transfer_Order_Item */
        foreach ($items as $item) {
            $calculateRatesContainer = $this->getDataFactory()->getCalculateRatesRequestContainer($order, $item);
            $calculateResponse = $this->getSoapClient()->calculateRates($calculateRatesContainer);

            $uniqueQuoteKey = uniqid($this->getName());
            $item->setUniqueQuoteKey($uniqueQuoteKey);
            $quoteResponse = $this->buildFulfillmentCostsResponse($calculateResponse, $uniqueQuoteKey);

            $itemCollection = new Sao_Shared_Sales_Transfer_Order_Item_Collection();
            $itemCollection->add($item);
            $quoteResponse->setItems($itemCollection);

            $quotes[] = $quoteResponse;
        }

        return $quotes;
    }

    /**
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote
     * @return mixed|void
     */
    public function appointShipping(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote)
    {
        $bookShipmentContainer = $this->getDataFactory()->getBookShipmentRequestContainer($quote);
        $bookResponse = $this->getSoapClient()->bookShipment($bookShipmentContainer);
        $orderResponse = $this->buildAppointShippingResponse($bookResponse);

        return $orderResponse;
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_CalculateRatesResponse $calculateResponse
     * @param $uniqueQuoteKey
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Quote_Response
     */
    protected function buildFulfillmentCostsResponse(Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_CalculateRatesResponse $calculateResponse, $uniqueQuoteKey)
    {
        $quoteResponse = $this->factory->getModelApiQuoteResponse();
        $ratingResponse = $calculateResponse->getResponse();
        $errorDetails = $ratingResponse->getErrorMessage();

        if ($this->isErrorResponse($errorDetails)) {
            $quoteResponse->setCode($errorDetails->getErrorCode())
                ->setMessage($errorDetails->getErrorMessage())
                ->setSuccess(false);
            return $quoteResponse;
        }

        $quoteRate = $this->factory->getModelApiQuoteShippingRate()
            ->setShippingAgent($this->getName())
            ->setTax($ratingResponse->getDutiesAndTaxes() * 100)
            ->setBaseFreight($ratingResponse->getFreightCharge() * 100)
            ->setPrice($ratingResponse->getTotalCharge() * 100);

        $quoteResponse->addRate($quoteRate)
            ->setQuoteId((int)microtime(true))
            ->setUniqueQuoteKey($uniqueQuoteKey)
            ->setSuccess(true);

        return $quoteResponse;
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_BookShipmentResponse $bookResponse
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Order_Response
     */
    protected function buildAppointShippingResponse(Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_BookShipmentResponse $bookResponse)
    {
        $orderResponse = $this->factory->getModelApiOrderResponse();
        $bookingResponse = $bookResponse->getResponse();
        $errorDetails = $bookingResponse->getErrorMessage();

        if ($this->isErrorResponse($errorDetails)) {
            $orderResponse->setCode($errorDetails->getErrorCode())
                ->setMessage($errorDetails->getErrorMessage())
                ->setSuccess(false);
            return $orderResponse;
        }

        $orderResponse->setCode($bookingResponse->getConfirmationNumber())
            ->setSuccess(true);
        return $orderResponse;
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_ErrorDetails $errorDetails
     * @return bool
     */
    protected function isErrorResponse(Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_ErrorDetails $errorDetails)
    {
        $errorCode = $errorDetails->getErrorCode();
        $errorMessage = $errorDetails->getErrorMessage();
        return (!empty($errorCode) || !empty($errorMessage));
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_SoapClient
     */
    protected function getSoapClient()
    {
        return $this->factory->getModelSbaSoapClient();
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_DataFactory
     */
    protected function getDataFactory()
    {
        return $this->factory->getModelSbaDataFactory();
    }

}
