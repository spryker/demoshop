<?php

namespace Pyz\Zed\Application\Module\Controller;

use ProjectA\Shared\Library\Currency\CurrencyManager;
use Generated\Shared\Library\TransferLoader;

class Index extends \ProjectA_Zed_Library_Controller_Action
{

    public function indexAction()
    {
        $this->_helper->layout->setLayout('modular');
    }
}

