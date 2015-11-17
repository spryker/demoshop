<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Functional\Pyz\Zed\Payolution;

use SprykerFeature\Zed\Payolution;

/**
 * @group Pyz
 * @group Zed
 * @group Payolution
 */

class FacadeTest extends AbstractFacadeTest
{

    public function testSaveOrderPayment()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $this->setPaymentInvoice();

        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);
    }

    public function testPreCheckPaymentInvoice()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $this->setPaymentInvoice();

        $checkoutRequestTransfer = $this->getCheckoutRequestTransfer();
        $response = $PayolutionFacade->preCheckPayment($checkoutRequestTransfer);
        $this->assertEquals('ACK', $response->getProcessingResult(), $response->getProcessingReason());
    }

    public function testPreAuthorizePaymentInvoice()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $this->setPaymentInvoice();

        $orderTransfer = $this->getOrderTransfer();
        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();

        $response = $PayolutionFacade->preAuthorizePayment($idPayment);
        $this->assertEquals('ACK', $response->getProcessingResult(), $response->getProcessingReason());

        $isPreAuthorized = $PayolutionFacade->isPreAuthorizationApproved($orderTransfer);
        $this->assertTrue($isPreAuthorized);
    }

    public function testReAuthorizePaymentInvoice()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $this->setPaymentInvoice();

        $orderTransfer = $this->getOrderTransfer();
        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();

        $PayolutionFacade->preAuthorizePayment($idPayment);
        $response = $PayolutionFacade->reAuthorizePayment($idPayment);
        $this->assertEquals('ACK', $response->getProcessingResult(), $response->getProcessingReason());

        $isReAuthorized = $PayolutionFacade->isReAuthorizationApproved($orderTransfer);
        $this->assertTrue($isReAuthorized);
    }

    public function testRevertPaymentInvoice()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $this->setPaymentInvoice();

        $orderTransfer = $this->getOrderTransfer();
        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();

        $PayolutionFacade->preAuthorizePayment($idPayment);
        $response = $PayolutionFacade->revertPayment($idPayment);
        $this->assertEquals('ACK', $response->getProcessingResult(), $response->getProcessingReason());

        $isReverted = $PayolutionFacade->isReversalApproved($orderTransfer);
        $this->assertTrue($isReverted);
    }

    public function testCapturePaymentInvoice()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $this->setPaymentInvoice();

        $orderTransfer = $this->getOrderTransfer();
        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();

        $PayolutionFacade->preAuthorizePayment($idPayment);
        $response = $PayolutionFacade->capturePayment($idPayment);
        $this->assertEquals('ACK', $response->getProcessingResult(), $response->getProcessingReason());

        $isCaptured = $PayolutionFacade->isCaptureApproved($orderTransfer);
        $this->assertTrue($isCaptured);
    }

    public function testRefundPaymentInvoice()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

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

    public function testCalculateInstallmentPayment()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $this->setPaymentInstallment();

        $checkoutRequestTransfer = $this->getCheckoutRequestTransfer();
        $response = $PayolutionFacade->calculateInstallmentPayments($checkoutRequestTransfer);

        $this->assertEquals('OK', $response->getStatus());
    }

    public function testPreCheckPaymentInstallment()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $this->setPaymentInstallment();

        $checkoutRequestTransfer = $this->getCheckoutRequestTransfer();
        $response = $PayolutionFacade->preCheckPayment($checkoutRequestTransfer);
        $this->assertEquals('ACK', $response->getProcessingResult(), $response->getProcessingReason());
    }

    public function testPreAuthorizePaymentInstallment()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $this->setPaymentInstallment();

        $orderTransfer = $this->getOrderTransfer();
        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();

        $response = $PayolutionFacade->preAuthorizePayment($idPayment);
        $this->assertEquals('ACK', $response->getProcessingResult(), $response->getProcessingReason());

        $isPreAuthorized = $PayolutionFacade->isPreAuthorizationApproved($orderTransfer);
        $this->assertTrue($isPreAuthorized);
    }

    public function testReAuthorizePaymentInstallment()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $this->setPaymentInstallment();

        $orderTransfer = $this->getOrderTransfer();
        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();

        $PayolutionFacade->preAuthorizePayment($idPayment);
        $response = $PayolutionFacade->reAuthorizePayment($idPayment);
        $this->assertEquals('ACK', $response->getProcessingResult(), $response->getProcessingReason());

        $isReAuthorized = $PayolutionFacade->isReAuthorizationApproved($orderTransfer);
        $this->assertTrue($isReAuthorized);
    }

    public function testRevertPaymentInstallment()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $this->setPaymentInstallment();

        $orderTransfer = $this->getOrderTransfer();
        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();

        $PayolutionFacade->preAuthorizePayment($idPayment);
        $response = $PayolutionFacade->revertPayment($idPayment);
        $this->assertEquals('ACK', $response->getProcessingResult(), $response->getProcessingReason());

        $isReverted = $PayolutionFacade->isReversalApproved($orderTransfer);
        $this->assertTrue($isReverted);
    }

    public function testCapturePaymentInstallment()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $this->setPaymentInstallment();

        $orderTransfer = $this->getOrderTransfer();
        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();

        $PayolutionFacade->preAuthorizePayment($idPayment);
        $response = $PayolutionFacade->capturePayment($idPayment);
        $this->assertEquals('ACK', $response->getProcessingResult(), $response->getProcessingReason());

        $isCaptured = $PayolutionFacade->isCaptureApproved($orderTransfer);
        $this->assertTrue($isCaptured);
    }

    public function testRefundPaymentInstallment()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

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
