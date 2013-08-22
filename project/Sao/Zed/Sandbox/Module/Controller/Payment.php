<?php

class Sao_Zed_Sandbox_Module_Controller_Payment extends ProjectA_Zed_Library_Controller_Action
{
    protected $data = array();

    public function preDispatch()
    {
        if (APPLICATION_ENV !== 'development')
        {
            throw new ProjectA_Zed_Library_Exception('Sandbox is for development only!');
        }
    }

    public function preauthorizePayoneAction()
    {
        $model = new Sandbox_Model_SimulatePayment();
        $model->run();
    }

    public function preauthorizePayoneErrorAction()
    {
        $model = new Sandbox_Model_SimulatePayment();
        $model->run(true);
    }

    public function simulateAppointedAction()
    {
        $orderId = $this->_getParam('id_order');

        $model = new Sandbox_Model_SimulateTransactionStatus();
        $model->appointed($orderId);

        ProjectA_Zed_Library_FlashMessage::getInstance()->addSuccess('Payment appointed');

        $this->_redirect('/sales/order-details/index/id/'.$orderId);
    }

    public function simulateCaptureAction()
    {
        $orderId = $this->_getParam('id_order');

        $model = new Sandbox_Model_SimulateTransactionStatus();
        $model->capture($orderId);

        ProjectA_Zed_Library_FlashMessage::getInstance()->addSuccess('Payment captured');

        $this->_redirect('/sales/order-details/index/id/'.$orderId);
    }


}
