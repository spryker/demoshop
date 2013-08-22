<?php

class Sao_Zed_Dwh_Module_Controller_Reports extends ProjectA_Zed_Dwh_Module_Controller_Reports
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