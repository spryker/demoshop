<?php

/**
 * Checkout
 */
class Sao_Yves_Transactionstatus_Module_Controller_Index extends Sao_Yves_Library_Base_Controller
{


    /**
     * @var Sao_Yves_Checkout_Component_Model_Checkout $model
     */
    protected $model = null;

    /**
     * @var Sao_Yves_Checkout_Component_Form_Index
     */
    protected $indexForm;

    /**
     *
     */
    public function init()
    {
        parent::init();
        $this->model = Generated_Yves_ModelFactory::getYpCheckoutModelCheckout();
        $this->model->setTransferOrder($this->cart->getSalesOrder());
        $this->model->preFilterInput(ProjectA_Yves_Library_Yii::app()->request);
        $this->model->initForms();
        $this->layout = 'checkout';
        $this->setIndex('noindex, nofollow');
    }

    /**
     *
     */
    public function actionIndex()
    {
//        if (Yii::app()->user->getIsGuest()) {
        if (Sao_Yves_Legacy_Component_Model_Customer_User::getInstance()->isGuest()) {
            $this->redirect(
                $this->createAbsoluteUrl(Sao_Yves_Library_Routing_UrlManager::ROUTE_LOGIN) . "?returnUrl=" . Sao_Yves_Library_Routing_UrlManager::ROUTE_CHECKOUT
            );
        }

        if (!count($this->cart->getItems())) {
            $this->redirect($this->createAbsoluteUrl(Sao_Yves_Library_Routing_UrlManager::ROUTE_CART));
        }
//        // make some additional quantity validations
//        $cartItems = $this->cart->getOrderItemsAggregatedByQuantity(true);
//        if (!$this->cart->validateQuantities($cartItems)) {
//            $this->redirect($this->createAbsoluteUrl(Yp_Routing_UrlManager::ROUTE_CART_RECALCULATE));
//        }

        $indexForm = Sao_Yves_Application_Component_Model_FormsFactory::getCheckout_IndexForm();
        if ($indexForm->isSend() || $indexForm->isSendGet()) {
            $indexForm->populate($this->getAllParams());
            if ($indexForm->isValid()) {
                // Happy case
            } else {
                // Just reset, form is technically not necessary for checkout
                $indexForm = Sao_Yves_Application_Component_Model_FormsFactory::getCheckout_IndexForm();
            }
        }

        $cartItems = $this->cart->getItems(true);

        $aggregator = Sao_Yves_Tracking_Component_Model_TagCommander_Aggregator::getInstance();
        $aggregator->setCategories('address.shipping-billing');

        $session = Sao_Yves_Application_Component_Model_Factory::getSessionStorage();
        if ($session->isRegistered('registration')) {
            $aggregator->addParameter(Sao_Yves_Tracking_Component_Model_TagCommander_Constants::TC_REGISTRATION_COLLECTOR, 'registration');
        }

        $aggregator = Sao_Yves_Tracking_Component_Model_DoubleClick_Aggregator::getInstance();
        $aggregator->setPageType(Sao_Yves_Tracking_Component_Model_DoubleClick_Constants::PAGE_TYPE_CHECKOUT_SHIPPING_BILLING);

        $couponForm = Sao_Yves_Application_Component_Model_FormsFactory::getCouponForm();
        //disable coupon code on init
        if ($this->cart->getSalesOrder()->getCouponCode()) {
            $couponForm->disable();
        }
        $couponForm->populate($this->getAllParams());

        $this->setPageTitle('Checkout');
        $this->addBodyClass('checkout');

//        $this->cart->addZipcodeIfNoShippmentCostSet();
        $countryModel = new ProjectA_Yves_Country_Component_Model_Country();
        $this->render(
            'index', array_merge(
                $this->getForms(),
                array(
                    'regions'                    => $this->model->getRegions(),
                    'couponForm'                 => $couponForm,
                    'salesOrder'                 => $this->cart->getSalesOrder(),
                    'items'                      => $cartItems,
                    // Yii::app()->user->isGuest()
                    'isGuest'                    => Sao_Yves_Legacy_Component_Model_Customer_User::getInstance()->isGuest(),
                    'billingFormId'              => false,
                    'alternativeShippingAddress' => false,
                    'shippingFormId'             => false,
                    'indexForm'                  => $indexForm,
                    'countries'                  => $countryModel->getCountryList()
                )
            )
        );
    }

    /**
     *
     */
//    public function actionFinish()
//    {
//        var_dump('checkout/index/finish');
//        exit();
//
//        if (!count($this->cart->getItems())) {
//            $this->redirect($this->createAbsoluteUrl(Yp_Routing_UrlManager::ROUTE_CART));
//        }
//
//        $couponForm = FormsFactory::getCouponForm();
//        //disable coupon code on init
//        if ($this->cart->getSalesOrder()->getCouponCode()) {
//            $couponForm->disable();
//        }
//        $couponForm->populate($this->getAllParams());
//
////        // if (Yii::app()->user->getIsGuest()) {
////        Sao_Yves_Legacy_Component_Model_Customer_User::getInstance()->isGuest()
////            $facebookModel = ModelFactory::getYpCustomerModelFacebook();
////            $facebookModel->prefillRegisterForm($this->model->getBillingAddressForm());
////            $facebookModel->prefillRegisterForm($this->model->getCreateAccountForm());
////        }
//
//        $aggregator = Sao_Yves_Tracking_Component_Model_TagCommander_Aggregator::getInstance();
////        $aggregator->setContentId('checkout.address-payment');
////        $aggregator->addPagetype(PalShared_Tracking::PAGE_TYPE_CHECKOUT);
//
//        $this->setPageTitle('Checkout');
//        $this->addBodyClass('checkout');
//
////        $this->cart->addZipcodeIfNoShippmentCostSet();
//
//        $this->render(
//            'index', array_merge(
//                $this->getForms(),
//                array(
//                    'couponForm'                 => $couponForm,
//                    'salesOrder'                 => $this->cart->getSalesOrder(),
//                    'items'                      => $this->cart->getItems(true),
//                    // Yii::app()->user->isGuest(),
//                    'isGuest'                    => Sao_Yves_Legacy_Component_Model_Customer_User::getInstance()->isGuest(),
//                    'billingFormId'              => false,
//                    'alternativeShippingAddress' => false,
//                    'shippingFormId'             => false
//                )
//            )
//        );
//    }

    /**
     * TODO
     * be aware:
     * only actionAjaxsaveorder used right now.
     * some stuff that has been added there is missing here
     */
//    public function actionSaveorder()
//    {
//        $forms = $this->getForms();
//
//        $params = $this->getAllParams();
////        $isGuest = Yii::app()->user->isGuest();
//        $isGuest = Sao_Yves_Legacy_Component_Model_Customer_User::getInstance()->isGuest();
//
//        $couponForm = FormsFactory::getCouponForm();
//        //disable coupon code on init
//        if ($this->cart->getSalesOrder()->getCouponCode()) {
//            $couponForm->disable();
//        }
//
//        $couponForm->populate($params);
//
//        if ($isGuest) {
//            $registerForm = $this->model->getCreateAccountForm();
//            $registerForm->populate($params);
//        } else {
//            // if customer is logged in we don't need any
//            // createAccountForm
//            unset($forms['createAccountForm']);
//        }
//
//        if ($this->model->validateForms($forms)) {
//            $transferResponse = $this->model->saveOrder();
//            if ($transferResponse instanceof Sao_Shared_Application_Transfer_Response && $transferResponse->getSuccess()) {
//                $this->cart->setSalesOrder(PalShared_Transfer_Factory::getSalesOrder($transferResponse->getTransfer()));
//                $this->redirect(
//                    ($transferResponse->getRedirectUrl()) ? $transferResponse->getRedirectUrl()
//                        : $this->createAbsoluteUrl(Yp_Routing_UrlManager::ROUTE_CHECKOUT_SUCCESS)
//                );
//            } else {
//                $this->addMessages($transferResponse);
//                $this->redirect('/checkout/');
//            }
//            $this->addMessages($transferResponse);
//        } else {
//            //echo '<pre>' . print_r("bums", true) . '</pre>';die;
//            var_dump($this->model->getErrors($forms));
//            exit();
//        }
//
//        $billingFormId = false;
//        $shippingFormId = false;
//        $alternativeShippingAddress = false;
//
//        // check if user already put in a alternative billings form
//        if (isset($params['Sao_Yves_Checkout_Component_Form_Billing']) && isset($params['Sao_Yves_Checkout_Component_Form_Billing']['billing_address'])) {
//            $billingFormId = $params['Sao_Yves_Checkout_Component_Form_Billing']['billing_address'];
//        }
//
//        // check if user already wanted to use a alternative shippingform
//        if (
//            isset($params['Sao_Yves_Checkout_Component_Form_AlternativeShippingAddress'])
//            && isset($params['Sao_Yves_Checkout_Component_Form_AlternativeShippingAddress']['alternative_shipping_address'])
//        ) {
//            $alternativeShippingAddress
//                = $params['Sao_Yves_Checkout_Component_Form_AlternativeShippingAddress']['alternative_shipping_address'];
//        }
//
//        // check if user already put in a alternative shippingform
//        if (isset ($params['Sao_Yves_Checkout_Component_Form_Shipping']) && isset($params['Sao_Yves_Checkout_Component_Form_Shipping']['shipping_address'])) {
//            $shippingFormId = $params['Sao_Yves_Checkout_Component_Form_Shipping']['shipping_address'];
//        }
//
//        $this->render(
//            'index', array_merge(
//                $forms,
//                array(
//                    'couponForm'                 => $couponForm,
//                    'loginForm'                  => FormsFactory::getCustomer_LoginForm(),
//                    'salesOrder'                 => $this->cart->getSalesOrder(),
//                    'items'                      => $this->cart->getItems(true),
//                    'isGuest'                    => $isGuest,
//                    'order'                      => $this->model->getTransferOrder(),
//                    //                    'cms' => array(
//                    //                        //todo get cms key dynamicaly
//                    //                        'terms' => $this->getCsmPage('DE_urlkey_cms_/agb'),
//                    //                        'withdrawal' => $this->getCsmPage('DE_urlkey_cms_/widerruf'),
//                    //                    ),
//                    //                    'validationErrors' => $this->model->getErrors($forms),
//                    'billingFormId'              => $billingFormId,
//                    'alternativeShippingAddress' => $alternativeShippingAddress,
//                    'shippingFormId'             => $shippingFormId
//                )
//            )
//        );
//    }

//    /**
//     * @param $cmsKey
//     *
//     * @return mixed
//     */
//    protected function getCsmPage($cmsKey)
//    {
//        $page = Factory::getStorage()->get($cmsKey);
//        if (!isset($page['content'])) {
//            return;
//        }
//        return $page;
//    }


    /**
     *
     */
    public function actionAjaxsaveorder()
    {
        $forms = $this->getForms();
        $params = $this->getAllParams();

//        $isGuest = Yii::app()->user->isGuest();
        $isGuest = Sao_Yves_Legacy_Component_Model_Customer_User::getInstance()->isGuest();
        $transferSalesOrder = $this->model->getTransferOrder();

        /* @var Sao_Shared_Sales_Transfer_Order $transferSalesOrder */
        if (array_key_exists('manual', $params) && $params['manual'] == 'true') {
            $transferSalesOrder->setManualCheckoutForced(true);
            $transferSalesOrder->setIsManualCheckout(true);
        }

        $couponForm = Sao_Yves_Application_Component_Model_FormsFactory::getCouponForm();
        //disable coupon code on init
        if ($transferSalesOrder->getCouponCode()) {
            $couponForm->disable();
        }

        if ($transferSalesOrder->getIsManualCheckout()) {
            unset($forms['paymentForm']);
            unset($forms['paymentForms']);
        }

        $couponForm->populate($params);

        if ($isGuest) {
            $registerForm = $this->model->getCreateAccountForm();
            $registerForm->populate($params);
        } else {
            // if customer is logged in we don't need any
            // createAccountForm
            unset($forms['createAccountForm']);
        }

        if ($this->model->validateForms($forms)) {
            $transferResponse = $this->model->saveOrder();

            //clear cart if requested
            /* @var Sao_Shared_Sales_Transfer_Order $transfer */
            $transfer = Generated_Shared_Library_TransferLoader::getSalesOrder($transferResponse->getTransfer());
            if ($transfer->getClearSessionCart()) {
                (new ProjectA_Shared_Library_Zed_Request())->unlockRequest();
                $this->cart->clear();
            }

            if ($transferResponse instanceof Sao_Shared_Application_Transfer_Response && $transferResponse->getSuccess()) {
                // success page switch
                if ($transfer->getRedirectUrl()) {
                    // paypal
                    $successPageUrl = $transfer->getRedirectUrl();
                } else {
                    // cc
                    $successPageUrl = $this->createAbsoluteUrl(Sao_Yves_Library_Routing_UrlManager::ROUTE_CHECKOUT_SUCCESS);
                }

                Sao_Yves_Application_Component_Model_Factory::getSessionStorage()->set('transferOrder', $transfer);
                $this->echoJson($this->getJsonOrderSaveResponse(true, $successPageUrl));
            } else {
                $messageArray = $this->flattenMessageArray($transferResponse->getMessages());
                $redirectUrl = '#step:payment';
                if (in_array(Sao_Shared_Library_Messages::CHECKOUT_ERROR_ORDER_NOT_SAVED, $messageArray) ||
                    in_array(Sao_Shared_Library_Messages::CHECKOUT_ERROR_WORKFLOW_VALIDATION_IS_MANUAL_CHECKOUT, $messageArray) ||
                    in_array(Sao_Shared_Library_Messages::CHECKOUT_ERROR_WORKFLOW_VALIDATION_IS_NOT_MANUAL_CHECKOUT, $messageArray)
                ) {
                    $this->addError(t(Sao_Shared_Library_Messages::CHECKOUT_ERROR_TECHNICAL_ISSUE));
                    $redirectUrl = '/cart';
                } elseif (in_array(Sao_Shared_Library_Messages::CHECKOUT_ERROR_OUT_OF_STOCK, $messageArray)) {
                    $this->addError(t(Sao_Shared_Library_Messages::CHECKOUT_ERROR_OUT_OF_STOCK));
                    $redirectUrl = '/cart';
                }
                $messageArray = $this->flattenMessageArray($transferResponse->getMessages(), true);

                $this->echoJson($this->getJsonOrderSaveResponse(false, $redirectUrl, $messageArray));
            }
        } else {
            // there have been validation errors
            $validationErrorArray = $this->model->getErrors($forms);

            // check if user already wanted to use a alternative shippingform
            if (isset($params['Sao_Yves_Checkout_Component_Form_AlternativeShippingAddress'])
                && isset($params['Sao_Yves_Checkout_Component_Form_AlternativeShippingAddress']['alternative_shipping_address'])
                && strtolower($params['Sao_Yves_Checkout_Component_Form_AlternativeShippingAddress']['alternative_shipping_address']) == 'on'
            ) {
                $validationErrorArray = $this->filterValidationErrors($validationErrorArray);
            }

            $this->echoJson($this->getJsonOrderSaveResponse(false, '', array(), $validationErrorArray));
        }
    }

    /**
     * this function should get rid of all duplicate entries in the 2 address pages
     *
     * @param $validationErrorArray
     * @return mixed
     */
    protected function filterValidationErrors($validationErrorArray)
    {
        unset($validationErrorArray['Sao_Yves_Checkout_Component_Form_BillingAddress']);
        return $validationErrorArray;
    }



    public function actionGetCheckoutInformation()
    {
        $shippingAddressForm = $this->model->getShippingAddressForm();
        $session = Sao_Yves_Application_Component_Model_Factory::getSessionStorage();
        /* @var Sao_Shared_Sales_Transfer_Order $transferOrder */
        $transferOrder = $this->model->getTransferOrder();
        /* @var Sao_Yves_Checkout_Component_Form_ShippingAddress $shippingAddressForm */
        if ($shippingAddressForm->iso2_country && $shippingAddressForm->city) {
            $shippingAddress = $transferOrder->getShippingAddress();
            $shippingAddress->setIso2Country($shippingAddressForm->iso2_country);
            $shippingAddress->setZipCode($shippingAddressForm->zip_code);
            $shippingAddress->setRegion($shippingAddressForm->region);
            $shippingAddress->setCity($shippingAddressForm->city);
            $transferOrder->setShippingAddress($shippingAddress);
            $this->model->setTransferOrder($transferOrder);

            $transferResponse = $this->model->getCheckoutInformation();
            if ($transferResponse instanceof Sao_Shared_Application_Transfer_Response && $transferResponse->getSuccess()) {
                $transferOrder = Generated_Shared_Library_TransferLoader::getSalesOrder($transferResponse->getTransfer());
                $this->cart->setSalesOrder($transferOrder);
                $this->echoJson($this->getJsonCheckoutInformationResponse(true, $transferOrder, $transferOrder->getIsManualCheckout()));
            }
        } else {
            // something was wrong
            $this->echoJson($this->getJsonCheckoutInformationResponse(false, $transferOrder, true));
        }
    }

    /**
     * @param string $success
     * @param string $url
     * @param array $messages
     * @param array $errors
     * @return Sao_Shared_Application_Transfer_AjaxResponse
     */
    protected function getJsonOrderSaveResponse($success, $url, array $messages = array(), array $errors = array())
    {
        $ajaxResponse = Generated_Shared_Library_TransferLoader::getAjaxResponse();
        $ajaxResponseData = array(
            'messages'         => array(
                'error' => $messages,
//                removed as per request by tomacz as they were hardcoded empty anyway
//                'info'    => array(),
//                'success' => array(),
            ),
            'validationErrors' => $errors,
        );

        if ($url) {
            $ajaxResponseData['url'] = $url;
        }

        $ajaxResponseData = $this->helperFilterEmptyNodes($ajaxResponseData);

        $ajaxResponse->setData($ajaxResponseData);
        $ajaxResponse->setResult($success ? 'success' : 'error');

        return $ajaxResponse;
    }

    /**
     * @param bool $success
     * @param Sao_Shared_Sales_Transfer_Order $order
     * @param bool $isManualCheckout
     * @return Sao_Shared_Application_Transfer_AjaxResponse
     */
    protected function getJsonCheckoutInformationResponse($success, Sao_Shared_Sales_Transfer_Order $order, $isManualCheckout = false)
    {
        $ajaxResponse = Generated_Shared_Library_TransferLoader::getAjaxResponse();
        $ajaxResponseData = array(
            'cart'   => array(
                'subtotalWithoutExpenses'       => ProjectA_Shared_Library_Currency::format((int)round($order->getTotals()->getSubtotalWithoutItemExpenses(), 0)),
                'grandTotal'                    => ProjectA_Shared_Library_Currency::format((int)round($order->getTotals()->getGrandTotal(), 0)),
                'freightCosts'                  => ProjectA_Shared_Library_Currency::format((int)round($order->getTotals()->getFreightCosts(), 0)),
                'customsAndDuties'              => ProjectA_Shared_Library_Currency::format((int)round($order->getTotals()->getCustomsAndDuties(), 0)),
                'orderExpensesTotal'            => ProjectA_Shared_Library_Currency::format((int)round($order->getTotals()->getOrderExpensesTotal(), 0)),
                'itemExpensesTotal'             => ProjectA_Shared_Library_Currency::format((int)round($order->getTotals()->getItemExpensesTotal(), 0)),
                'discount'                      => ProjectA_Shared_Library_Currency::format((int)round($order->getTotals()->getDiscount(), 0)),
                'grandTotalWithoutDiscounts'    => ProjectA_Shared_Library_Currency::format((int)round($order->getTotals()->getGrandTotalWithoutDiscounts(), 0)),
                'taxes'                         => ProjectA_Shared_Library_Currency::format((int)round($order->getTotals()->getTax()->getTotalAmount() + $order->getTotals()->getStateTaxAmount(), 0)),
            ),
            'manual' => $isManualCheckout,
        );

        $ajaxResponse->setData($ajaxResponseData);
        $ajaxResponse->setResult($success ? 'success' : 'error');

        return $ajaxResponse;
    }

    /**
     * @param Sao_Shared_Application_Transfer_Response_Message_Collection $collectionMessages
     * @return array
     */
    protected function  flattenMessageArray(Sao_Shared_Application_Transfer_Response_Message_Collection $collectionMessages, $translate = false)
    {
        $messages = [];

        /** @var $transferMessage Sao_Shared_Application_Transfer_Response_Message */
        foreach ($collectionMessages AS $transferMessage) {
            $messages[] = ($translate) ? t($transferMessage->getMessage()) : $transferMessage->getMessage();
        }

        return $messages;
    }

    /**
     * @return array
     */
    protected function getForms()
    {
        return array(
            'billingAddressForm'             => $this->model->getBillingAddressForm(),
            'newBillingForm'                 => $this->model->getNewBillingForm(),
            'billingForms'                   => (array)$this->model->getBillingForms(),

            'shippingAddressForm'            => $this->model->getShippingAddressForm(),
            'newShippingForm'                => $this->model->getNewShippingForm(),
            'shippingForms'                  => (array)$this->model->getShippingForms(),

            'paymentForm'                    => $this->model->getPaymentForm(),
            'paymentForms'                   => (array)$this->model->getPaymentForms(),

            'alternativeShippingAddressForm' => $this->model->getAlternativeShippingAddressForm(),
            'createAccountForm'              => $this->model->getCreateAccountForm(),
            'agreementForm'                  => $this->model->getAgreementForm(),


        );
    }

    /**
     * @return Sao_Shared_Sales_Transfer_Order
     */
    protected function getRecalculatedSalesOrder()
    {
//        $transferResponse = $this->model->getRecalculatedSalesOrder();
//        if ($transferResponse instanceof Sao_Shared_Application_Transfer_Response && $transferResponse->getSuccess()) {
//            $this->cart->setSalesOrder(PalShared_Transfer_Factory::getSalesOrder($transferResponse->getTransfer()));
//        }
//        return $this->cart->getSalesOrder();
    }

    /**
     * @return bool
     */
    public function actionGetcart()
    {
//        $salesOrder = $this->getRecalculatedSalesOrder();
//        $items = $this->cart->getOrderItemsAggregatedByQuantity(true);
//
//        $skus = array();
//        foreach (Factory::getCartComponent()->getItems() as $item) {
//            $skus[] = $item->getSku();
//        }
//        $products = Factory::getProductComponent()->getBySkus($skus, false);
//        if (!$products) {
//            return true;
//        }
//
//        echo $this->renderPartial(
//            'checkout/partial/cart',
//            array(
//                'salesOrder' => $salesOrder,
//                'items' => $items,
//            ), true
//        );
//        return true;
    }

    /**
     * add coupon to cart
     *
     * @return bool
     */
    public function actionAddCoupon()
    {
//        $status = 'FAIL';
//
//        $couponForm = FormsFactory::getCouponForm();
//        if ($couponForm->isSend()) {
//            $couponForm->populate($this->getAllParams());
//            if ($couponForm->isValid()) {
//                if ($couponForm->remove) {
//                    $response = $this->cart->removeCoupon($this->cart->getSalesOrder());
//                    if ($response->getSuccess()) {
//                        $couponForm->enable();
//                    }
//                } else {
//                    $response = $this->cart->addCoupon($couponForm->code, $this->cart->getSalesOrder());
//                    if ($response->getSuccess()) {
//                        $couponForm->disable();
//                    }
//                }
//
//                if ($response->getSuccess()) {
//                    $salesOrder = Generated_Shared_Library_TransferLoader::getSalesOrder();
//                    $salesOrder->fromArray($response->getTransfer());
//                    $this->cart->setSalesOrder($salesOrder); //memcache storage
//
//                    $status = 'SUCCESS';
//                }
//            }
//        }
//
//        if ( isset( $response ) ) {
//            $message = t(constant('L::' . $response->getMessages()->getFirstItem()->getMessage()));
//        } else {
//            $message = t(L::CART_ERROR_ADD_COUPON_CODE);
//        }
//
//        echo CJSON::encode(
//            array(
//                'status' => $status,
//                'message' => $message
//            )
//        );
//
//        return true;
    }

    /**
     * @param array $array
     *
     * @return array
     */
    protected function helperFilterEmptyNodes(array $array)
    {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                $v = $this->helperFilterEmptyNodes($v);
                if (!count($v)) {
                    unset($array[$k]);
                }
            } elseif ($v === null || $v === '') {
                unset($array[$k]);
            }
        }
        return $array;
    }
}
