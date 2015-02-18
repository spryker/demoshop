<?php 

namespace Generated\Zed\Stock\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class StockFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA\Zed\Stock\Business\Internal\Install
     */
    public function createInternalInstall()
    {
        $class = $this->transformClassName('ProjectA\Zed\Stock\Business\Internal\Install');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Stock\Persistence\StockQueryContainer $queryContainer
     * @param \ProjectA\Zed\Product\Persistence\ProductQueryContainer $productQueryContainer
     * @return \ProjectA\Zed\Stock\Business\Model\Check
     */
    public function createModelCheck(\ProjectA\Zed\Stock\Persistence\StockQueryContainer $queryContainer, \ProjectA\Zed\Product\Persistence\ProductQueryContainer $productQueryContainer)
    {
        $class = $this->transformClassName('ProjectA\Zed\Stock\Business\Model\Check');
        $model = new $class($queryContainer, $productQueryContainer);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Stock\Persistence\StockQueryContainer $queryContainer
     * @param \ProjectA\Zed\Product\Persistence\ProductQueryContainer $productQueryContainer
     * @return \ProjectA\Zed\Stock\Business\Model\Physical
     */
    public function createModelPhysical(\ProjectA\Zed\Stock\Persistence\StockQueryContainer $queryContainer, \ProjectA\Zed\Product\Persistence\ProductQueryContainer $productQueryContainer)
    {
        $class = $this->transformClassName('ProjectA\Zed\Stock\Business\Model\Physical');
        $model = new $class($queryContainer, $productQueryContainer);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Stock\Persistence\StockQueryContainer $queryContainer
     * @param \ProjectA\Zed\Product\Persistence\ProductQueryContainer $productQueryContainer
     * @param \ProjectA\Zed\Stock\Business\StockSettings $settings
     * @return \ProjectA\Zed\Stock\Business\Model\Stock
     */
    public function createModelStock(\ProjectA\Zed\Stock\Persistence\StockQueryContainer $queryContainer, \ProjectA\Zed\Product\Persistence\ProductQueryContainer $productQueryContainer, \ProjectA\Zed\Stock\Business\StockSettings $settings)
    {
        $class = $this->transformClassName('ProjectA\Zed\Stock\Business\Model\Stock');
        $model = new $class($queryContainer, $productQueryContainer, $settings);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Stock\Persistence\StockQueryContainer $queryContainer
     * @return \ProjectA\Zed\Stock\Business\Model\StockTypes
     */
    public function createModelStockTypes(\ProjectA\Zed\Stock\Persistence\StockQueryContainer $queryContainer)
    {
        $class = $this->transformClassName('ProjectA\Zed\Stock\Business\Model\StockTypes');
        $model = new $class($queryContainer);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Kernel\Business\Factory $factory
     * @param \ProjectA\Zed\Kernel\Locator $locator
     * @return \ProjectA\Zed\Stock\Business\StockDependencyContainer
     */
    public function createStockDependencyContainer(\ProjectA\Zed\Kernel\Business\Factory $factory, \ProjectA\Zed\Kernel\Locator $locator)
    {
        $class = $this->transformClassName('ProjectA\Zed\Stock\Business\StockDependencyContainer');
        $model = new $class($factory, $locator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Kernel\Factory\FactoryInterface $factory
     * @param \ProjectA\Zed\Kernel\Locator $locator
     * @return \ProjectA\Zed\Stock\Business\StockFacade
     */
    public function createFacade(\ProjectA\Shared\Kernel\Factory\FactoryInterface $factory, \ProjectA\Zed\Kernel\Locator $locator)
    {
        $class = $this->transformClassName('ProjectA\Zed\Stock\Business\StockFacade');
        $model = new $class($factory, $locator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $locator
     * @return \ProjectA\Zed\Stock\Business\StockSettings
     */
    public function createSettings($locator)
    {
        $class = $this->transformClassName('ProjectA\Zed\Stock\Business\StockSettings');
        $model = new $class($locator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Stock\Business\Internal\DemoData\StockInstall
     */
    public function createInternalDemoDataStockInstall()
    {
        $class = $this->transformClassName('Pyz\Zed\Stock\Business\Internal\DemoData\StockInstall');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
