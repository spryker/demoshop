<?php 

namespace Generated\Zed\Misc\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class MiscFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA\Zed\Misc\Business\Exporter\KeyValue\CountryExporter
     */
    public function createExporterKeyValueCountryExporter()
    {
        $class = $this->transformClassName('ProjectA\Zed\Misc\Business\Exporter\KeyValue\CountryExporter');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Misc_Business_Internal_Install
     */
    public function createInternalInstall()
    {
        $class = $this->transformClassName('ProjectA_Zed_Misc_Business_Internal_Install');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Misc\Business\Internal\Regions\GermanyRegionInstaller
     */
    public function createInternalRegionsGermanyRegionInstaller()
    {
        $class = $this->transformClassName('ProjectA\Zed\Misc\Business\Internal\Regions\GermanyRegionInstaller');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Misc\Business\Internal\Regions\UnitedStatesRegionInstaller
     */
    public function createInternalRegionsUnitedStatesRegionInstaller()
    {
        $class = $this->transformClassName('ProjectA\Zed\Misc\Business\Internal\Regions\UnitedStatesRegionInstaller');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Misc\Business\MiscFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('ProjectA\Zed\Misc\Business\MiscFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Misc_Business_Model_Country
     */
    public function createModelCountry()
    {
        $class = $this->transformClassName('ProjectA_Zed_Misc_Business_Model_Country');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $resource
     * @param \DateInterval $expireInterval
     * @return \ProjectA_Zed_Misc_Business_Model_Lock_Db
     */
    public function createModelLockDb($resource, \DateInterval $expireInterval)
    {
        $class = $this->transformClassName('ProjectA_Zed_Misc_Business_Model_Lock_Db');
        $model = new $class($resource, $expireInterval);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Misc_Business_Model_Lock
     */
    public function createModelLock()
    {
        $class = $this->transformClassName('ProjectA_Zed_Misc_Business_Model_Lock');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Misc_Business_Model_Region
     */
    public function createModelRegion()
    {
        $class = $this->transformClassName('ProjectA_Zed_Misc_Business_Model_Region');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
