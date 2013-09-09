<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 */
class Sao_Zed_Catalog_Module_Controller_Supplier extends ProjectA_Zed_Library_Controller_Action implements
    ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Catalog_Component_Dependency_Facade_Trait;

    public function indexAction()
    {
        $this->facadeCatalog->getFacadeGui()->createGridSupplier($this->view);
    }

    public function saveAction()
    {
        $crud = $this->facadeCatalog->getFacadeGui()->getCrudSupplier($this);
        if ($crud->isValid()) {
            $crud->save();
            $this->_redirect('/catalog/supplier/index');
        }
    }
}
