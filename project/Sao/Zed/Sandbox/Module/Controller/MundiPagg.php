<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_Sandbox_Module_Controller_MundiPagg extends ProjectA_Zed_Library_Controller_Action
{
    protected $data = array();

    public function preDispatch()
    {
        if (ProjectA_Shared_Library_Environment::isNotDevelopment()) {
            throw new ProjectA_Zed_Library_Exception('Sandbox is for development only!');
        }
    }

    public function authorizeAction()
    {
        $model = new Sandbox_Model_SimulateMundiPagg();
        $model->run();
    }

    public function preauthorizePayoneErrorAction()
    {
        $model = new Sandbox_Model_SimulatePayment();
        $model->run(true);
    }

}
