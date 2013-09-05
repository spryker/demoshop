<?php

/**
 * @author jstick
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Command_CreatePackingSlip extends ProjectA_Zed_Sales_Component_Model_Orderprocess_CommandAbstract implements
    ProjectA_Zed_Sales_Component_Interface_OrderCommand,
    Sao_Zed_Pdf_Component_Dependency_Facade_Interface,
    Sao_Zed_Fulfillment_Component_Dependency_Facade_Interface,
    Sao_Zed_Aws_Component_Dependency_Facade_Interface
{
    use Sao_Zed_Pdf_Component_Dependency_Facade_Trait;
    use Sao_Zed_Fulfillment_Component_Dependency_Facade_Trait;
    use Sao_Zed_Aws_Component_Dependency_Facade_Trait;

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @param ProjectA_Zed_Library_StateMachine_Context $context
     */
    public function __invoke (ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity, ProjectA_Zed_Sales_Component_Interface_ContextCollection $context)
    {

        $items = $context->getOrderItems();
        $collection = new PropelObjectCollection();
        $collection->setData($items);
        $entityQuotes = $this->facadeFulfillment->getQuotesByOrderItems($collection);

        /* @var $entityQuote Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote */
        foreach ($entityQuotes as $entityQuote) {

//            if (!$this->facadeFulfillment->checkIfPackagingSlipIsNeeded($entityQuote)) {
//                $this->addNote('shipment label not generated because it is already generated', $orderEntity, true);
//                return;
//            }

            $pdfDocumentModel = $this->facadePdf->getPackagingSlipForQuote($entityQuote);

            $imagesArray = $this->facadePdf->convertPdfContentToJpeg($pdfDocumentModel->renderPdf());

            $bucketInfo = $this->facadeAws->s3GetBucketInfo('packaging-slip');
            $objectUrlFront = $this->facadeAws->s3CopyContentToBucket($imagesArray[0], $this->facadePdf->getFileNameForPackagingSlip($entityQuote, $orderEntity, Sao_Zed_Pdf_Component_Model_Filename::FRONT), $bucketInfo['bucket'], $bucketInfo['path'], $bucketInfo['zone']);

            if ($objectUrlFront) {
                $this->facadeFulfillment->storePackingSlipUrlFrontForQuote($objectUrlFront, $entityQuote);
                $this->addNote('packing slip FRONT created: ' . $objectUrlFront, $orderEntity, true);
            } else {
                $this->addNote('packing slip FRONT could not be created', $orderEntity, false);
            }

            if (isset($imagesArray[1])) {
                $objectUrlBack = $this->facadeAws->s3CopyContentToBucket($imagesArray[1], $this->facadePdf->getFileNameForPackagingSlip($entityQuote, $orderEntity, Sao_Zed_Pdf_Component_Model_Filename::BACK), $bucketInfo['bucket'], $bucketInfo['path'], $bucketInfo['zone']);
                if ($objectUrlBack) {
                    $this->facadeFulfillment->storePackingSlipUrlBackForQuote($objectUrlBack, $entityQuote);
                    $this->addNote('packing slip BACK created: ' . $objectUrlBack, $orderEntity, true);
                } else {
                    $this->addNote('packing slip BACK could not be created', $orderEntity, false);
                }
            }

        }
    }
}
