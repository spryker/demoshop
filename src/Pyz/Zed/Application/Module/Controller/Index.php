<?php

namespace Pyz\Zed\Application\Module\Controller;

use Symfony\Component\Finder\Finder;

class Index extends \ProjectA_Zed_Library_Controller_Action
{
    public function indexAction()
    {
        $this->_helper->layout->setLayout('modular');
    }
}

