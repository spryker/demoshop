<?php

class Sao_Zed_Sandbox_Module_Controller_Adyen extends ProjectA_Zed_Library_Controller_Action
    implements ProjectA_Zed_Adyen_Component_Dependency_Facade_Interface, ProjectA_Zed_Cart_Component_Dependency_Facade_Interface, ProjectA_Zed_Payment_Component_Dependency_Facade_Interface, ProjectA_Zed_Stripe_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Adyen_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Cart_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Payment_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Stripe_Component_Dependency_Facade_Trait;


    public function stripeAction()
    {
        die('deactivated test');
        $paymentTransfer = new Sao_Shared_Sales_Transfer_Order_Payment();
        $paymentTransfer->setMethod(ProjectA_Shared_Library_PaymentMethods::PAYMENT_METHOD_CC);
        $paymentTransfer->setCcCardholder('John Doe');
        $paymentTransfer->setCcExpirationYear('2016');
        $paymentTransfer->setCcExpirationMonth('06');
        $paymentTransfer->setCcNumber('4242424242424242');
        //$paymentTransfer->setCcNumber('5555444433331111');
        //$paymentTransfer->setCcType('visa');
        $paymentTransfer->setCcVerification('737');


        $orderQuery = new ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery();
        $order = $orderQuery->findPk(2);

        Zend_Debug::dump($order->getGrandTotal());die;

        $amount = 10000;

        //$this->facadeStripe->capture($order, $amount);
        //die('bidde');
        $this->facadeStripe->charge($paymentTransfer, $order, $amount);
        die('bidde');
    }


    public function viewAction()
    {
        die('deactivated test');
        $pq = new ProjectA_Zed_Payment_Persistence_PacPaymentQuery();
        $payment = $pq->findOneByIdPayment(66);
        //$xxx = $this->facadePayment->getPaymentAccountView($payment);
        $xxx = $this->facadePayment->getPaymentTransactionView($payment);

        foreach($xxx as $item) {
            Zend_Debug::dump($item);
        }
        die('motherfucker');
    }

    public function paypalAction()
    {
        die('deactivated test');
        $query = new ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery();
        $order = $query->findOneByIdSalesOrder(1);

        $paymentTransfer = new Sao_Shared_Sales_Transfer_Order_Payment();

        $result = $this->facadeAdyen->paypal($paymentTransfer, $order, 1000);
        Zend_Debug::dump($result);die;
    }

    public function accountingAction()
    {
        die('deactivated test');
        $amount = 100;
        $action = 'hundnase';
        $pq = new ProjectA_Zed_Payment_Persistence_PacPaymentQuery();
        $payment = $pq->findOneByIdPayment(43);
        $x = new ProjectA_Zed_Payment_Component_Model_Accounting_Transaction_DeltaDebit($amount, $action);
        $x->setMessage('hallo hallo');
        $account =  $this->facadePayment->accountTransaction($payment, $x);


        Zend_Debug::dump($account);die;
        $pq = new ProjectA_Zed_Payment_Persistence_PacPaymentQuery();
        $payment = $pq->findOneByIdPayment(43);
        //$account = $this->facadePayment->getPaymentAccount($payment);
        $account = $this->facadePayment->getLastAccountEntry($payment);
        Zend_Debug::dump($account->toArray());die;
    }

    public function createPaymentAccountAction()
    {
        die('deactivated test');
        $pq = new ProjectA_Zed_Payment_Persistence_PacPaymentQuery();
        $payment = $pq->findOneByIdPayment(43);
        $account = $this->facadePayment->createAccount($payment);
        Zend_Debug::dump($account);die;
    }



    public function indexAction()
    {
        die('deactivated test');
        $data = new ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_SendNotification();
        $notification = new ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_NotificationRequest();
        $items = new ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_ArrayOfNotificationRequestItem();
        $item = new ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_NotificationRequestItem();
        $item->setMerchantAccountCode('SaatchiOnlineUS');
        $item->setMerchantReference('YourMerchantReference2');
        $item->setPaymentMethod('creditcard');
        $item->setPspReference('234234234');
        $item->setEventCode('AUTHORISATION');
        $item->setEventDate('2009-01-01T01:01:01.111+02:00');
        $item->setReason('56789:1111:12/2012');
        $item->setSuccess(true);
        $item->setOriginalReference('skdjflsdkjfldsfkj');
        $item->setAdditionalData(new ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_AnyType2anyTypeMap());
        $operations = new ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_ArrayOfString();
        $operations->addString('CANCEL');
        $operations->addString('CAPTURE');
        $item->setOperations($operations);
        $items->setNotificationRequestItem(array($item));
        $amount = new ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_Amount();
        $amount->setCurrency('USD');
        $amount->setValue('10000');
        $item->setAmount($amount);
        $notification->setNotificationItems($items);
        $notification->setLive(false);
        $data->setNotification($notification);

        $wsdlUrl = "https://ca-test.adyen.com/ca/services/Notification?wsdl";
        ini_set('soap.wsdl_cache_enabled', 0);
        $config = array('location' => "http://us.zed4.dev/adyen/notification/status-notification",
            'soap_version'  => SOAP_1_2,
            //'style'         => SOAP_DOCUMENT,
            //'encoding'      => SOAP_LITERAL,
            //'trace'         => 1,
            //'exceptions'    => 1
        );
        $client = new Zend_Soap_Client($wsdlUrl, $config);
        try{
            $result = $client->sendNotification($data);
            echo '<pre>' . print_r($result, true) . '</pre>';die;;die;
        } catch(Exception $e) {
            Zend_Debug::dump($e);die;
        }






        //$this->facadeAdyen->test();die('bidde');

        $paymentTransfer = new Sao_Shared_Sales_Transfer_Order_Payment();
        $paymentTransfer->setMethod(ProjectA_Shared_Library_PaymentMethods::PAYMENT_METHOD_CC);
        $paymentTransfer->setCcCardholder('John Doe');
        $paymentTransfer->setCcExpirationYear('2016');
        $paymentTransfer->setCcExpirationMonth('06');
        $paymentTransfer->setCcNumber('4111111111111111');
        //$paymentTransfer->setCcNumber('5555444433331111');
        //$paymentTransfer->setCcType('visa');
        $paymentTransfer->setCcVerification('737');


        $orderQuery = new ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery();
        $order = $orderQuery->findPk(2);

        $amount = 10000;


        $this->facadeAdyen->checkFraud();
        die('bidde');

        $this->facadeAdyen->authorise($paymentTransfer, $order, $amount);
        die('bidde');

        $this->facadeAdyen->cancel($order);
        die('bidde');

        $this->facadeAdyen->refund($order, 2000);
        die('bidde');

        $this->facadeAdyen->capture($order, $amount);
        die('bidde');


        $this->facadeAdyen->cancel($order);
        die('bidde');


    }

    public function cartTestAction()
    {
        die('deactivated test');
        $itemCollection = new ProjectA_Shared_Cart_Transfer_Item_Collection();
        $item = new Sao_Shared_Cart_Transfer_Item();
        $item->setYvesSessionId('abcdefghijklmnopqa');
        $item->setQuantity(2);
        $item->setSku('1101032201');
        $itemCollection->add($item);


        $cartTransfer = new ProjectA_Shared_Cart_Transfer_Change();
        $cartTransfer->setCartItems($itemCollection);
        $cartTransfer->setYvesSessionId('abcdefghijklmnopqa');
        $cartTransfer->setUserId('5');

        $this->facadeCart->addItems($cartTransfer);
        die('bidde');
    }

}
