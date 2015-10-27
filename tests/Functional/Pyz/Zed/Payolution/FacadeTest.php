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
        $PayolutionFacade->preCheckPayment($checkoutRequestTransfer);
    }

    public function testPreAuthorizePayment()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);

        $checkoutRequestTransfer = $this->getCheckoutRequestTransfer();
        $PayolutionFacade->preCheckPayment($checkoutRequestTransfer);

        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();
        $PayolutionFacade->preAuthorizePayment($idPayment);
    }

    public function testReAuthorizePayment()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);

        $checkoutRequestTransfer = $this->getCheckoutRequestTransfer();
        $PayolutionFacade->preCheckPayment($checkoutRequestTransfer);

        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();
        $PayolutionFacade->preAuthorizePayment($idPayment);

        $PayolutionFacade->reAuthorizePayment($idPayment);
    }

    public function testRevertPayment()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);

        $checkoutRequestTransfer = $this->getCheckoutRequestTransfer();
        $PayolutionFacade->preCheckPayment($checkoutRequestTransfer);

        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();
        $PayolutionFacade->preAuthorizePayment($idPayment);

        $PayolutionFacade->revertPayment($idPayment);
    }

    public function testCapturePayment()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);

        $checkoutRequestTransfer = $this->getCheckoutRequestTransfer();
        $PayolutionFacade->preCheckPayment($checkoutRequestTransfer);

        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();
        $PayolutionFacade->preAuthorizePayment($idPayment);

        $PayolutionFacade->capturePayment($idPayment);
    }

    public function testRefundPayment()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);

        $checkoutRequestTransfer = $this->getCheckoutRequestTransfer();
        $PayolutionFacade->preCheckPayment($checkoutRequestTransfer);

        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();
        $PayolutionFacade->preAuthorizePayment($idPayment);

        $PayolutionFacade->capturePayment($idPayment);
        $PayolutionFacade->refundPayment($idPayment);
    }

    public function testIsPreAuthorizationApproved()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);

        $checkoutRequestTransfer = $this->getCheckoutRequestTransfer();
        $PayolutionFacade->preCheckPayment($checkoutRequestTransfer);

        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();
        $PayolutionFacade->preAuthorizePayment($idPayment);

        $result = $PayolutionFacade->isPreAuthorizationApproved($orderTransfer);
        $this->assertTrue($result);
    }

    public function testIsReAuthorizationApproved()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);

        $checkoutRequestTransfer = $this->getCheckoutRequestTransfer();
        $PayolutionFacade->preCheckPayment($checkoutRequestTransfer);

        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();
        $PayolutionFacade->preAuthorizePayment($idPayment);

        $PayolutionFacade->reAuthorizePayment($idPayment);

        $result = $PayolutionFacade->isReAuthorizationApproved($orderTransfer);
        $this->assertTrue($result);
    }

    public function testIsReversalApproved()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);

        $checkoutRequestTransfer = $this->getCheckoutRequestTransfer();
        $PayolutionFacade->preCheckPayment($checkoutRequestTransfer);

        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();
        $PayolutionFacade->preAuthorizePayment($idPayment);

        $PayolutionFacade->revertPayment($idPayment);

        $result = $PayolutionFacade->isReversalApproved($orderTransfer);
        $this->assertTrue($result);
    }

    public function testIsCaptureApproved()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);

        $checkoutRequestTransfer = $this->getCheckoutRequestTransfer();
        $PayolutionFacade->preCheckPayment($checkoutRequestTransfer);

        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();
        $PayolutionFacade->preAuthorizePayment($idPayment);

        $PayolutionFacade->capturePayment($idPayment);

        $result = $PayolutionFacade->isCaptureApproved($orderTransfer);
        $this->assertTrue($result);
    }

    public function testIsRefundApproved()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);

        $checkoutRequestTransfer = $this->getCheckoutRequestTransfer();
        $PayolutionFacade->preCheckPayment($checkoutRequestTransfer);

        $idPayment = $this->getPaymentEntity()->getIdPaymentPayolution();
        $PayolutionFacade->preAuthorizePayment($idPayment);

        $PayolutionFacade->capturePayment($idPayment);
        $PayolutionFacade->refundPayment($idPayment);

        $result = $PayolutionFacade->isRefundApproved($orderTransfer);
        $this->assertTrue($result);
    }

}
