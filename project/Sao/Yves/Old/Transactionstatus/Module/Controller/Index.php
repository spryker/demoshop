<?php

/**
 * Payone Transaction Status
 */
class Sao_Yves_Transactionstatus_Module_Controller_Index extends Sao_Yves_Library_Base_Controller
{

    public function init()
    {
//        parent::init();
//        $this->setIndex('noindex, nofollow');
//        $this->layout = null;
    }

    public function actionIndex()
    {
//        if (!isset($_POST['key']) && !isset($_POST['txid'])) {
//            echo $this->getDebugInformation();
//            echo 'TSERROR';
//        } elseif ($_POST['key'] !== md5(PalShared_Config::get('payone')->key)) {
//            echo $this->getDebugInformation();
//            echo 'TSERROR';
//        } else {
//            $transfer = Generated_Shared_Library_TransferLoader::getPaymentPayoneTransactionStatus($_POST, true);
//            $send = new Sao_Yves_Payment_Component_Model_Payone(Factory::getYlZedRequest());
//            $send->send($transfer);
//            echo 'TSOK';
//        }
//        die; // TODO remove die when layout is disabled
    }

    /**
     * @return string
     */
    protected function getDebugInformation()
    {
//        return print_r($_POST, true) . '<br />' . 'hostname: ' . gethostname() . '<br />';
    }
}