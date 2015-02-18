<?php 

namespace Generated\Zed\Lumberjack\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class LumberjackFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA\Zed\Lumberjack\Business\LumberjackFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('ProjectA\Zed\Lumberjack\Business\LumberjackFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Lumberjack\Business\LumberjackSettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('ProjectA\Zed\Lumberjack\Business\LumberjackSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Lumberjack_Business_Model_Behaviour_Lumberjack
     */
    public function createModelBehaviourLumberjack()
    {
        $class = $this->transformClassName('ProjectA_Zed_Lumberjack_Business_Model_Behaviour_Lumberjack');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Lumberjack\Business\Model\ElasticSearch\Export\Csv
     */
    public function createModelElasticSearchExportCsv()
    {
        $class = $this->transformClassName('ProjectA\Zed\Lumberjack\Business\Model\ElasticSearch\Export\Csv');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Lumberjack\Business\Model\ElasticSearch\Proxy
     */
    public function createModelElasticSearchProxy()
    {
        $class = $this->transformClassName('ProjectA\Zed\Lumberjack\Business\Model\ElasticSearch\Proxy');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Lumberjack\Business\Model\Logger\RequestLogger
     */
    public function createModelLoggerRequestLogger()
    {
        $class = $this->transformClassName('ProjectA\Zed\Lumberjack\Business\Model\Logger\RequestLogger');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
