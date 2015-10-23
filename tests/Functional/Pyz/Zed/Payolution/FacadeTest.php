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

        $PayolutionFacade->isPreAuthorizationApproved($orderTransfer);
    }

    public function testIsReAuthorizationApproved()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);

        $PayolutionFacade->isReAuthorizationApproved($orderTransfer);
    }

    public function testIsReversalApproved()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);

        $PayolutionFacade->isReversalApproved($orderTransfer);
    }

    public function testIsCaptureApproved()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);

        $PayolutionFacade->isCaptureApproved($orderTransfer);
    }

    public function testIsRefundApproved()
    {
        $PayolutionFacade = $this->getFacade('SprykerFeature', 'Payolution');

        $orderTransfer = $this->getOrderTransfer();
        $PayolutionFacade->saveOrderPayment($orderTransfer);

        $PayolutionFacade->isRefundApproved($orderTransfer);
    }

}
