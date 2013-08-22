<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Misc_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Misc_Component_Facade_Country
     */
    public function getFacadeCountry()
    {
        $class = $this->transformClassName('ProjectA_Zed_Misc_Component_Facade_Country');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Misc_Component_Facade_Validation
     */
    public function getFacadeValidation()
    {
        $class = $this->transformClassName('ProjectA_Zed_Misc_Component_Facade_Validation');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Misc_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('Sao_Zed_Misc_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Misc_Component_Internal_Install
     */
    public function getInternalInstall()
    {
        $class = $this->transformClassName('Sao_Zed_Misc_Component_Internal_Install');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Misc_Component_Model_Country
     */
    public function getModelCountry()
    {
        $class = $this->transformClassName('ProjectA_Zed_Misc_Component_Model_Country');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $resource 
     * @param DateInterval $expireInterval 
     * @return ProjectA_Zed_Misc_Component_Model_Lock_Db
     */
    public function getModelLockDb($resource, DateInterval $expireInterval)
    {
        $class = $this->transformClassName('ProjectA_Zed_Misc_Component_Model_Lock_Db');
        $model = new $class($resource, $expireInterval);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Misc_Component_Model_Lock
     */
    public function getModelLock()
    {
        $class = $this->transformClassName('ProjectA_Zed_Misc_Component_Model_Lock');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Misc_Component_Model_Validation_TransferSalesOrder
     */
    public function getModelValidationTransferSalesOrder()
    {
        $class = $this->transformClassName('ProjectA_Zed_Misc_Component_Model_Validation_TransferSalesOrder');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Misc_Component_Model_Validation_TransferSalesOrderPayment
     */
    public function getModelValidationTransferSalesOrderPayment()
    {
        $class = $this->transformClassName('ProjectA_Zed_Misc_Component_Model_Validation_TransferSalesOrderPayment');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Misc_Component_Model_Validator
     */
    public function getModelValidator()
    {
        $class = $this->transformClassName('ProjectA_Zed_Misc_Component_Model_Validator');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Misc_Component_Model_Region
     */
    public function getModelRegion()
    {
        $class = $this->transformClassName('Sao_Zed_Misc_Component_Model_Region');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
