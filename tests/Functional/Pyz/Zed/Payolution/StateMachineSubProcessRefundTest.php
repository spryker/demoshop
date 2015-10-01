<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Functional\Pyz\Zed\Payolution;


class StateMachineSubProcessRefundTest extends AbstractStateMachineTest
{

    protected function _before()
    {
        parent::_before();

        $this->doCheckout();
        $this->omsFacadeMock->triggerEventForOneItem('payolution finish initiation', $this->orderItem, []);
        $this->omsFacadeMock->triggerEventForOneItem('ship', $this->orderItem, []);
        $this->omsFacadeMock->triggerEventForOneItem('payolution capture', $this->orderItem, []);
        $this->omsFacadeMock->triggerEventForOneItem('receive returns', $this->orderItem, []);
    }

    /**
     * Ful refund transition
     */
    public function testTransitionFromReadyForRefundToFulRefundAccepted()
    {
        $this->assertEquals('ready for payolution refund', $this->orderItem->getState()->getName());

        // 'payolution ful refund accepted' state will automatically onEnter into 'payolution refund finished'
        $this->omsFacadeMock->triggerEventForOneItem('payolution fully refund', $this->orderItem, []);
        $this->assertEquals('payolution refund finished', $this->orderItem->getState()->getName());
    }

    public function testTransitionFromReadyForRefundToRefundDeclined()
    {
        $this->expectRefundFailure();

        $this->assertEquals('ready for payolution refund', $this->orderItem->getState()->getName());

        $this->omsFacadeMock->triggerEventForOneItem('payolution fully refund', $this->orderItem, []);
        $this->assertEquals('payolution ful refund declined', $this->orderItem->getState()->getName());
    }

    public function testTransitionFromFulRefundDeclinedToFulRefundDeclined()
    {
        $this->expectRefundFailure();

        $this->omsFacadeMock->triggerEventForOneItem('payolution fully refund', $this->orderItem, []);
        $this->assertEquals('payolution ful refund declined', $this->orderItem->getState()->getName());

        $this->omsFacadeMock->triggerEventForOneItem('payolution retry fully refund', $this->orderItem, []);
        $this->assertEquals('payolution ful refund declined', $this->orderItem->getState()->getName());
    }

    public function testTransitionFromFulRefundDeclinedToFulRefundAccepted()
    {
        $this->expectRefundFailure();

        $this->omsFacadeMock->triggerEventForOneItem('payolution fully refund', $this->orderItem, []);
        $this->assertEquals('payolution ful refund declined', $this->orderItem->getState()->getName());

        $this->expectRefundSuccess();

        // 'payolution ful refund accepted' state will automatically onEnter into 'payolution refund finished'
        $this->omsFacadeMock->triggerEventForOneItem('payolution retry fully refund', $this->orderItem, []);
        $this->assertEquals('payolution refund finished', $this->orderItem->getState()->getName());
    }

    /**
     * Partial refund transition
     */
    public function testTransitionFromReadyForRefundToPartialRefundAccepted()
    {
        $this->assertEquals('ready for payolution refund', $this->orderItem->getState()->getName());

        // 'payolution partial refund accepted' state will automatically onEnter into 'payolution refund finished'
        $this->omsFacadeMock->triggerEventForOneItem('payolution partially refund', $this->orderItem, []);
        $this->assertEquals('payolution refund finished', $this->orderItem->getState()->getName());
    }

    public function testTransitionFromReadyForRefundToPartialRefundDeclined()
    {
        $this->expectRefundFailure();

        $this->assertEquals('ready for payolution refund', $this->orderItem->getState()->getName());

        $this->omsFacadeMock->triggerEventForOneItem('payolution partially refund', $this->orderItem, []);
        $this->assertEquals('payolution partial refund declined', $this->orderItem->getState()->getName());
    }

    public function testTransitionFromPartialRefundFailedToPartialRefundFailed()
    {
        $this->expectRefundFailure();

        $this->omsFacadeMock->triggerEventForOneItem('payolution partially refund', $this->orderItem, []);
        $this->assertEquals('payolution partial refund declined', $this->orderItem->getState()->getName());

        $this->omsFacadeMock->triggerEventForOneItem('payolution retry partially refund', $this->orderItem, []);
        $this->assertEquals('payolution partial refund declined', $this->orderItem->getState()->getName());
    }

    public function testTransitionFromPartialRefundFailedToPartialRefundAccepted()
    {
        $this->expectRefundFailure();

        $this->omsFacadeMock->triggerEventForOneItem('payolution partially refund', $this->orderItem, []);
        $this->assertEquals('payolution partial refund declined', $this->orderItem->getState()->getName());

        $this->expectRefundSuccess();

        // 'payolution partial refund accepted' state will automatically onEnter into 'payolution refund finished'
        $this->omsFacadeMock->triggerEventForOneItem('payolution retry partially refund', $this->orderItem, []);
        $this->assertEquals('payolution refund finished', $this->orderItem->getState()->getName());
    }

}
