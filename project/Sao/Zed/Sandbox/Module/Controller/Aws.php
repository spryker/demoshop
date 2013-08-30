<?php

class Sao_Zed_Sandbox_Module_Controller_Aws extends ProjectA_Zed_Library_Controller_Action
    implements Sao_Zed_Aws_Component_Dependency_Facade_Interface, ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface, ProjectA_Zed_Sales_Component_Dependency_Facade_Interface,
    Sao_Zed_Fulfillment_Component_Dependency_Facade_Interface, Sao_Zed_Pdf_Component_Dependency_Facade_Interface
{
    use Sao_Zed_Aws_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Catalog_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Sales_Component_Dependency_Facade_Trait;
    use Sao_Zed_Fulfillment_Component_Dependency_Facade_Trait;
    use Sao_Zed_Pdf_Component_Dependency_Facade_Trait;

    public function init()
    {
        $this->disableLayout();
    }

    public function sendOrderItemsAction()
    {
        $items = $this->facadeSales->getOrderItemsByIds(array(135));
        $item = $items->getFirst();

        $model = new Sao_Zed_Sales_Component_Model_Communication_Sns_PayoutNote();
        $model->setFactory(new Generated_Zed_Sales_Component_Factory());
        $model->setFacadeAws($this->facadeAws);
        $model->setFacadeCatalog($this->facadeCatalog);

        $model->send($item);

    }

    public function getBucketInfoAction()
    {
        $info = $this->facadeAws->s3GetBucketInfo('packaging-slip');
        var_dump($info);
    }


    public function checkS3TransactionAction()
    {
        $orderItemEntity = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery::create()->orderByCreatedAt(Criteria::DESC)->findOne();

        $entityQuote = $this->facadeFulfillment->getQuoteByOrderItem($orderItemEntity);

        $pdf = $this->facadePdf->getPackagingSlipForQuote($entityQuote);
        $imageContent = $this->facadePdf->convertPdfContentToJpeg($pdf->renderPdf());

        $bucketInfo = $this->facadeAws->s3GetBucketInfo('packaging-slip');
        $objectUrl = $this->facadeAws->s3CopyContentToBucket($imageContent, $this->facadePdf->getFileNameForPackagingSlip($entityQuote, $orderItemEntity), $bucketInfo['bucket'], $bucketInfo['path'], $bucketInfo['zone'], true, true);

        var_dump($objectUrl);
    }

    public function copyContentToS3Action()
    {
        $filename = 'test';
        $bucketName = 'testsaaaatchi';
        $region = \Aws\Common\Enum\Region::EU_WEST_1;

        $result = $this->facadeAws->s3CopyContentToBucket('testtttttt', $filename, $bucketName, 'test', $region, true, true);
    }

    public function copyFileToS3Action()
    {
        $filename = __DIR__ . DIRECTORY_SEPARATOR . 'test';
        $bucketName = 'testsaaaatchi';
        $region = \Aws\Common\Enum\Region::EU_WEST_1;

        file_put_contents($filename, 'testtttttt');

        $result = $this->facadeAws->s3CopyFileToBucket($filename, $bucketName, '', $region, true, true);

        var_dump($result);
    }

    public function readContentFromS3Action()
    {
        $filename = __DIR__ . DIRECTORY_SEPARATOR . 'test';
        $bucketName = 'testsaaaatchi';
        $region = \Aws\Common\Enum\Region::EU_WEST_1;

        $result = $this->facadeAws->s3CopyContentToBucket('testtttttt', $filename, $bucketName, '', $region, true, true);
        $result = $this->facadeAws->s3GetFileContentFromBucket($filename, $bucketName, '');

        var_dump($result);
    }
}
