<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_System_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return Sao_Zed_System_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('Sao_Zed_System_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $environment (optional) default: null
     * @return ProjectA_Zed_System_Component_Model_Loadbalancer_BigIP_IPv4
     */
    public function getModelLoadbalancerBigIPIPv4($environment = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_System_Component_Model_Loadbalancer_BigIP_IPv4');
        $model = new $class($environment);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_System_Component_Model_Monitor_PhpFatals
     */
    public function getModelMonitorPhpFatals()
    {
        $class = $this->transformClassName('ProjectA_Zed_System_Component_Model_Monitor_PhpFatals');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_System_Component_Model_Monitor_SalesOrderAmount
     */
    public function getModelMonitorSalesOrderAmount()
    {
        $class = $this->transformClassName('ProjectA_Zed_System_Component_Model_Monitor_SalesOrderAmount');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_System_Component_Model_Watchdog_Abstract
     */
    public function getModelWatchdogAbstract()
    {
        $class = $this->transformClassName('ProjectA_Zed_System_Component_Model_Watchdog_Abstract');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $period 
     * @param mixed $threshold 
     * @return ProjectA_Zed_System_Component_Model_Watchdog_SalesOrder
     */
    public function getModelWatchdogSalesOrder($period, $threshold)
    {
        $class = $this->transformClassName('ProjectA_Zed_System_Component_Model_Watchdog_SalesOrder');
        $model = new $class($period, $threshold);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_System_Component_Model_Watchdog
     */
    public function getModelWatchdog()
    {
        $class = $this->transformClassName('ProjectA_Zed_System_Component_Model_Watchdog');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_System_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('Sao_Zed_System_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
