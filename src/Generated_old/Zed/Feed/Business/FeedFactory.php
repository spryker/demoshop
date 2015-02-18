<?php 

namespace Generated\Zed\Feed\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class FeedFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA\Zed\Feed\Business\FeedFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('ProjectA\Zed\Feed\Business\FeedFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Feed\Business\Model\Generator
     */
    public function createModelGenerator()
    {
        $class = $this->transformClassName('ProjectA\Zed\Feed\Business\Model\Generator');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Feed\Business\Model\Writer\Csv
     */
    public function createModelWriterCsv()
    {
        $class = $this->transformClassName('ProjectA\Zed\Feed\Business\Model\Writer\Csv');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Feed\Business\Model\Writer\Xml
     */
    public function createModelWriterXml()
    {
        $class = $this->transformClassName('ProjectA\Zed\Feed\Business\Model\Writer\Xml');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
