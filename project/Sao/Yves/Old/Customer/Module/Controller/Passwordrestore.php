<?php
/**
 *
 */
class Sao_Yves_Customer_Module_Controller_Passwordrestore extends Sao_Yves_Library_Base_Controller
{
    /**
     * @var  Sao_Yves_Customer_Component_Model_Customer
     */
    protected $model = null;

    /**
     * @var bool
     */
    protected $loginProtection = false;

    /**
     *
     */
    public function init()
    {
        parent::init();
        $this->model = Generated_Yves_ModelFactory::getYpCustomerModelCustomer();
//        $this->model->setRequest(Factory::getYlZedRequest());
//        $this->model->initCustomerForms($this->getAllParams());
    }

    /**
     * This action renders and evaluates the password restore form which requests for an email address
     */
    public function actionIndex()
    {
//        $form = $this->model->getForgotPasswordForm();
//        $formValues = $this->getParam('Sao_Yves_Customer_Component_Form_ForgotPassword');
//
//        if ($formValues) {
//            $form->populate($formValues);
//
//            if ($form->validate()) {
//                $transfer = new Sao_Shared_Customer_Transfer_Customer();
//                $transfer->setEmail($formValues['emailaddress']);
//
//                //request to zed
//                $this->model->restorePasswordStart($transfer);
//                $this->addSuccess(t(L::CUSTOMER_PASSWORD_RESTORE_START_SUCCESS));
//            }
//        }
//        $this->render('index', array('forgotPasswordForm' => $form));
    }

    /**
     * This action handles the url from the previous sent email and offers the possibility to change the
     * current password
     */
    public function actionSet()
    {
//        $form = $this->model->getNewPasswordForm();
//        if ($this->getParam('Sao_Yves_Customer_Component_Form_NewPassword')) {
//            //Change PW form has been submitted
//            if ($form->validate()) {
//                $this->setNewPassword($form);
//            } else {
//                $this->renderForm($form);
//            }
//        } elseif ($this->validateRequest()->getSuccess()) {
//            $this->renderForm($form);
//        } else {
//            $this->redirect($this->createAbsoluteUrl(Yp_Routing_UrlManager::ROUTE_FORGOT_PASSWORD));
//        }
    }

    /**
     * Sends a request to zed in order to change the user pw if the form is valid
     *
     * @param $form
     */
    protected function setNewPassword($form)
    {
//        $formValues = $this->getParam('Sao_Yves_Customer_Component_Form_NewPassword');
//        $form->populate($formValues);
//        if ($form->validate()) {
//
//            $transfer = new Sao_Shared_Customer_Transfer_Customer();
//            $transfer->setRestorePasswordKey($this->getParam('h'));
//            $transfer->setPassword($formValues['password']);
//            $transfer->setIdCustomer((int)$this->getParam('u'));
//
//            $response = $this->model->restorePasswordSet($transfer);
//
//            if ($response->getSuccess()) {
//                $this->addSuccess(t(L::CUSTOMER_RESTORE_PASSWORD_SET_SUCCESS));
//                $this->redirect($this->createAbsoluteUrl(Yp_Routing_UrlManager::ROUTE_LOGIN));
//            } else {
//                $this->redirect($this->createAbsoluteUrl(Yp_Routing_UrlManager::ROUTE_FORGOT_PASSWORD));
//            }
//        }
    }

    /**
     * Renders the given form with required url parameters
     *
     * @param $form
     */
    protected function renderForm($form)
    {
//        $viewData = array();
//        $viewData['form'] = $form;
//        $viewData['url'] = $this->createAbsoluteUrl(Yp_Routing_UrlManager::ROUTE_FORGOT_PASSWORD_SET) .
//            '?u=' . $this->getParam('u') .
//            '&h=' . urlencode($this->getParam('h'));
//
//        $this->render('set', $viewData);
    }

    /**
     * Sends a request to Generated_Yves_Zed in order to validate the user and pw token couple
     *
     * @return Sao_Shared_Application_Transfer_Response
     */
    protected function validateRequest()
    {
//        $transfer = new Sao_Shared_Customer_Transfer_Customer();
//        $transfer->setRestorePasswordKey($this->getParam('h'));
//        $transfer->setIdCustomer((int)$this->getParam('u'));
//        return $this->model->restorePasswordCheck($transfer);
    }


}
