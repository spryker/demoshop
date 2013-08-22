<?php

/**
 * Index Controller
 */
class Sao_Yves_Transactionstatus_Module_Controller_Index extends Sao_Yves_Library_Base_Controller
{
    /**
     * @var  Sao_Yves_Customer_Component_Model_Customer
     */
    protected $model = null;

    private $isFbRegistration = false;

    const CONTENT_ID_INDEX = 'customer.login';

    /**
     *
     */
    public function init()
    {
        parent::init();
        $this->model = Generated_Yves_ModelFactory::getYpCustomerModelCustomer();
        $this->model->setRequest(Sao_Yves_Application_Component_Model_Factory::getYlZedRequest());
        $this->model->initCustomerForms($this->getAllParams());
        $this->layout = 'reduced';
        $this->setIndex('noindex, nofollow');
    }

    /**
     *
     */
    protected function handleRegisterRequest()
    {
        $registerForm = $this->getRegisterForm();

        if ($registerForm->validate()) {
            /*  @var $response Sao_Shared_Application_Transfer_Response */
            $response = $this->model->register($registerForm->getValues());
            if ($response instanceof Sao_Shared_Application_Transfer_Response && $response->getSuccess()) {

                /*@var Sao_Shared_Customer_Transfer_Customer $customer*/
                $customer = Generated_Shared_Library_TransferLoader::getCustomer();
                $customer->fromArray((array)$response->getTransfer(), true);

                ProjectA_Yves_Library_Yii::app()->user->setCustomer($customer);
                /* @var $identity Sao_Yves_Customer_Component_Model_Identity */
                $identity = $this->model->getIdentity($customer->getEmail(), $customer->getPassword());
                $identity->setTransferCustomer($customer);

                ProjectA_Yves_Library_Yii::app()->user->login($identity);

                $this->addSuccess(t(Sao_Yves_Library_L::CUSTOMER_ACCOUNT_SUCCESS));
                $this->redirectRegister();

            } else {
                $this->addMessages($response);
            }
        }
    }

    /**
     *
     */
    protected function handleFacebooklogin()
    {
        /*  @var $response Sao_Shared_Application_Transfer_Response */
        $response = $this->model->facebookLogin($this->getAllGetParams());
        if ($response instanceof Sao_Shared_Application_Transfer_Response && $response->getSuccess()) {
            $this->loginCustomer($response);
            $this->addSuccess(t(Sao_Yves_Library_L::CUSTOMER_ACCOUNT_SUCCESS));
            $this->redirectRegister();
        } else {
            $this->addMessages($response);
        }
    }

    /**
     * @return bool
     */
    protected function redirectRegister()
    {
//        $this->redirect($this->createAbsoluteUrl(Yp_Routing_UrlManager::ROUTE_CUSTOMER_ACCOUNT));
//        return true;

        if (ProjectA_Yves_Library_Yii::app()->user->getReturnUrl()) {
            $redirectTo = ((strpos(ProjectA_Yves_Library_Yii::app()->user->getReturnUrl(), 'checkout/') !== false)
                ? ProjectA_Yves_Library_Yii::app()->user->getReturnUrl()
                : Sao_Yves_Library_Routing_UrlManager::ROUTE_CART_MERGE . "?redirect="
                . ProjectA_Yves_Library_Yii::app()->user->getReturnUrl());
            $this->redirect($this->createAbsoluteUrl($redirectTo));
        } else {
            $this->redirect(
                $this->createAbsoluteUrl(
                    Sao_Yves_Library_Routing_UrlManager::ROUTE_CART_MERGE .
                    "?redirect=" . Sao_Yves_Library_Routing_UrlManager::ROUTE_CUSTOMER_ACCOUNT
                )
            );
        }
    }

    /**
     * @return Sao_Yves_Customer_Component_Form_CreateAccount|null
     */
    protected function getRegisterForm()
    {
        /* @var $registerForm Sao_Yves_Customer_Component_Form_CreateAccount */
        $registerForm = $this->model->getCreateAccountForm();
        $registerForm->populate((array)$this->getParam('Sao_Yves_Customer_Component_Form_CreateAccount'));
        return $registerForm;
    }


    /**
     *
     */
    protected function handleLoginRequest()
    {
        $loginForm = $this->getLoginForm();
        if ($loginForm->validate()) {
            $identity = $this->model->getIdentity($loginForm->email, $loginForm->password);
            if ($identity->authenticate()) {

                ProjectA_Yves_Library_Yii::app()->user->login($identity);

                if ($loginForm->getElement('remember')->getValue() === '1') {
                    $this->model->setRememberMe($loginForm->email, $loginForm->password);
                }

                $this->redirectLogin();
            } else {
                if ($identity->getResponse()) {
                    $this->addMessages($identity->getResponse());
                } else {
                    $this->addError(ProjectA_Shared_Library_Messages::CUSTOMER_LOGIN_FAILED);
                }
            }
        }
    }

//    protected function handleFbLoginRequest($redirectFallback = null)
//    {
//        $identity = $this->model->getIdentity($this->model->getFbEmailAddress(), null);
//        if ($identity->fbAuthenticate()) {
//            Yii::app()->user->login($identity);
//
//            $this->redirectLogin();
//        } else {
//            if ($identity->getResponse()) {
//                // $this->addMessages($identity->getResponse());
//                if (!$this->getParam('returnUrl') && !$redirectFallback) {
//                    $this->model->prefillRegisterForm($this->getRegisterForm());
//                    $this->isFbRegistration = true;
//                } else {
//                    if (!$this->getParam('returnUrl')) {
//                        $this->redirect($this->createAbsoluteUrl($redirectFallback));
//                    } else {
//                        $this->redirect($this->createAbsoluteUrl($this->getParam('returnUrl')));
//                    }
//                }
//            } else {
//                $this->addError(PalShared_Messages::CUSTOMER_LOGIN_FAILED);
//            }
//        }
//    }

//    /**
//     * @return bool
//     */
//    protected function handleAjaxLoginRequest()
//    {
//        $loginForm = $this->getLoginForm();
//        if ($loginForm->validate()) {
//            $identity = $this->model->getIdentity($loginForm->email, $loginForm->password);
//            if ($identity->authenticate()) {
//
//                Yii::app()->user->login($identity);
//
//                if ($loginForm->getElement('remember')->getValue() === '1') {
//                    $this->model->setRememberMe($loginForm->email, $loginForm->password);
//                }
//
//                echo CJSON::encode(array('redirect' => $this->getAjaxRedirectUrl()));
//                return true;
//            } else {
//
//                echo CJSON::encode(array('error' => t(PalShared_Messages::CUSTOMER_LOGIN_FAILED)));
//                return true;
//            }
//        } else {
//
//            echo CJSON::encode(array('error' => $loginForm->getErrors()));
//            return true;
//        }
//        return false;
//    }

//    /**
//     * @return string
//     */
//    protected function getAjaxRedirectUrl()
//    {
//        if (Yii::app()->user->getReturnUrl()) {
//            $redirectTo = (strpos(Yii::app()->user->getReturnUrl(), 'checkout/') !== false) ? Yii::app()->user->getReturnUrl() : Sao_Yves_Library_Routing_UrlManager::ROUTE_CUSTOMER_PREPROCESSING_CART . "?redirect=" . Yii::app()->user->getReturnUrl();
//        } else {
//            $redirectTo = Sao_Yves_Library_Routing_UrlManager::ROUTE_CUSTOMER_PREPROCESSING_CART . "?redirect=" . Sao_Yves_Library_Routing_UrlManager::ROUTE_CUSTOMER_ACCOUNT;
//        }
//        return $this->createAbsoluteUrl($redirectTo);
//    }

    /**
     * @return bool
     */
    protected function redirectLogin()
    {
        if (ProjectA_Yves_Library_Yii::app()->user->getReturnUrl()) {
            $redirectTo = ((strpos(ProjectA_Yves_Library_Yii::app()->user->getReturnUrl(), 'checkout/') !== false)
                ? ProjectA_Yves_Library_Yii::app()->user->getReturnUrl()
                : Sao_Yves_Library_Routing_UrlManager::ROUTE_CART_MERGE . "?redirect="
                . ProjectA_Yves_Library_Yii::app()->user->getReturnUrl());
            $this->redirect($this->createAbsoluteUrl($redirectTo));
        } else {
            $this->redirect($this->createAbsoluteUrl(Sao_Yves_Library_Routing_UrlManager::ROUTE_CART_MERGE .
            "?redirect=" . Sao_Yves_Library_Routing_UrlManager::ROUTE_CUSTOMER_ACCOUNT));
        }
        return true;
    }

    /**
     * @return Sao_Yves_Customer_Component_Form_Login|null
     */
    protected function getLoginForm()
    {
        $loginForm = $this->model->getLoginForm();
        $loginForm->populate((array)$this->getParam('Sao_Yves_Customer_Component_Form_Login'));
        return $loginForm;
    }

    protected function prepareLoginRegister()
    {
        /** @todo clarify if ROUTE_CUSTOMER_PREPROCESSING_CART is necessary */
        //check already logged in
        if (!ProjectA_Yves_Library_Yii::app()->user->getIsGuest()) {
            $this->redirect(
                $this->createAbsoluteUrl(
                    Sao_Yves_Library_Routing_UrlManager::ROUTE_CART_MERGE . "?redirect="
                    . Sao_Yves_Library_Routing_UrlManager::ROUTE_CUSTOMER_ACCOUNT
                )
            );
        }

//        $aggregator = Sao_Yves_Tracking_Component_Model_TagCommander_Aggregator::getInstance();
//        $aggregator->addPagetype(PalShared_Tracking::PAGE_TYPE_CHECKOUT);
//        $aggregator->setContentId('customer.register');

        $this->setPageTitle(t(Sao_Yves_Library_L::CUSTOMER_ACCOUNT));
        $this->addBodyClass('customerLogin');

        $returnUrl = $this->getParam('returnUrl');

        if ($returnUrl) {
            ProjectA_Yves_Library_Yii::app()->user->setReturnUrl($this->getParam('returnUrl'));
        }
        return $returnUrl;
    }

    /**
     *
     */
    public function actionIndex()
    {
        $returnUrl = $this->prepareLoginRegister();

        if ($this->getParam('Sao_Yves_Customer_Component_Form_Login')) {
            $this->handleLoginRequest();
        }

//        if ($this->model->getFbUser()) {
//            $this->handleFbLoginRequest('/' . Sao_Yves_Library_Routing_UrlManager::ROUTE_CUSTOMER_REGISTER);
//        }

        $aggregator = Sao_Yves_Tracking_Component_Model_TagCommander_Aggregator::getInstance();
//        $aggregator->setContentId(self::CONTENT_ID_INDEX);

        $this->render(
            'index', array(
                'loginForm'     => $this->model->getLoginForm(),
                'loginRoute'    => Sao_Yves_Library_Routing_UrlManager::ROUTE_LOGIN,
                'passwordRoute' => Sao_Yves_Library_Routing_UrlManager::ROUTE_FORGOT_PASSWORD,
                'registerRoute' => Sao_Yves_Library_Routing_UrlManager::ROUTE_CUSTOMER_REGISTER,
                'returnUrl'     => $returnUrl,
                // 'fbLoginUrl' => $this->model->getFbLoginLink(Yp_Routing_UrlManager::ROUTE_CUSTOMER_FACEBOOKLOGIN),
            )
        );
    }

    public function actionRegister()
    {
        $this->prepareLoginRegister();

        if ($this->getParam('Sao_Yves_Customer_Component_Form_CreateAccount')) {
            $this->handleRegisterRequest();
        }

//        if ($this->model->getFbUser()) {
//            $this->handleFbLoginRequest();
//        }
//
        $this->render(
            'register',
            array(
                'registerRoute'     => Sao_Yves_Library_Routing_UrlManager::ROUTE_CUSTOMER_REGISTER,
                'createAccountForm' => $this->model->getCreateAccountForm(),
                'isFbRegistration'  => $this->isFbRegistration,
                // 'switchRoute'       => Sao_Yves_Library_Routing_UrlManager::ROUTE_CUSTOMER_SWITCH
            )
        );
    }

//    public function actionSwitch()
//    {
//        $this->model->destroyFbSession();
//        $this->redirect($this->createAbsoluteUrl(Yp_Routing_UrlManager::ROUTE_LOGIN));
//    }


    public function actionAjaxlogin()
    {
//        if ($this->getParam('returnUrl')) {
//            Yii::app()->user->setReturnUrl($this->getParam('returnUrl'));
//        }
//
//        $this->handleAjaxLoginRequest();
    }


    public function actionLogout()
    {
        ProjectA_Yves_Library_Yii::app()->user->logout();
        Sao_Yves_Legacy_Component_Model_Session::getInstance()->logout();

        // kill cart cookies
        unset(ProjectA_Yves_Library_Yii::app()->request->cookies[Sao_Yves_Cart_Component_Model_Cart::COOKIE_GUEST_CART_HASH_KEY]);
        unset(ProjectA_Yves_Library_Yii::app()->request->cookies['cart_cookie']);

//        $this->model->destroyFbSession();
        if (isset(ProjectA_Yves_Library_Yii::app()->request->cookies[ProjectA_Yves_Model_Component_Model_Customer::AUTOLOGIN_COOKIE])) {
            unset(ProjectA_Yves_Library_Yii::app()->request->cookies[ProjectA_Yves_Model_Component_Model_Customer::AUTOLOGIN_COOKIE]);
        }
        $this->redirect($this->createAbsoluteUrl(Sao_Yves_Library_Routing_UrlManager::ROUTE_CUSTOMER_LEGACYLOGOUT));
    }


//    public function actionFacebookLogin()
//    {
//        $this->renderPartial('facebooklogin');
//    }
}
