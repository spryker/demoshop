<?php

class Sao_Zed_Pdf_Component_Model_Filename
{
    const FRONT = 'front';
    const BACK = 'back';

    /**
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $item
     * @return string
     */
    public function getFileNameForPackagingSlip(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote, ProjectA_Zed_Sales_Persistence_PacSalesOrder $order, $type)
    {
        return 'packaging_slip_' . $order->getIdSalesOrder() . '_' . $quote->getIdQuote() . '-' . $type . '.jpg';
    }
}
