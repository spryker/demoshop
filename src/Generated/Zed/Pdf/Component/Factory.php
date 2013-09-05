<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Pdf_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return Sao_Zed_Pdf_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('Sao_Zed_Pdf_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Pdf_Component_Model_Converter
     */
    public function getModelConverter()
    {
        $class = $this->transformClassName('Sao_Zed_Pdf_Component_Model_Converter');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $entitySalesOrder
     * @param PropelCollection $items (optional) default: null
     * @return Sao_Zed_Pdf_Component_Model_Document_KagingSlip
     */
    public function getModelDocumentKagingSlip(ProjectA_Zed_Sales_Persistence_PacSalesOrder $entitySalesOrder, PropelCollection $items = null)
    {
        $class = $this->transformClassName('Sao_Zed_Pdf_Component_Model_Document_KagingSlip');
        $model = new $class($entitySalesOrder, $items);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Pdf_Component_Model_Filename
     */
    public function getModelFilename()
    {
        $class = $this->transformClassName('Sao_Zed_Pdf_Component_Model_Filename');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Pdf_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('Sao_Zed_Pdf_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
