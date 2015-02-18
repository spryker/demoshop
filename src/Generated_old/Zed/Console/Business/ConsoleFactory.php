<?php 

namespace Generated\Zed\Console\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class ConsoleFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA\Zed\Console\Business\Model\Application\ConsoleFinder
     */
    public function createModelApplicationConsoleFinder()
    {
        $class = $this->transformClassName('ProjectA\Zed\Console\Business\Model\Application\ConsoleFinder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $name (optional) default: null
     * @return \ProjectA\Zed\Console\Business\Model\Console
     */
    public function createModelConsole($name = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Console\Business\Model\Console');
        $model = new $class($name);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
