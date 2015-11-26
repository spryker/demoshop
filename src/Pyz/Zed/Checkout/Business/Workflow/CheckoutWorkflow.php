<?php

namespace Pyz\Zed\Checkout\Business\Workflow;

use Generated\Shared\Checkout\CheckoutRequestInterface;
use Generated\Shared\Checkout\CheckoutResponseInterface;
use Generated\Shared\Checkout\OrderInterface;
use Generated\Shared\Transfer\CheckoutRequestTransfer;
use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use PavFeature\Shared\Adyen\AdyenConstants;
use SprykerFeature\Shared\Library\Log;
use SprykerFeature\Zed\Checkout\Business\Workflow\CheckoutWorkflow as SprykerCheckoutWorkflow;
use Propel\Runtime\Propel;

class CheckoutWorkflow extends SprykerCheckoutWorkflow
{


    /**
     * @param CheckoutRequestTransfer $checkoutRequest
     *
     * @return CheckoutResponseTransfer
     */
    public function requestCheckout(CheckoutRequestTransfer $checkoutRequest)
    {
        $checkoutResponse = new CheckoutResponseTransfer();
        $checkoutResponse->setIsSuccess(false);

        $this->checkPreConditionsOverwritten($checkoutRequest, $checkoutResponse);

        if (!$this->hasErrorsOverwritten($checkoutResponse)) {
            $this->preHydrate($checkoutRequest, $checkoutResponse);

            $orderTransfer = $this->getOrderTransfer();
            $this->hydrateOrderOverwritten($orderTransfer, $checkoutRequest);

            $orderTransfer = $this->doSaveOrder($orderTransfer, $checkoutResponse);
            $checkoutResponse->setOrder($orderTransfer);

            if (!$this->hasErrorsOverwritten($checkoutResponse)) {
                $this->triggerStateMachineOverwritten($orderTransfer, $checkoutRequest);
                $this->executePostHooksOverwritten($orderTransfer, $checkoutResponse);

                $isSuccess = !$this->hasErrorsOverwritten($checkoutResponse);
                $checkoutResponse->setIsSuccess($isSuccess);
            }
        }

        return $checkoutResponse;
    }

    /**
     * @param OrderTransfer $orderTransfer
     * @param CheckoutResponseTransfer $checkoutResponse
     *
     * @return OrderInterface
     */
    protected function doSaveOrder(OrderTransfer $orderTransfer, CheckoutResponseTransfer $checkoutResponse)
    {
        Propel::getConnection()->beginTransaction();

        try {
            foreach ($this->saveOrderStack as $orderSaver) {
                $orderSaver->saveOrder($orderTransfer, $checkoutResponse);
            }

            if (!$this->hasErrorsOverwritten($checkoutResponse)) {
                Propel::getConnection()->commit();
            } else {
                Propel::getConnection()->rollBack();

                return $orderTransfer;
            }
        } catch (\Exception $e) {
            Propel::getConnection()->rollBack();

            $error = $this->handleCheckoutError($e);

            $checkoutResponse
                ->addError($error)
                ->setIsSuccess(false)
            ;
        }

        return $orderTransfer;
    }

    /**
     * @param CheckoutRequestInterface $checkoutRequest
     * @param CheckoutResponseInterface $checkoutResponse
     */
    protected function checkPreConditionsOverwritten(CheckoutRequestInterface $checkoutRequest, CheckoutResponseInterface $checkoutResponse)
    {
        try {
            foreach ($this->preConditionStack as $preCondition) {
                $preCondition->checkCondition($checkoutRequest, $checkoutResponse);
            }
        } catch (\Exception $e) {
            $error = $this->handleCheckoutError($e);

            $checkoutResponse
                ->addError($error)
                ->setIsSuccess(false)
            ;
        }
    }

    /**
     * @param CheckoutResponseInterface $checkoutResponse
     *
     * @return bool
     */
    protected function hasErrorsOverwritten(CheckoutResponseInterface $checkoutResponse)
    {
        return count($checkoutResponse->getErrors()) > 0;
    }

    /**
     * @param OrderInterface $orderTransfer
     * @param CheckoutRequestTransfer $checkoutRequest
     * @return void
     */
    protected function triggerStateMachineOverwritten(OrderInterface $orderTransfer, CheckoutRequestTransfer $checkoutRequest)
    {
        $itemIds = [];

        foreach ($orderTransfer->getItems() as $item) {
            $itemIds[] = $item->getIdSalesOrderItem();
        }

        $contextData = $this->createStateMachineContext($orderTransfer, $checkoutRequest);
        $this->omsFacade->triggerEventForNewOrderItems($itemIds, $contextData);
    }

    /**
     * FIXME HACK !!!
     * @param OrderInterface $orderTransfer
     * @param CheckoutRequestTransfer $checkoutRequest
     * @return array
     */
    protected function createStateMachineContext(OrderInterface $orderTransfer, CheckoutRequestTransfer $checkoutRequest)
    {
        $contextData = [];
        $encryptedCardData = $checkoutRequest->getAdyenPayment()->getPaymentDetail()->getEncryptedCardData();
        if ($encryptedCardData !== null) {
            $contextData[AdyenConstants::ADYEN_STATEMACHINE_CONTEXT_KEY_ENCRYPTED_CARD_DATA] = $encryptedCardData;
        }

        return $contextData;
    }

    /**
     * @param OrderTransfer $orderTransfer
     * @param CheckoutRequestTransfer $checkoutRequest
     * @return void
     */
    protected function hydrateOrderOverwritten(OrderTransfer $orderTransfer, CheckoutRequestTransfer $checkoutRequest)
    {
        foreach ($this->orderHydrationStack as $orderHydrator) {
            $orderHydrator->hydrateOrder($orderTransfer, $checkoutRequest);
        }
    }

    /**
     * @param OrderTransfer $orderTransfer
     * @param CheckoutResponseTransfer $checkoutResponse
     * @return void
     */
    protected function executePostHooksOverwritten($orderTransfer, $checkoutResponse)
    {
        try {
            foreach ($this->postSaveHookStack as $postSaveHook) {
                $postSaveHook->executeHook($orderTransfer, $checkoutResponse);
            }
        } catch (\Exception $e) {
            $error = $this->handleCheckoutError($e);

            $checkoutResponse
                ->addError($error)
                ->setIsSuccess(false)
            ;
        }
    }

}
