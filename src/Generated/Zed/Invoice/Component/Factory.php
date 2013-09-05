<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Invoice_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Invoice_Component_Facade_ReverseInvoice
     */
    public function getFacadeReverseInvoice()
    {
        $class = $this->transformClassName('ProjectA_Zed_Invoice_Component_Facade_ReverseInvoice');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Invoice_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Invoice_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Invoice_Component_Internal_Install
     */
    public function getInternalInstall()
    {
        $class = $this->transformClassName('ProjectA_Zed_Invoice_Component_Internal_Install');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Invoice_Component_Model_Document
     */
    public function getModelDocument()
    {
        $class = $this->transformClassName('ProjectA_Zed_Invoice_Component_Model_Document');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Invoice_Component_Model_Invoice
     */
    public function getModelInvoice()
    {
        $class = $this->transformClassName('ProjectA_Zed_Invoice_Component_Model_Invoice');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Invoice_Component_Model_Item
     */
    public function getModelItem()
    {
        $class = $this->transformClassName('ProjectA_Zed_Invoice_Component_Model_Item');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Invoice_Component_Model_Number
     */
    public function getModelNumber()
    {
        $class = $this->transformClassName('ProjectA_Zed_Invoice_Component_Model_Number');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Invoice_Component_Model_ReverseInvoice_Document
     */
    public function getModelReverseInvoiceDocument()
    {
        $class = $this->transformClassName('ProjectA_Zed_Invoice_Component_Model_ReverseInvoice_Document');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Invoice_Component_Model_ReverseInvoice
     */
    public function getModelReverseInvoice()
    {
        $class = $this->transformClassName('ProjectA_Zed_Invoice_Component_Model_ReverseInvoice');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Invoice_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('ProjectA_Zed_Invoice_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
