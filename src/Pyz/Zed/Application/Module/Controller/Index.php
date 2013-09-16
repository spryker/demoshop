<?php

use ProjectA\Shared\Library\Currency\CurrencyManager;

class Pyz_Zed_Application_Module_Controller_Index extends ProjectA_Zed_Library_Controller_Action
{

    public function indexAction()
    {
        $this->_helper->layout->setLayout('modular');
    }
}

