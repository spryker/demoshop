<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Functional\Pyz\Zed\Payolution;

use Spryker\Zed\Payolution\Business\PayolutionFacade;

/**
 * @group Pyz
 * @group Zed
 * @group Payolution
 */

class FacadeTest extends AbstractFacadeTest
{

    /**
     * @return void
     */
    public function testSaveOrderPayment()
    {
        $this->markTestSkipped();

        $PayolutionFacade = new PayolutionFacade();

        $this->setPaymentInvoice();

        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);
    }

    /**
     * @return void
     */
    public function testPreCheckPaymentInvoice()
    {
        $this->markTestSkipped();

        $PayolutionFacade = new PayolutionFacade();

        $this->setPaymentInvoice();

        $checkoutRequestTransfer = $this->getCheckoutRequestTransfer();
        $response = $PayolutionFacade->preCheckPayment($checkoutRequestTransfer);
        $this->assertEquals('ACK', $response->getProcessingResult(), $response->getProcessingReason());
    }

    /**
     * @return void
     */
    public function testPreAuthorizePaymentInvoice()
    {
        $this->markTestSkipped();

        $PayolutionFacade = new PayolutionFacade();

        $this->setPaymentInvoice();

        $orderTransfer = $this->getOrderTransfer();
        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();

        $response = $PayolutionFacade->preAuthorizePayment($idPayment);
        $this->assertEquals('ACK', $response->getProcessingResult(), $response->getProcessingReason());

        $isPreAuthorized = $PayolutionFacade->isPreAuthorizationApproved($orderTransfer);
        $this->assertTrue($isPreAuthorized);
    }

    /**
     * @return void
     */
    public function testReAuthorizePaymentInvoice()
    {
        $this->markTestSkipped();

        $PayolutionFacade = new PayolutionFacade();

        $this->setPaymentInvoice();

        $orderTransfer = $this->getOrderTransfer();
        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();

        $PayolutionFacade->preAuthorizePayment($idPayment);
        $response = $PayolutionFacade->reAuthorizePayment($idPayment);
        $this->assertEquals('ACK', $response->getProcessingResult(), $response->getProcessingReason());

        $isReAuthorized = $PayolutionFacade->isReAuthorizationApproved($orderTransfer);
        $this->assertTrue($isReAuthorized);
    }

    /**
     * @return void
     */
    public function testRevertPaymentInvoice()
    {
        $this->markTestSkipped();

        $PayolutionFacade = new PayolutionFacade();

        $this->setPaymentInvoice();

        $orderTransfer = $this->getOrderTransfer();
        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();

        $PayolutionFacade->preAuthorizePayment($idPayment);
        $response = $PayolutionFacade->revertPayment($idPayment);
        $this->assertEquals('ACK', $response->getProcessingResult(), $response->getProcessingReason());

        $isReverted = $PayolutionFacade->isReversalApproved($orderTransfer);
        $this->assertTrue($isReverted);
    }

    /**
     * @return void
     */
    public function testCapturePaymentInvoice()
    {
        $this->markTestSkipped();

        $PayolutionFacade = new PayolutionFacade();

        $this->setPaymentInvoice();

        $orderTransfer = $this->getOrderTransfer();
        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();

        $PayolutionFacade->preAuthorizePayment($idPayment);
        $response = $PayolutionFacade->capturePayment($idPayment);
        $this->assertEquals('ACK', $response->getProcessingResult(), $response->getProcessingReason());

        $isCaptured = $PayolutionFacade->isCaptureApproved($orderTransfer);
        $this->assertTrue($isCaptured);
    }

    /**
     * @return void
     */
    public function testRefundPaymentInvoice()
    {
        $this->markTestSkipped();

        $PayolutionFacade = new PayolutionFacade();

        $this->setPaymentInvoice();

        $orderTransfer = $this->getOrderTransfer();
        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();

        $PayolutionFacade->preAuthorizePayment($idPayment);
        $PayolutionFacade->capturePayment($idPayment);
        $response = $PayolutionFacade->refundPayment($idPayment);
        $this->assertEquals('ACK', $response->getProcessingResult(), $response->getProcessingReason());

        $isRefunded = $PayolutionFacade->isRefundApproved($orderTransfer);
        $this->assertTrue($isRefunded);
    }

    /**
     * @return void
     */
    public function testCalculateInstallmentPayment()
    {
        $this->markTestSkipped();

        $PayolutionFacade = new PayolutionFacade();

        $this->setPaymentInstallment();

        $checkoutRequestTransfer = $this->getCheckoutRequestTransfer();
        $response = $PayolutionFacade->calculateInstallmentPayments($checkoutRequestTransfer);

        $this->assertEquals('OK', $response->getStatus());
    }

    /**
     * @return void
     */
    public function testPreCheckPaymentInstallment()
    {
        $this->markTestSkipped();

        $PayolutionFacade = new PayolutionFacade();

        $this->setPaymentInstallment();

        $checkoutRequestTransfer = $this->getCheckoutRequestTransfer();
        $response = $PayolutionFacade->preCheckPayment($checkoutRequestTransfer);
        $this->assertEquals('ACK', $response->getProcessingResult(), $response->getProcessingReason());
    }

    /**
     * @return void
     */
    public function testPreAuthorizePaymentInstallment()
    {
        $this->markTestSkipped();

        $PayolutionFacade = new PayolutionFacade();

        $this->setPaymentInstallment();

        $orderTransfer = $this->getOrderTransfer();
        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();

        $response = $PayolutionFacade->preAuthorizePayment($idPayment);
        $this->assertEquals('ACK', $response->getProcessingResult(), $response->getProcessingReason());

        $isPreAuthorized = $PayolutionFacade->isPreAuthorizationApproved($orderTransfer);
        $this->assertTrue($isPreAuthorized);
    }

    /**
     * @return void
     */
    public function testReAuthorizePaymentInstallment()
    {
        $this->markTestSkipped();

        $PayolutionFacade = new PayolutionFacade();

        $this->setPaymentInstallment();

        $orderTransfer = $this->getOrderTransfer();
        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();

        $PayolutionFacade->preAuthorizePayment($idPayment);
        $response = $PayolutionFacade->reAuthorizePayment($idPayment);
        $this->assertEquals('ACK', $response->getProcessingResult(), $response->getProcessingReason());

        $isReAuthorized = $PayolutionFacade->isReAuthorizationApproved($orderTransfer);
        $this->assertTrue($isReAuthorized);
    }

    /**
     * @return void
     */
    public function testRevertPaymentInstallment()
    {
        $this->markTestSkipped();

        $PayolutionFacade = new PayolutionFacade();

        $this->setPaymentInstallment();

        $orderTransfer = $this->getOrderTransfer();
        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();

        $PayolutionFacade->preAuthorizePayment($idPayment);
        $response = $PayolutionFacade->revertPayment($idPayment);
        $this->assertEquals('ACK', $response->getProcessingResult(), $response->getProcessingReason());

        $isReverted = $PayolutionFacade->isReversalApproved($orderTransfer);
        $this->assertTrue($isReverted);
    }

    /**
     * @return void
     */
    public function testCapturePaymentInstallment()
    {
        $this->markTestSkipped();

        $PayolutionFacade = new PayolutionFacade();

        $this->setPaymentInstallment();

        $orderTransfer = $this->getOrderTransfer();
        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();

        $PayolutionFacade->preAuthorizePayment($idPayment);
        $response = $PayolutionFacade->capturePayment($idPayment);
        $this->assertEquals('ACK', $response->getProcessingResult(), $response->getProcessingReason());

        $isCaptured = $PayolutionFacade->isCaptureApproved($orderTransfer);
        $this->assertTrue($isCaptured);
    }

    /**
     * @return void
     */
    public function testRefundPaymentInstallment()
    {
        $this->markTestSkipped();

        $PayolutionFacade = new PayolutionFacade();

        $this->setPaymentInstallment();

        $orderTransfer = $this->getOrderTransfer();
        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();

        $PayolutionFacade->preAuthorizePayment($idPayment);
        $PayolutionFacade->capturePayment($idPayment);
        $response = $PayolutionFacade->refundPayment($idPayment);
        $this->assertEquals('ACK', $response->getProcessingResult(), $response->getProcessingReason());

        $isRefunded = $PayolutionFacade->isRefundApproved($orderTransfer);
        $this->assertTrue($isRefunded);
    }

}
