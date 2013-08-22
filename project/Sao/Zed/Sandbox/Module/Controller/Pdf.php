<?php

class Sao_Zed_Sandbox_Module_Controller_Pdf extends ProjectA_Zed_Library_Controller_Action
    implements Sao_Zed_Pdf_Component_Dependency_Facade_Interface, ProjectA_Zed_Sales_Component_Dependency_Facade_Interface
{
    use Sao_Zed_Pdf_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Sales_Component_Dependency_Facade_Trait;

    public function preDispatch()
    {
//        if (PalShared_Environment::isNotDevelopment()) {
//            throw new ProjectA_Zed_Library_Exception('Sandbox is for development only!');
//        }
    }

    public function init()
    {
        $this->disableLayout();
    }

    public function slipAction()
    {
        $order = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery::create()->orderByCreatedAt(Criteria::DESC)->findOne();
        $pdf = $this->facadePdf->getPackagingSlipForQuote($order);

        if ($this->_getParam('file')) {
            file_put_contents('/tmp/test.jpg', $this->facadePdf->convertPdfContentToJpeg($pdf->renderPdf()), LOCK_EX);
            echo "written to /tmp/test.jpg";
        } elseif ($this->_getParam('pdf')) {
            file_put_contents('/tmp/test.pdf', $pdf->renderPdf(), LOCK_EX);
            echo "written to /tmp/test.pdf";
        } elseif ($this->_getParam('legacy')) {
            $request = new Sao_Shared_Library_Legacy_Request();

            $transfer = Generated_Shared_Library_TransferLoader::getLegacyPackingSlip();
            $transfer->setPdf($pdf->renderPdf());
            $transfer->setVendor($order->getProvider()->getShortName());
            $transfer->setJpgUrl($this->facadePdf->getFileNameForPackagingSlip($order, $order->getItems()->getFirst()));

            $response = $request->request('legacy/webservice/packingslip', $transfer, 60, 60);

            if ($response && $response->getSuccess()) {
                echo $response->getTransfer()->getJpgUrl();
            } else {
                echo "no success";
            }
        } else {
            header('Expires: Thu, 19 Nov 1981 08:52:00 GMT');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: no-cache');
            header("Content-Type : image/jpeg");
            echo $this->facadePdf->convertPdfContentToJpeg($pdf->renderPdf());
        }
    }
}
