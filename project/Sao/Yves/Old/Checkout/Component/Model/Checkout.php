<?php

class Sao_Yves_Checkout_Component_Model_Checkout extends ProjectA_Yves_Model_Component_Model_Checkout
{

    /**
     * @param CHttpRequest $request
     *
     * @return void
     */
    public function preFilterInput(CHttpRequest $request)
    {
        if (isset($_POST['Sao_Yves_Checkout_Component_Form_Creditcard'])
            && isset($_POST['Sao_Yves_Checkout_Component_Form_Creditcard']['cc_number'])
        ) {
            $_POST['Sao_Yves_Checkout_Component_Form_Creditcard']['cc_number'] = preg_replace(
                '/\D/', '', $_POST['Sao_Yves_Checkout_Component_Form_Creditcard']['cc_number']
            );
        }

        return;
    }

    /**
     * @return array
     */
    protected function getPaymentFormMethods()
    {
        return array(
            $this->buildPaymentForm(
                ProjectA_Shared_Library_PaymentMethods::PAYMENT_METHOD_CC,
                Sao_Yves_Library_L::PAYMENT_CC,
                false,
                Sao_Yves_Application_Component_Model_FormsFactory::getCheckout_Payment_CreditcardForm()
            ),
            $this->buildPaymentForm(
                Sao_Shared_Library_PaymentMethods::PAYMENT_METHOD_TESTPAYMENT,
                Sao_Yves_Library_L::PAYMENT_TESTPAYMENT,
                Sao_Yves_Library_L::PAYMENT_TESTPAYMENT_INFO,
                Sao_Yves_Application_Component_Model_FormsFactory::getCheckout_Payment_TestPaymentForm()
            )
        );
    }

    /**
     * @return Sao_Shared_Application_Transfer_Response
     */
    public function getCheckoutInformation()
    {
        return $this->getModelOrder($this->getTransferOrder())->send('checkout/yves/get-checkout-information', 600);
    }

    /**
     * retrieves regions from database
     *
     * @return string
     */
    public function getRegions()
    {
        return ProjectA_Yves_Storage_Component_Model_Memcache::getInstance()->get(Sao_Shared_Library_Storage::getCountriesWithRegionsKey());
    }

    /**
     * retrieves json string from database
     *
     * @return string
     */
    public function getRegionsAsJson()
    {
        return ProjectA_Yves_Storage_Component_Model_Memcache::getInstance()->get(Sao_Shared_Library_Storage::getCountriesWithRegionsAsJSONKey());
    }

    /**
     * @see ProjectA_Yves_Model_Component_Model_Checkout::getErrors
     */
    public function getErrors(array $forms)
    {
        $errors = array();
        foreach ($forms as $form) {
            /* @var $form array | Sao_Yves_Library_Form_Model */
            if (!is_array($form)) {
                $form = array($form);
            }
            foreach ($form as $formModel) {
                /* @var $formModel Sao_Yves_Library_Form_Model */
                if ($formModel instanceof Sao_Yves_Library_Form_Model && $formModel->hasErrors()) {
                    // $errors = array_merge($errors, $formModel->getErrors());
                    $errors[get_class($formModel)] = $formModel->getErrors();
                }
            }
        }

        return $errors;
    }

}
