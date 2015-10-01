<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Functional\Pyz\Zed\Payolution;

class StateMachineSubProcessCaptureTest extends AbstractStateMachineTest
{
    protected function _before()
    {
        parent::_before();

        $this->doCheckout();
        $this->omsFacadeMock->triggerEventForOneItem('payolution finish initiation', $this->orderItem, []);
        $this->omsFacadeMock->triggerEventForOneItem('ship', $this->orderItem, []);
    }

    public function testTransitionFromReadyForCaptureToCaptureAccepted()
    {
        $this->assertEquals('ready for payolution capture', $this->orderItem->getState()->getName());

        // 'payolution capture accepted' state will automatically onEnter into 'payolution capture finished'
        $this->omsFacadeMock->triggerEventForOneItem('payolution capture', $this->orderItem, []);
        $this->assertEquals('payolution capture finished', $this->orderItem->getState()->getName());
    }

    public function testTransitionFromReadyForCaptureToCaptureDeclined()
    {
        $this->expectCaptureFailure();

        $this->assertEquals('ready for payolution capture', $this->orderItem->getState()->getName());

        $this->omsFacadeMock->triggerEventForOneItem('payolution capture', $this->orderItem, []);
        $this->assertEquals('payolution capture declined', $this->orderItem->getState()->getName());
    }

    public function testTransitionFromCaptureDeclinedToCaptureDeclined()
    {
        $this->expectCaptureFailure();

        $this->omsFacadeMock->triggerEventForOneItem('payolution capture', $this->orderItem, []);
        $this->assertEquals('payolution capture declined', $this->orderItem->getState()->getName());

        $this->omsFacadeMock->triggerEventForOneItem('payolution retry capture', $this->orderItem, []);
        $this->assertEquals('payolution capture declined', $this->orderItem->getState()->getName());
    }

    public function testTransitionFromCaptureDeclinedToCaptureAccepted()
    {
        $this->expectCaptureFailure();

        $this->omsFacadeMock->triggerEventForOneItem('payolution capture', $this->orderItem, []);
        $this->assertEquals('payolution capture declined', $this->orderItem->getState()->getName());

        $this->expectCaptureSuccess();

        // 'payolution capture accepted' state will automatically onEnter into 'payolution capture finished'
        $this->omsFacadeMock->triggerEventForOneItem('payolution retry capture', $this->orderItem, []);
        $this->assertEquals('payolution capture finished', $this->orderItem->getState()->getName());
    }

}
