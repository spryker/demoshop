<?php 

namespace Generated\Zed\Yves\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class YvesFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA_Zed_Yves_Business_Exporter_Setup_Empty
     */
    public function createExporterSetupEmpty()
    {
        $class = $this->transformClassName('ProjectA_Zed_Yves_Business_Exporter_Setup_Empty');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Yves_Business_Exporter_Setup_Entity
     */
    public function createExporterSetupEntity()
    {
        $class = $this->transformClassName('ProjectA_Zed_Yves_Business_Exporter_Setup_Entity');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Yves_Business_Exporter_Setup_Raw
     */
    public function createExporterSetupRaw()
    {
        $class = $this->transformClassName('ProjectA_Zed_Yves_Business_Exporter_Setup_Raw');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Yves\Business\Model\Control
     */
    public function createModelControl()
    {
        $class = $this->transformClassName('ProjectA\Zed\Yves\Business\Model\Control');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Yves\Business\Model\Export\KeyValue
     */
    public function createModelExportKeyValue()
    {
        $class = $this->transformClassName('ProjectA\Zed\Yves\Business\Model\Export\KeyValue');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Yves\Business\Model\Export\Solr
     */
    public function createModelExportSolr()
    {
        $class = $this->transformClassName('ProjectA\Zed\Yves\Business\Model\Export\Solr');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Yves_Business_Model_Touch
     */
    public function createModelTouch()
    {
        $class = $this->transformClassName('ProjectA_Zed_Yves_Business_Model_Touch');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Kernel\Factory\FactoryInterface $factory
     * @param \ProjectA\Zed\Kernel\Locator $locator
     * @return \ProjectA\Zed\Yves\Business\YvesFacade
     */
    public function createFacade(\ProjectA\Shared\Kernel\Factory\FactoryInterface $factory, \ProjectA\Zed\Kernel\Locator $locator)
    {
        $class = $this->transformClassName('ProjectA\Zed\Yves\Business\YvesFacade');
        $model = new $class($factory, $locator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Yves\Business\YvesSettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('Pyz\Zed\Yves\Business\YvesSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
