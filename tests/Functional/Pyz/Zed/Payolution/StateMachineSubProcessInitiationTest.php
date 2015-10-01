<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Functional\Pyz\Zed\Payolution;

class StateMachineSubProcessPreAuthorizationTest extends AbstractStateMachineTest
{

    /**
     * Pre-Authorize transition
     */
    public function testTransitionFromReadyForInitiationToPreAuthorizationAccepted()
    {
        $this->doCheckout();
        $this->assertEquals('payolution pre-authorization accepted', $this->orderItem->getState()->getName());
    }

    public function testTransitionFromReadyForInitiationToPreAuthorizationDeclined()
    {
        $this->expectPreAuthorizationFailure();
        $this->doCheckout();

        $this->assertEquals('payolution pre-authorization declined', $this->orderItem->getState()->getName());
    }

    public function testTransitionFromPreAuthorizationDeclinedToPreAuthorizationDeclined()
    {
        $this->expectPreAuthorizationFailure();
        $this->doCheckout();

        $this->assertEquals('payolution pre-authorization declined', $this->orderItem->getState()->getName());

        $this->omsFacadeMock->triggerEventForOneItem('payolution retry pre-authorize', $this->orderItem, []);
        $this->assertEquals('payolution pre-authorization declined', $this->orderItem->getState()->getName());
    }

    public function testTransitionFromPreAuthorizationDeclinedToPreAuthorizationAccepted()
    {
        $this->expectPreAuthorizationFailure();
        $this->doCheckout();

        $this->assertEquals('payolution pre-authorization declined', $this->orderItem->getState()->getName());

        $this->expectPreAuthorizationSuccess();
        $this->setUpFacades();

        $this->omsFacadeMock->triggerEventForOneItem('payolution retry pre-authorize', $this->orderItem, []);
        $this->assertEquals('payolution pre-authorization accepted', $this->orderItem->getState()->getName());
    }

    public function testTransitionFromReversalAcceptedToReadyForInitiation()
    {
        $this->doCheckout();

        $this->omsFacadeMock->triggerEventForOneItem('payolution revert', $this->orderItem, []);
        $this->assertEquals('payolution reversal accepted', $this->orderItem->getState()->getName());

        // 'ready for initiation' state will automatically onEnter into 'payolution-pre-authorization accepted'
        $this->omsFacadeMock->triggerEventForOneItem('payolution retry pre-authorize', $this->orderItem, []);
        $this->assertEquals('payolution pre-authorization accepted', $this->orderItem->getState()->getName());
    }

    /**
     * Re-Authorize transition
     */
    public function testTransitionFromPreAuthorizationAcceptedToReAuthorizationAccepted()
    {
        $this->doCheckout();

        $this->assertEquals('payolution pre-authorization accepted', $this->orderItem->getState()->getName());

        $this->omsFacadeMock->triggerEventForOneItem('payolution re-authorize', $this->orderItem, []);
        $this->assertEquals('payolution re-authorization accepted', $this->orderItem->getState()->getName());

    }

    public function testTransitionFromPreAuthorizationAcceptedToReAuthorizationDeclined()
    {
        $this->expectReAuthorizationFailure();
        $this->doCheckout();

        $this->assertEquals('payolution pre-authorization accepted', $this->orderItem->getState()->getName());

        $this->omsFacadeMock->triggerEventForOneItem('payolution re-authorize', $this->orderItem, []);
        $this->assertEquals('payolution re-authorization declined', $this->orderItem->getState()->getName());
    }

    public function testTransitionFromReAuthorizationDeclinedToReAuthorizationDeclined()
    {
        $this->expectReAuthorizationFailure();
        $this->doCheckout();

        $this->omsFacadeMock->triggerEventForOneItem('payolution re-authorize', $this->orderItem, []);
        $this->assertEquals('payolution re-authorization declined', $this->orderItem->getState()->getName());

        $this->omsFacadeMock->triggerEventForOneItem('payolution retry re-authorize', $this->orderItem, []);
        $this->assertEquals('payolution re-authorization declined', $this->orderItem->getState()->getName());
    }

    public function testTransitionFromReAuthorizationDeclinedToReAuthorizationAccepted()
    {
        $this->expectReAuthorizationFailure();
        $this->doCheckout();

        $this->omsFacadeMock->triggerEventForOneItem('payolution re-authorize', $this->orderItem, []);
        $this->assertEquals('payolution re-authorization declined', $this->orderItem->getState()->getName());

        $this->expectReAuthorizationSuccess();
        $this->setUpFacades();

        $this->omsFacadeMock->triggerEventForOneItem('payolution retry re-authorize', $this->orderItem, []);
        $this->assertEquals('payolution re-authorization accepted', $this->orderItem->getState()->getName());
    }

    /**
     * Reversal transition
     */
    public function testTransitionFromPreAuthorizationAcceptedToReversalAccepted()
    {
        $this->doCheckout();

        $this->assertEquals('payolution pre-authorization accepted', $this->orderItem->getState()->getName());

        $this->omsFacadeMock->triggerEventForOneItem('payolution revert', $this->orderItem, []);
        $this->assertEquals('payolution reversal accepted', $this->orderItem->getState()->getName());
    }

    public function testTransitionFromReAuthorizationAcceptedToReversalAccepted()
    {
        $this->doCheckout();

        $this->omsFacadeMock->triggerEventForOneItem('payolution re-authorize', $this->orderItem, []);
        $this->assertEquals('payolution re-authorization accepted', $this->orderItem->getState()->getName());

        $this->omsFacadeMock->triggerEventForOneItem('payolution revert', $this->orderItem, []);
        $this->assertEquals('payolution reversal accepted', $this->orderItem->getState()->getName());
    }

    public function testTransitionFromPreAuthorizationAcceptedToReversalDeclined()
    {
        $this->expectReversalFailure();
        $this->doCheckout();

        $this->assertEquals('payolution pre-authorization accepted', $this->orderItem->getState()->getName());

        $this->omsFacadeMock->triggerEventForOneItem('payolution revert', $this->orderItem, []);
        $this->assertEquals('payolution reversal declined', $this->orderItem->getState()->getName());
    }

    public function testTransitionFromReAuthorizationAcceptedToReversalDeclined()
    {
        $this->expectReversalFailure();
        $this->doCheckout();

        $this->omsFacadeMock->triggerEventForOneItem('payolution re-authorize', $this->orderItem, []);
        $this->assertEquals('payolution re-authorization accepted', $this->orderItem->getState()->getName());

        $this->omsFacadeMock->triggerEventForOneItem('payolution revert', $this->orderItem, []);
        $this->assertEquals('payolution reversal declined', $this->orderItem->getState()->getName());
    }

    public function testTransitionFromReversalDeclinedToReversalDeclined()
    {
        $this->expectReversalFailure();
        $this->doCheckout();

        $this->omsFacadeMock->triggerEventForOneItem('payolution revert', $this->orderItem, []);
        $this->assertEquals('payolution reversal declined', $this->orderItem->getState()->getName());

        $this->omsFacadeMock->triggerEventForOneItem('payolution retry revert', $this->orderItem, []);
        $this->assertEquals('payolution reversal declined', $this->orderItem->getState()->getName());
    }

    public function testTransitionFromReversalDeclinedToReversalAccepted()
    {
        $this->expectReversalFailure();
        $this->doCheckout();

        $this->omsFacadeMock->triggerEventForOneItem('payolution revert', $this->orderItem, []);
        $this->assertEquals('payolution reversal declined', $this->orderItem->getState()->getName());

        $this->expectReversalSuccess();
        $this->setUpFacades();

        $this->omsFacadeMock->triggerEventForOneItem('payolution retry revert', $this->orderItem, []);
        $this->assertEquals('payolution reversal accepted', $this->orderItem->getState()->getName());
    }

    /**
     * Exit transition
     */
    public function testTransitionFromPreAuthorizationAcceptedToPayolutionInitiationFinished()
    {
        $this->doCheckout();

        // 'payolution initiation finished' state will automatically onEnter into 'ready to be shipped'
        $this->omsFacadeMock->triggerEventForOneItem('payolution finish initiation', $this->orderItem, []);
        $this->assertEquals('ready to be shipped', $this->orderItem->getState()->getName());
    }

    public function testTransitionFromReAuthorizationAcceptedToPayolutionInitiationFinished()
    {
        $this->doCheckout();

        $this->omsFacadeMock->triggerEventForOneItem('payolution re-authorize', $this->orderItem, []);
        $this->assertEquals('payolution re-authorization accepted', $this->orderItem->getState()->getName());

        // 'payolution initiation finished' state will automatically onEnter into 'ready to be shipped'
        $this->omsFacadeMock->triggerEventForOneItem('payolution finish initiation', $this->orderItem, []);
        $this->assertEquals('ready to be shipped', $this->orderItem->getState()->getName());
    }

}
