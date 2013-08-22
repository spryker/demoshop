<?php

class Sao_Zed_Sales_Module_Controller_Operations extends ProjectA_Zed_Sales_Module_Controller_Operations
{

    /**
     * @var array
     */
    protected $processesInMatrix = array(
        'creditcard-manufactured',
        'creditcard-marketplace',
        'paypal-manufactured',
        'paypal-marketplace',
        'manual-manufactured',
        'manual-marketplace'
    );

    public function clarifyTableAction()
    {
        $flag = Sao_Zed_Sales_Component_Interface_OrderprocessConstant::FLAG_CLARIFY;
        $this->view->html = $this->facadeSales->renderStatusItemOverviewByFlag($this->processesInMatrix, $flag);
        $this->render('table');
    }

}