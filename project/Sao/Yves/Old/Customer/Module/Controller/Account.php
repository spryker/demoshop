<?php

/**
 * Account Controller
 */
class Sao_Yves_Customer_Module_Controller_Account extends Sao_Yves_Library_Base_Controller
{
    /**
     * @var  Sao_Yves_Customer_Component_Model_Customer
     */
    protected $model = null;

    protected $loginProtection = true;

    public function init()
    {
        parent::init();
        $this->model = Generated_Yves_ModelFactory::getYpCustomerModelCustomer();
        $this->model->setRequest(Sao_Yves_Application_Component_Model_Factory::getYlZedRequest());
        $this->model->initCustomerForms($this->getAllParams());

        $this->setIndex('noindex, nofollow');
    }

    public function actionIndex()
    {
        $this->setPageTitle(t(Sao_Yves_Library_L::CUSTOMER_ACCOUNT));
        $this->addBodyClass('customerAccount');

        $returnUrl = ProjectA_Yves_Library_Yii::app()->user->getReturnUrl();
        if (!empty($returnUrl)) {
            ProjectA_Yves_Library_Yii::app()->user->setReturnUrl(null);
            $this->redirect($this->createAbsoluteUrl($returnUrl));
        }

//        $aggregator = Sao_Yves_Tracking_Component_Model_TagCommander_Aggregator::getInstance();
//        $aggregator->setContentId('customer.profile');

        // $fbModel = ModelFactory::getYpCustomerModelFacebook();
        // $fbUser = $fbModel->getFbUser();
        $fbUser = false;

        $this->render('index', array('customer' => ProjectA_Yves_Library_Yii::app()->user->getCustomer(), 'isFbCustomer' => $fbUser));
    }

    public function actionEdit()
    {
//        $this->setPageTitle(t(L::CUSTOMER_ACCOUNT_EDIT));
//        $this->addBodyClass('customerEditAccount');
//
//        $aggregator = Sao_Yves_Tracking_Component_Model_TagCommander_Aggregator::getInstance();
//        $aggregator->setContentId('customer.profile.edit');
//
//        /* @var $form Sao_Yves_Customer_Component_Form_EditAccount */
//        $form = $this->model->getEditAccountForm();
//        /* @var $customer Sao_Shared_Customer_Transfer_Customer */
//        $customer = Yii::app()->user->getCustomer();
//
//        $data = $customer->toArray();
//        $oldPassword = $data['password'];
//        $data['password'] = '';
//        $data['date_of_birth'] = ProjectA_Shared_Library_Date::dateShort($data['date_of_birth'], null, false);
//
//        $form->populate($data);
//        $form->populate($data[Yp_Customer_Model_Customer::ARRAYKEY_NU3_CUSTOMER]);
//
//        $fbModel = ModelFactory::getYpCustomerModelFacebook();
//        $fbUser = $fbModel->getFbUser();
//        $fbEmail = null;
//        if ($fbUser) {
//            $fbEmail = $fbModel->getFbEmailAddress();
//        }
//        if ($fbEmail === $data['email'] && $form->hasElement('old_password') && $form->hasElement('password') && $form->hasElement('email')) {
//            $form->getElement('old_password')->setRequired(false)->setAttribute('class', 'hidden')->setLabelAttribute('class', 'hidden');
//            $form->getElement('password')->setAttribute('class', 'hidden')->setLabelAttribute('class', 'hidden');
//            $form->getElement('email')->setAttribute('class', 'hidden')->setLabelAttribute('class', 'hidden');
//        }
//
//        if ($this->getParam('Sao_Yves_Customer_Component_Form_EditAccount')) {
//            $form->populate($this->getParam('Sao_Yves_Customer_Component_Form_EditAccount'));
//
//            if ($form->validate()) {
//
//                $formValues = $form->getValues();
//                /**
//                 * I would have preferred this:
//                 * $identity = new Sao_Yves_Customer_Component_Model_Identity($formValues['old_email'], $formValues['old_password']);
//                 * and then
//                 * if (!$identity->authenticate()) {}
//                 * but unfortunately you can not make more than one request from yves to zed ;)
//                 */
//                if ($fbEmail !== $data['email'] && md5(PalShared_Config::get('salt') . $formValues['old_password']) !== $oldPassword) {
//                    $response = new Sao_Shared_Application_Transfer_Response();
//                    $response->addMessage((new Sao_Shared_Application_Transfer_Response_Message())->setMessage(t(L::WRONG_CUSTOMER_CREDENTIALS)));
//                    $this->addMessages($response);
//                    $this->redirect($this->createAbsoluteUrl(Yp_Routing_UrlManager::ROUTE_CUSTOMER_ACCOUNT_EDIT));
//                    return;
//                }
//                if (!$form->getElement('password')->getValue()) {
//                    $formValues['password'] = $formValues['old_password'];
//                }
//                $response = $this->model->updateCustomer($formValues);
//                if ($response instanceof Sao_Shared_Application_Transfer_Response && $response->getSuccess()) {
//                    $this->addSuccess(t(L::CUSTOMER_UPDATE_SUCCESS));
//                } else {
//                    $this->addMessages($response);
//                }
//
//                $this->redirect($this->createAbsoluteUrl(Yp_Routing_UrlManager::ROUTE_CUSTOMER_ACCOUNT_EDIT));
//            }
//        }
//
//        //cut out password
//        if (isset($form->password)) {
//            $form->password = '';
//        }
//
//
//        $this->render('edit', array('editAccountForm' => $form));
    }
}
