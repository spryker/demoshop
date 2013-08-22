<?php

class Sao_Zed_Sales_Module_Controller_Comments extends ProjectA_Zed_Library_Controller_Action implements ProjectA_Zed_Sales_Component_Dependency_Facade_Interface
//extends Admin_Sales_Controller_CommentsController
{

    /**
     * @var Tir_Sales_Facade
     */
    protected $facadeSales;

    /**
     * @param ProjectA_Zed_Sales_Component_Facade $facade
     */
    public function setFacadeSales(ProjectA_Zed_Sales_Component_Facade $facade)
    {
        $this->facadeSales = $facade;
    }

    public function addAction()
    {
        $crud = $this->facadeSales->getOrderCommentCrud($this);
        if ($crud->isValid()) {
            $crud->save();
            $this->_redirect('sales/order-details/index/id/' . $crud->getSalesOrderId());
        }
    }

}
