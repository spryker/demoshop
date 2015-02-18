<?php 

namespace Generated\Zed\DbDump\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class DbDumpFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA\Zed\DbDump\Business\DbDumpFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('ProjectA\Zed\DbDump\Business\DbDumpFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\DbDump\Business\DbDumpSettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('ProjectA\Zed\DbDump\Business\DbDumpSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\DbDump\Business\Model\Exporter
     */
    public function createModelExporter()
    {
        $class = $this->transformClassName('ProjectA\Zed\DbDump\Business\Model\Exporter');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\DbDump\Business\Model\Sanitizer
     */
    public function createModelSanitizer()
    {
        $class = $this->transformClassName('ProjectA\Zed\DbDump\Business\Model\Sanitizer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
