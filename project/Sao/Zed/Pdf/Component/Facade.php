<?php

class Sao_Zed_Pdf_Component_Facade extends ProjectA_Zed_Library_Component_Model_FacadeAbstract
{

    /**
     * @var Sao_Zed_Pdf_Component_Factory
     */
    protected $factory;

    public function getPathForInvoice(ProjectA_Zed_Invoice_Persistence_PacInvoice $entityInvoice)
    {
        // get main directory
        switch ($entityInvoice->getType()) {
            case ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::TYPE_REVERSE_INVOICE:
            case ProjectA_Zed_Invoice_Persistence_PacInvoicePeer::TYPE_INVOICE:
            default:
                return ProjectA_Shared_Library_Data::getSharedCommonPath('fulfillment' . DIRECTORY_SEPARATOR . 'protected' . DIRECTORY_SEPARATOR . 'invoices');
                break;
        }

    }

    /**
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote
     * @return Sao_Zed_Pdf_Component_Model_Document_KagingSlip
     */
    public function getPackagingSlipForQuote(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote)
    {
        $orderEntity = $quote->getOrder();
        $items = $quote->getItems();

        return $this->factory->getDocumentPackagingSlip($orderEntity, $items);
    }

    /**
     * @param $pdfContent
     * @return array
     */
    public function convertPdfContentToJpeg($pdfContent)
    {
        return $this->factory->getModelConverter()->convertPdfContentToJpg($pdfContent);
    }

    /**
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $item
     * @return string
     */
    public function getFileNameForPackagingSlip(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote, ProjectA_Zed_Sales_Persistence_PacSalesOrder $order, $type)
    {
        return $this->factory->getModelFilename()->getFileNameForPackagingSlip($quote, $order, $type);
    }
}
