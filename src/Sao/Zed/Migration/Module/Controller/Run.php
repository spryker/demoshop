<?php
class Sao_Zed_Migration_Module_Controller_Run extends ProjectA_Zed_Library_Controller_Action
{

    public function init()
    {
        set_time_limit(0);
        ignore_user_abort(true);
        $this->disableLayout();
    }

    public function framesAction()
    {
       // $this->facadeLegacy->synchronizeFrames();
    }

    public function cartsAction()
    {
        //$this->facadeLegacy->synchronizeGuestCarts();
       // $this->facadeLegacy->synchronizeUserCarts();
    }

    public function salesAction()
    {
        //$this->facadeLegacy->synchronizeSales();
    }
}
