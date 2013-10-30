<?php

namespace Pyz\Zed\Dwh\Module\Controller;

use ProjectA\Zed\Dwh\Module\Controller\ReportsController as BaseController;

class ReportsController extends BaseController
{
    public function testAction()
    {
        $this->getHelper('viewRenderer')->setNoRender(true);
        $this->_helper->layout()->disableLayout();
        $this->facadeDwh->getReportsViewPage(array('id' => 'management'));
        echo 'done' . PHP_EOL;
    }

    public function statusAction()
    {
        $this->getHelper('viewRenderer')->setNoRender(true);
        $this->_helper->layout()->disableLayout();
        $this->facadeDwh->getReportsViewPage(array('id' => 'everything'));
        echo 'done' . PHP_EOL;
    }
}
