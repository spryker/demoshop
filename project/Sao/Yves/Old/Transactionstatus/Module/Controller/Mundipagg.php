<?php
/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Yves_Transactionstatus_Module_Controller_Mundipagg extends Sao_Yves_Library_Base_Controller
{

    public function init()
    {
//        parent::init();
//        $this->setIndex('noindex, nofollow');
//        $this->layout = null;
    }

    public function actionIndex()
    {
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
