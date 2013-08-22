<?php

class Sao_Yves_Customer_Component_Model_Customer extends ProjectA_Yves_Model_Component_Model_Customer
{
    /**
     * @const string
     */
    const FORM_LOGINORREGISTER = 'loginOrRegister';

    public function initCustomerForms($params)
    {
        //init default forms
        $this->forms[self::FORM_LOGIN] = Sao_Yves_Application_Component_Model_FormsFactory::getCustomer_LoginForm();
        $this->forms[self::FORM_CREATE_ACCOUNT] = Sao_Yves_Application_Component_Model_FormsFactory::getCustomer_CreateAccountForm();
//        $this->forms[self::FORM_ADD_ADDRESS] = FormsFactory::getCustomer_AddAddressForm();
//        $this->forms[self::FORM_EDIT_ACCOUNT] = FormsFactory::getCustomer_EditAccountForm();
//        $this->forms[self::FORM_FORGOT_PASSWORD] = FormsFactory::getCustomer_ForgotPasswordForm();
//        $this->forms[self::FORM_NEW_PASSWORD] = FormsFactory::getCustomer_NewPasswordForm();

        $this->forms[self::FORM_LOGINORREGISTER] = Sao_Yves_Application_Component_Model_FormsFactory::getCustomer_LoginOrRegisterForm();
        // populate data to forms
        $this->populate($params);
    }

    /**
     * @return Sao_Yves_Customer_Component_Form_LoginOrRegister|null
     */
    public function getCustomerLoginOrRegisterForm()
    {
        if (isset($this->forms[self::FORM_LOGINORREGISTER])) {
            return $this->forms[self::FORM_LOGINORREGISTER];
        }
        return null;
    }

    /**
     * @param $redirectUrl
     * @return string
     */
    public function getFacebookLoginLink($redirectUrl)
    {
        $facebookAppId = '112537152116651';
        $facebookAuthUrl = 'https://www.facebook.com/dialog/oauth?client_id='
            . $facebookAppId
            . '&amp;redirect_uri='
            . $redirectUrl;
        
        return$facebookAuthUrl;
    }

    /**
     * @param Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer
     * @return Sao_Shared_Application_Transfer_Response
     */
    public function cartAbandonedUnsubscribe(Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer)
    {
        return $this->request->request('mail/yves/cart-abandoned-unsubscribe', $unsubscribeTransfer);
    }

    /**
     * @param Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer
     * @return Sao_Shared_Application_Transfer_Response
     */
    public function cartAbandonedSubscribe(Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer)
    {
        return $this->request->request('mail/yves/cart-abandoned-subscribe', $unsubscribeTransfer);
    }
}

