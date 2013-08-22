<?php
/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Yves_Transactionstatus_Module_Controller_Adyen extends Sao_Yves_Library_Base_Controller
{

    public function init()
    {
//        parent::init();
//        $this->setIndex('noindex, nofollow');
//        $this->layout = null;
    }

    public function actionNotification()
    {

        $xml = '<?xml version="1.0"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
<soap:Body>
<ns1:sendNotification xmlns:ns1="http://notification.services.adyen.com">
<ns1:notification>
<live xmlns="http://notification.services.adyen.com">false</live> <notificationItems xmlns="http://notification.services.adyen.com">
<NotificationRequestItem> <additionalData xsi:ns1="true"/> <amount>
<currency xmlns="http://common.services.adyen.com">EUR</currency>
<value xmlns="http://common.services.adyen.com">1000</value> </amount>
<eventCode>AUTHORISATION</eventCode> <eventDate>2009-01-01T01:02:01.111+02:00</eventDate> <merchantAccountCode>YourMerchantAccount</merchantAccountCode> <merchantReference>YourMerchantReference1</merchantReference> <operations>
              <string>CANCEL</string>
              <string>CAPTURE</string>
              <string>REFUND</string>
</operations>
<originalReference xsi:ns1="true"/> <paymentMethod>visa</paymentMethod> <pspReference>8888777766665555</pspReference> <reason>01234:1111:12/2012</reason> <success>true</success>
          </NotificationRequestItem>
          <NotificationRequestItem>
<additionalData xsi:ns1="true"/> <amount>
<currency xmlns="http://common.services.adyen.com">EUR</currency>
<value xmlns="http://common.services.adyen.com">995</value> </amount>
<eventCode>AUTHORISATION</eventCode> <eventDate>2009-01-01T01:01:01.111+02:00</eventDate> <merchantAccountCode>YourMerchantAccount</merchantAccountCode> <merchantReference>YourMerchantReference2</merchantReference> <operations>
              <string>CANCEL</string>
              <string>CAPTURE</string>
              <string>REFUND</string>
</operations>
<originalReference xsi:ns1="true"/> <paymentMethod>mc</paymentMethod> <pspReference>8888777766665556</pspReference> <reason>56789:1111:12/2012</reason> <success>true</success>
          </NotificationRequestItem>
        </notificationItems>
      </ns1:notification>
    </ns1:sendNotification>
  </soap:Body>
</soap:Envelope>';

        $transfer = Generated_Shared_Library_TransferLoader::getAdyenStatusNotification();
        $transfer->setRequestXml($xml);

        $send = new Sao_Yves_Payment_Component_Model_Adyen(Sao_Yves_Application_Component_Model_Factory::getYlZedRequest());
        $send->send($transfer);
//        //maybe check if everything works and set ok/error
        die('OK'); // This is needed so MundiPagg knows everything is ok :D

//        $xml = html_entity_decode($this->getParam('xmlStatusNotification'));
//        //$this->debugTransaction();
//        if (empty($xml) || strpos($xml, '<StatusNotification') !== 0) {
//            http_response_code(400);
//            die('error');
//        }
//        try {
//            $simpleXml = new SimpleXMLElement($xml);
//            $array = json_decode(json_encode($simpleXml), true);
//        } catch (Exception $e) {
//            ProjectA_Shared_Library_Log::log($e, 'mundipagg_exceptions.log');
//            ProjectA_Shared_Library_NewRelic_Api::getInstance()->noticeError('Transaction could not be parsed', $e);
//            http_response_code(400);
//            die('error');
//        }
//
//        $transfer = Generated_Shared_Library_TransferLoader::getPaymentMundipaggTransactionStatus();
//        $transfer->setData($array);
//
//        $send = new Sao_Yves_Payment_Component_Model_Mundipagg(Factory::getYlZedRequest());
//        $send->send($transfer);
//        //maybe check if everything works and set ok/error
//        die('OK'); // This is needed so MundiPagg knows everything is ok :D
    }
    public function debugTransaction()
    {
//        $date = date('c');
//        $msg = $date . PHP_EOL;
//        $msg .= '_POST:' . PHP_EOL;
//        $msg .= print_r($_POST, true) . PHP_EOL;
//        $msg .= '_GET:' . PHP_EOL;
//        $msg .= print_r($_GET, true) . PHP_EOL;
//        $msg .= '_COOKIE:' . PHP_EOL;
//        $msg .= print_r($_COOKIE, true) . PHP_EOL;
//        $msg .= '_SERVER:' . PHP_EOL;
//        $msg .= print_r($_SERVER, true) . PHP_EOL;
//        $msg .= 'Raw Input:' . PHP_EOL;
//        $msg .= file_get_contents('php://input');
//        file_put_contents(PalShared_Data::getLocalStoreSpecificPath('mundiPaggDebug') . DIRECTORY_SEPARATOR .  $date . '-' . md5($msg) . '.log', $msg);
    }
}
