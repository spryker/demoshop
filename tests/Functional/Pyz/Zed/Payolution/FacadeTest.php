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
        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);
    }

    public function testPreCheckPayment()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);

        $checkoutRequestTransfer = $this->getCheckoutRequestTransfer();
        $responsePreCheck = $PayolutionFacade->preCheckPayment($checkoutRequestTransfer);
    }

    public function testPreAuthorizePayment()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);

        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();
        $responsePreAuthorize = $PayolutionFacade->preAuthorizePayment($idPayment);
    }

    public function testReAuthorizePayment()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);

        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();
        $responsePreAuthorize = $PayolutionFacade->preAuthorizePayment($idPayment);
        $responseReAuthorize = $PayolutionFacade->reAuthorizePayment($idPayment);
    }

    public function testRevertPayment()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);

        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();
        $responsePreAuthorize = $PayolutionFacade->preAuthorizePayment($idPayment);
        $responseRevert = $PayolutionFacade->revertPayment($idPayment);
    }

    public function testCapturePayment()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);

        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();
        $responsePreAuthorize = $PayolutionFacade->preAuthorizePayment($idPayment);
        $responseCapture = $PayolutionFacade->capturePayment($idPayment);
    }

    public function testRefundPayment()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);

        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();
        $responsePreAuthorize = $PayolutionFacade->preAuthorizePayment($idPayment);
        $responseRefund = $PayolutionFacade->refundPayment($idPayment);
    }

    public function testIsPreAuthorizationApproved()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);

        $isPreAuthorizationApproved = $PayolutionFacade->isPreAuthorizationApproved($orderTransfer);
    }

    public function testIsReAuthorizationApproved()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);

        $isReAuthorizationApproved = $PayolutionFacade->isReAuthorizationApproved($orderTransfer);
    }

    public function testIsReversalApproved()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);

        $isReversalApproved = $PayolutionFacade->isReversalApproved($orderTransfer);
    }

    public function testIsCaptureApproved()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);

        $isCaptureApproved = $PayolutionFacade->isCaptureApproved($orderTransfer);
    }

    public function testIsRefundApproved()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);

        $isRefundApproved = $PayolutionFacade->isRefundApproved($orderTransfer);
    }

}
