<?php

/**
 * Address Controller
 */
class Sao_Yves_Customer_Module_Controller_Address extends Sao_Yves_Library_Base_Controller
{
    /**
     * @var  Sao_Yves_Customer_Component_Model_Customer
     */
    protected $model = null;

//    protected $loginProtection = true;

//    const CONTENT_ID_INDEX = 'customer.address';
//    const CONTENT_ID_ADDRESS_ADD = 'customer.address.add';
//    const CONTENT_ID_ADDRESS_EDIT = 'customer.address.edit';

    public function init()
    {
        parent::init();
        $this->model = Generated_Yves_ModelFactory::getYpCustomerModelCustomer();
//        $this->model->setRequest(Factory::getYlZedRequest());
//        $this->model->initCustomerForms($this->getAllParams());
    }

    public function actionIndex()
    {
//        $aggregator = Sao_Yves_Tracking_Component_Model_TagCommander_Aggregator::getInstance();
//        $aggregator->setContentId(self::CONTENT_ID_INDEX);
//
//        $this->setPageTitle(t(L::CUSTOMER_ADDRESSES));
//        $this->addBodyClass('customerAccount');
//        $this->render('index', array(
//                'addresses' => Yii::app()->user->getCustomer()->getAddresses(),
//                'customer' => Yii::app()->user->getCustomer()
//            ));
    }

    /**
     */
    public function actionAdd()
    {
//        $this->setPageTitle(t(L::CUSTOMER_ADD_ADDRESS));
//        $this->addBodyClass('customerAccount');
//
//        $aggregator = Sao_Yves_Tracking_Component_Model_TagCommander_Aggregator::getInstance();
//        $aggregator->setContentId(self::CONTENT_ID_ADDRESS_ADD);
//
//        $form = $this->model->getAddAddressForm();
//
//        if ($this->getParam('Sao_Yves_Customer_Component_Form_AddAddress')) {
//            $form->populate($this->getParam('Sao_Yves_Customer_Component_Form_AddAddress'));
//            if ($form->validate()) {
//
//                $address = Generated_Shared_Library_TransferLoader::getCustomerAddress();
//                $address->fromArray($form->getValues(), true);
//                $address->setFkCustomer(Yii::app()->user->getCustomer()->getIdCustomer());
//                $address->setCustomerId($address->getFkCustomer());
//
//                $nu3Address = new Sao_Shared_Customer_Transfer_AddressNu3();
//                $nu3Address->fromArray($form->getValues(), true);
//                $address->setNu3Address($nu3Address);
//
//                //TODO mock to convert string from dropdown to int :-(
//                //$address->setIso2Country($address->getIso2Country());
//
//                $response = $this->model->addAddress($address);
//                if ($response->getSuccess()) {
//                    Yii::app()->user->setCustomer(PalShared_Transfer_Factory::getCustomer($response->getTransfer(), true));
//
//                    $this->addSuccess(t(L::CUSTOMER_ADDRESS_SUCCESS));
//                    $this->redirect($this->createAbsoluteUrl(Yp_Routing_UrlManager::ROUTE_CUSTOMER_ADDRESS));
//                } else {
//                    $this->addMessages($response);
//                }
//            }
//        }
//
//        $this->render('add', array('form' => $form));
    }

    public function actionEdit()
    {
//        $this->setPageTitle(t(L::CUSTOMER_ADD_ADDRESS));
//        $this->addBodyClass('customerAccount');
//
//
//        $aggregator = Sao_Yves_Tracking_Component_Model_TagCommander_Aggregator::getInstance();
//        $aggregator->setContentId(self::CONTENT_ID_ADDRESS_EDIT);
//
//        $form = $this->model->getAddAddressForm();
//        $address = $this->model->getAddress($this->getParam('addressid'));
//        if (!empty($address)) {
//            $data = $address->toArray();
//            $form->populate($data);
//            $form->populate($data['nu3_address']);
//
//        } else {
//            $this->addError(t(L::ADDRESS_NOT_FOUND));
//            $this->redirect($this->createAbsoluteUrl(Yp_Routing_UrlManager::ROUTE_CUSTOMER_ADDRESS));
//        }
//
//        if ($this->getParam('Sao_Yves_Customer_Component_Form_AddAddress')) {
//            $form->populate($this->getParam('Sao_Yves_Customer_Component_Form_AddAddress'));
//            if ($form->validate()) {
//
//                $address = Generated_Shared_Library_TransferLoader::getCustomerAddress();
//                $address->fromArray($form->getValues(), true);
//                $address->setFkCustomer(Yii::app()->user->getCustomer()->getIdCustomer());
//                $address->setCustomerId($address->getFkCustomer());
//                $address->setIdCustomerAddress($this->getParam('addressid'));
//
//                //TODO mock to convert string from dropdown to int :-(
//                $address->setFkMiscCountry((int)$address->getFkMiscCountry());
//
//                $nu3Address = new Sao_Shared_Customer_Transfer_AddressNu3();
//                $nu3Address->fromArray($form->getValues(), true);
//                $address->setNu3Address($nu3Address);
//
//                $response = $this->model->updateAddress($address);
//                if ($response->getSuccess()) {
//                    Yii::app()->user->setCustomer(PalShared_Transfer_Factory::getCustomer($response->getTransfer(), true));
//
//                    $this->addSuccess(t(L::CUSTOMER_ADDRESS_DELETE_SUCCESS));
//                    $this->redirect($this->createAbsoluteUrl(Yp_Routing_UrlManager::ROUTE_CUSTOMER_ADDRESS));
//                } else {
//                    $this->addMessages($response);
//                }
//            }
//        }
//
//        $this->render('edit', array('form' => $form, 'addressId' => $this->getParam('addressid')));
    }

    /**
     * @return void
     */
    public function actionDelete()
    {
//        $this->setPageTitle(t(L::CUSTOMER_ADDRESSES));
//        $this->addBodyClass('customerAccount');
//
//        $address = $this->model->getAddress($this->getParam('addressid'));
//        if (!empty($address)) {
//            $address = Generated_Shared_Library_TransferLoader::getCustomerAddress();
//            $address->setIdCustomerAddress($this->getParam('addressid'));
//            $address->setFkCustomer(Yii::app()->user->getCustomer()->getIdCustomer());
//
//            //if the customer tries to delete the default address
//            if(Yii::app()->user->getCustomer()->getShippingAddress()->getIdCustomerAddress() != $address->getIdCustomerAddress()) {
//                $response = $this->model->deleteAddress($address);
//
//                if ($response->getSuccess()) {
//                    $this->addSuccess(t(L::CUSTOMER_ADDRESS_SUCCESS));
//                    Yii::app()->user->setCustomer(PalShared_Transfer_Factory::getCustomer($response->getTransfer(), true));
//                } else {
//                    $this->addMessages($response);
//                }
//            }
//        } else {
//            $this->addError(t(L::ADDRESS_NOT_FOUND));
//        }
//        $this->redirect($this->createUrl(Yp_Routing_UrlManager::ROUTE_CUSTOMER_ADDRESS));
    }
}