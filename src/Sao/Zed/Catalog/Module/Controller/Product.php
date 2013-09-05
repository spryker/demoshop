<?php

class Sao_Zed_Catalog_Module_Controller_Product extends ProjectA_Zed_Catalog_Module_Controller_Product
    implements ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface
{
    /**
     * @var ProjectA_Zed_Catalog_Component_Facade
     */
    protected $facadeCatalog;

    public function init()
    {
        parent::init();

        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext
            ->addActionContext('category-boost', 'html')
            ->setAutoJsonSerialization(false)
            ->initContext();
    }

    public function indexAction()
    {
        $this->facadeCatalog
            ->getFacadeGuiProduct()
            ->createGridProduct($this->view);
    }

    public function categoryBoostAction()
    {
        $form = new Sao_Zed_Catalog_Module_Form_ProductBoostForm();

        if ($this->_request->isPost() && $form->isValid($this->getAllParams())) {
            $this->facadeCatalog->setProductCategoryBoost(
                $form->getValue('id'), $form->getValue('categoryNameId'), $form->getValue('boost')
            );
        } else {
            // set the boost (if we had already one to the form
            $result = $this->facadeCatalog->getProductCategoryBoost(
                (int)$this->_getParam('id'), (int)$this->_getParam('categoryNameId')
            );
            if ($result) {
                $this->_request->setParam('boost', $result->getBoost());
            }
        }
        $form->populate($this->getAllParams());


        $this->view->form = $form;
    }
}
