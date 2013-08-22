<?php
/**
 * @property Sao_Zed_Checkout_Component_Facade $facadeCheckout
 */
class Sao_Zed_Checkout_Module_Controller_Yves extends ProjectA_Zed_Checkout_Module_Controller_Yves implements
    ProjectA_Zed_Checkout_Component_Dependency_Facade_Interface,
    ProjectA_Zed_PaymentControl_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Calculation_Component_Dependency_Facade_Interface,
    Sao_Zed_Fulfillment_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Checkout_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_PaymentControl_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Calculation_Component_Dependency_Facade_Trait;
    use Sao_Zed_Fulfillment_Component_Dependency_Facade_Trait;

    /**
     * @param Sao_Shared_Sales_Transfer_Order $transferOrder
     *
     * @return Sao_Shared_Sales_Transfer_Order
     */
    public function recalculateAction(Sao_Shared_Sales_Transfer_Order $transferOrder)
    {
        return $this->facadeCalculation->recalculateOrder($transferOrder);
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $transferOrder
     *
     * @return Sao_Shared_Sales_Transfer_Order
     */
    public function saveOrderAction(Sao_Shared_Sales_Transfer_Order $transferOrder)
    {

        if (!$this->updatePaymentMethods($transferOrder)) {
            return $transferOrder;
        }

        if (!$this->checkPayment($transferOrder->getPayment())) {
            return $transferOrder;
        }

        if ($transferOrder->getManualCheckoutForced() || $transferOrder->getIsManualCheckout()) {
            $transferOrder->setCheckoutWorkflow(Sao_Zed_Checkout_Component_Interface_WorkflowConstants::DEFAULT_WORKFLOW_MANUAL_CHECKOUT);
        } else {
            $transferOrder->setCheckoutWorkflow(null);
        }

        $transferOrder = $this->facadeCalculation->recalculateOrder($transferOrder);
        $componentResult = $this->facadeCheckout->saveOrder($transferOrder);

        $this->setSuccess($componentResult->isSuccess());

        if ($componentResult->getTransfer()) {
            $redirectUrl = $componentResult->getTransfer()->getRedirectUrl();
            $this->setRedirectUrl($redirectUrl);
        }

        foreach ($componentResult->getErrors() as $error) {
            $this->addMessage($error);
        }
        return $transferOrder;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $transferOrder
     *
     * @return bool
     */
    protected function updatePaymentMethods(Sao_Shared_Sales_Transfer_Order $transferOrder)
    {
        $componentResult = $this->facadePaymentControl->updatePaymentMethods($transferOrder);
        if (!in_array(
            $transferOrder->getPayment()->getMethod(),
            $componentResult->getOfferedPaymentMethods()
        )
        ) {
            $this->setSuccess(false);
            $this->addMessage(ProjectA_Shared_Library_Messages::CHECKOUT_ERROR_PAYMENT_METHOD_NOT_ALLOWED);
            return false;
        }

        return true;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Payment $transferPayment
     *
     * @return bool
     */
    protected function checkPayment(Sao_Shared_Sales_Transfer_Order_Payment $transferPayment)
    {
        $method = 'check' . ucfirst(strtolower($transferPayment->getMethod()));
        if (!method_exists($this, $method)) {
            return true;
        }

        return $this->$method($transferPayment);

    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $transferOrder
     *
     * @return Sao_Shared_Payment_Transfer_Methods_Response
     */
    public function updatePaymentMethodsAction(Sao_Shared_Sales_Transfer_Order $transferOrder)
    {
        $componentResult = $this->facadePaymentControl->updatePaymentMethods($transferOrder);
        $this->setSuccess($componentResult->isSuccess());
        foreach ($componentResult->getErrors() as $error) {
            $this->addMessage($error);
        }
        return $componentResult->getTransfer();
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order
     * @return Sao_Shared_Sales_Transfer_Order
     */
    public function getCheckoutInformationAction(Sao_Shared_Sales_Transfer_Order $order)
    {
        $isManualCheckout = $this->facadeCheckout->isManualCheckout($order);
        if ($isManualCheckout) {
            $order->setQuotes(Generated_Shared_Library_TransferLoader::getFulfillmentQuoteCollection());
        }
        $order->setIsManualCheckout($isManualCheckout);

        return $this->facadeCalculation->recalculateOrder($order);
    }

}
