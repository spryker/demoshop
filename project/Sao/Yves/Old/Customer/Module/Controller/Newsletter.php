<?php

/**
 * Newsletter Controller
 */
class Sao_Yves_Customer_Module_Controller_Newsletter extends Sao_Yves_Library_Base_Controller
{

    const PARAM_CART_USER_ID = 'id';
    const PARAM_CART_ABANDONED_UNSUBSCRIBE_HASH = 'hash';

    /**
     * @var  Sao_Yves_Customer_Component_Model_Customer
     */
    protected $model = null;

//    const CONTENT_ID_INDEX = 'customer.newsletter';

    /**
     *
     */
    public function init()
    {
        parent::init();
        $this->model = Generated_Yves_ModelFactory::getYpCustomerModelCustomer();
        $this->model->setRequest(Sao_Yves_Application_Component_Model_Factory::getYlZedRequest());
//        $this->model->initCustomerForms($this->getAllParams());
    }

    public function actionCartUnsubscribe()
    {
        $this->setPageTitle(t(Sao_Yves_Library_L::NEWSLETTER));
        $this->addBodyClass('newsletter');

        $hash = $this->getParam(self::PARAM_CART_ABANDONED_UNSUBSCRIBE_HASH);
        $cartUserId = (int) $this->getParam(self::PARAM_CART_USER_ID);

        $cartAbandonedUnsubscribe = Generated_Shared_Library_TransferLoader::getMailCartAbandonedUnsubscribe();
        $cartAbandonedUnsubscribe->setUnsubscribeHash($hash);
        $cartAbandonedUnsubscribe->setCartUserId($cartUserId);

        /*  @var Sao_Shared_Application_Transfer_Response $response */
        $response = $this->model->cartAbandonedUnsubscribe($cartAbandonedUnsubscribe);

        /*  @var Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $transfer */
        $transfer = $response->getTransfer();

        $email = isset($transfer['email']) ?  $transfer['email'] : '';
        $this->render('cart-abandoned-unsubscribe', array('email' => $email));
    }

    public function actionCartSubscribe()
    {
        $this->setPageTitle(t(Sao_Yves_Library_L::NEWSLETTER));
        $this->addBodyClass('newsletter');

        $hash = $this->getParam(self::PARAM_CART_ABANDONED_UNSUBSCRIBE_HASH);
        $cartUserId = (int) $this->getParam(self::PARAM_CART_USER_ID);

        $cartAbandonedUnsubscribe = Generated_Shared_Library_TransferLoader::getMailCartAbandonedUnsubscribe();
        $cartAbandonedUnsubscribe->setUnsubscribeHash($hash);
        $cartAbandonedUnsubscribe->setCartUserId($cartUserId);

        /*  @var Sao_Shared_Application_Transfer_Response $response */
        $response = $this->model->cartAbandonedSubscribe($cartAbandonedUnsubscribe);

        /*  @var Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $transfer */
        $transfer = $response->getTransfer();

        $email = isset($transfer['email']) ?  $transfer['email'] : '';
        $this->render('cart-abandoned-subscribe', array('email' => $email));
    }

    /**
     *
     */
    public function actionIndex()
    {
//        $this->setPageTitle(t(L::NEWSLETTER));
//        $this->addBodyClass('newsletter');
//
//        Sao_Yves_Tracking_Component_Model_TagCommander_Aggregator::getInstance()
//            ->setContentId(self::CONTENT_ID_INDEX);
//
//        /*  @var $response Sao_Shared_Application_Transfer_Response*/
//        $response = $this->model->newsletterGetSubscriptions(Yii::app()->user->getCustomer());
//
//        /* @var $customer Sao_Shared_Customer_Transfer_Customer*/
//        $customer = Generated_Shared_Library_TransferLoader::getCustomer();
//        $customer->fromArray((array)$response->getTransfer(), true);
//        $this->render('index', array('newsletterSubscriptions' => $customer->getNewsletterSubscriptions()));
    }


    /**
     *
     */
    public function actionSubscribe()
    {
//        $this->setPageTitle(t(L::NEWSLETTER));
//        $this->addBodyClass('newsletter');
//        $newsletterSubscription = Generated_Shared_Library_TransferLoader::getNewsletterSubscription();
//        $newsletterSubscription->setEmail(Yii::app()->user->getCustomer()->getEmail());
//        /*  @var $response Sao_Shared_Application_Transfer_Response*/
//        $this->model->newsletterSubscribe($newsletterSubscription);
//        $this->redirect($this->createUrl(Yp_Routing_UrlManager::ROUTE_CUSTOMER_NEWSLETTER));
    }

    /**
     *
     */
    public function actionUnsubscribe()
    {
//        $this->setPageTitle(t(L::NEWSLETTER));
//        $this->addBodyClass('newsletter');
//        $newsletterSubscription = Generated_Shared_Library_TransferLoader::getNewsletterSubscription();
//        $newsletterSubscription->setEmail(Yii::app()->user->getCustomer()->getEmail());
//        /*  @var $response Sao_Shared_Application_Transfer_Response*/
//        $this->model->newsletterUnsubscribe($newsletterSubscription);
//        $this->redirect($this->createUrl(Yp_Routing_UrlManager::ROUTE_CUSTOMER_NEWSLETTER));
    }
}
